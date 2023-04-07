<?php

use Illuminate\Support\Facades\Route;
use App\Models\Ticket;
use App\Http\Controllers;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\ScheduleController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/depcountry', function () {
    $airports = DB::table('airports_list')->get();
    return view('depcountry', ['airports' => $airports]);
    //return view('depcountry');
})->name('depcountry');

Route::get('/schedule',function(){
    $airports = DB::table('airports_list')->get();
    return view('schedule', ['airports' => $airports]);
    //return view('schedule');
})->name('schedule');

//Route::get('/flights', 'App\Http\Controllers\FlightController@searchFlights')->name('searchFlights');
Route::post('/looktable', 'App\Http\Controllers\ScheduleController@searchSchedule')->name('searchSchedule');
//Route::get('/looktable', [ ScheduleController::class, 'searchSchedule' ])->name('searchSchedule');
//#Route::post('/looktable', [ ScheduleController::class, 'searchSchedule' ])->name('searchSchedule');
//Route::get('/looktable', 'App\Http\Controllers\ScheduleController@searchSchedule');
//Route::get('/looktable', function () {
 //   return view('looktable');
//})->name('looktable');
//Route::post('/searchSchedule', 'App\Http\Controllers\ScheduleController@searchSchedule')->name('searchSchedule');
