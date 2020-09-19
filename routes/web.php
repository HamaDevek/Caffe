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
Route::get('/',function ()
{
    return redirect()->route('login');
});

Route::group(['namespace' => 'App\\Http\\Controllers\\', 'middleware' => ['auth:sanctum', 'verified']], function () {
    Route::post('/logout/user', 'UserController@logout')->name('logouts');
    Route::get('/dashboard', 'Dashboard@index')->name('dashboard.index');
    Route::resource('/employee', 'EmployeeController');
    Route::resource('/income', 'InComeController');
    Route::resource('/outcome', 'OutComeController');
    Route::resource('/license', 'LicenseController');


});
