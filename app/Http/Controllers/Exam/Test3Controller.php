<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
class Test3Controller extends Controller
{
    public function index() 
    {
        $data = [
            "sortUrl" => route("sort.card"),
        ];
        return view("modules.test3", compact('data'));
    }

    public function sortCard()
    {
        $suitOrder = ['D' => 4, 'H' => 3, 'S' => 2, 'C' => 1];
        $rankOrder = ['A' => 13, 'K' => 12, 'Q' => 11, 'J' => 10, '0' => 9, '9' => 8, '8' => 7, '7' => 6, '6' => 5, '5' => 4, '4' => 3, '3' => 2, '2' => 1];

        $cards = request()->cards;
        usort($cards, function ($a, $b) use ($suitOrder, $rankOrder) {
            if (isset($a) && isset($b)) {
                $rank1 = $rankOrder[strtoupper($a[1])];
                $rank2 = $rankOrder[strtoupper($b[1])];
                $suit1 = $suitOrder[strtoupper($a[0])];
                $suit2 = $suitOrder[strtoupper($b[0])];
    
                if ($rank1 === $rank2) {
                    return $suit2 - $suit1; // Higher suit comes first
                }
    
                return $rank2 - $rank1; // Higher rank comes first
            }
        });

        return response()->json(['sortedCards' => $cards]);
    }
}
