<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $statusValid = \DB::table('incoming_messages')->where('status','valid')->get();
    $statusInvalid = \DB::table('incoming_messages')->where('status','invalid')->get();
    $statusOther = \DB::table('incoming_messages')->where('status','!=','invalid')->where('status','!=','valid')->get();
    
    return view('welcome',['statusValid' => $statusValid,'statusInvalid' => $statusInvalid ,'statusOther' => $statusOther]);

    // return view('welcome');
});
