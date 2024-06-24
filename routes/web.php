<?php

use App\Http\Controllers\Exam\Test1Controller;
use App\Http\Controllers\Exam\Test3Controller;
use Illuminate\Support\Facades\Route;

//test 1
Route::get("/test/1", [Test1Controller::class, 'index']);
Route::post("/test/1/draw/number", [Test1Controller::class, 'drawNumber'])->name("draw.number");

//test 3
Route::get("/test/3", [Test3Controller::class, 'index']);
Route::post("/test/3/sort", [Test3Controller::class, 'sortCard'])->name("sort.card");