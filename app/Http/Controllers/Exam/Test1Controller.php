<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Test1Controller extends Controller
{
    public function index() 
    {
        $data = [
            "drawUrl" => route("draw.number"),
        ];
        return view("modules.test1", compact('data'));
    }

    public function drawNumber() 
    {
        $payTable = [
            8 => 10000,
            7 => 1650,
            6 => 100,
            5 => 12,
            4 => 2,
            3 => 0,
            2 => 0,
            1 => 0,
            0 => 0
        ];
    
        $userNumbers = request()->numbers;
        if (count(array_unique($userNumbers)) !== 8) {
            return response()->json(['error' => 'Numbers must be unique'], 400);
        }
    
        $drawnNumbers = [];
        while (count($drawnNumbers) < 20) {
            $number = rand(1, 80);
            if (!in_array($number, $drawnNumbers)) {
                $drawnNumbers[] = $number;
            }
        }
    
        $hits = count(array_intersect($userNumbers, $drawnNumbers));
        $prize = $payTable[$hits];
    
        // Special prize: double if the last drawn number is in user picks
        if (in_array(end($drawnNumbers), $userNumbers)) {
            $prize *= 2;
        }
    
        return response()->json([
            'results' => $drawnNumbers,
            'hits' => $hits,
            'prize' => $prize
        ]);
    }
}
