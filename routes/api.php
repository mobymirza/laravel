<?php
use App\Http\Controllers\BoardController;
use Illuminate\Support\Facades\Route;

Route::post('create-board',[BoardController::class,'store']);
