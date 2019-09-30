<?php

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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'StaffController@index')->name('staff.index');
    Route::get('/newStaff', 'StaffController@create')->name('staff.new');
    Route::post('/storeStaff', 'StaffController@store')->name('staff.store');
    Route::get('/editStaff/{id}', 'StaffController@edit')->name('staff.edit');
    Route::post('/updateStaff', 'StaffController@update')->name('staff.update');
    Route::get('/showStaff/{id}', 'StaffController@show')->name('staff.show');
    Route::post('/statusStaff', 'StaffController@status')->name('staff.status');
    Route::post('/destroyStaff', 'StaffController@destroy')->name('staff.destroy');
    Route::get('/ws', 'StaffController@ws')->name('staff.ws');
});
