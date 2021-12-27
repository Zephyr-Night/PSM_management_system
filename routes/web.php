<?php

use App\Http\Controllers\inventoryusageController;
use App\Http\Controllers\ExpertiseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Route::get('/studentdashboard', function () {
    return view('studentdashboard');
});
// Route::get('/lecturedashboard', function () {
//     return view('lecturedashboard');
// });


Auth::routes();
Route::get('/lecturedashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('lecturedashboards');

//inventory usage
Route::resource('/inventory', inventoryusageController::class);

Route::get('/listRequestLecture', [inventoryusageController::class, 'listRequestLecture'])->name('listRequestLecture');

Route::resource('/expertise', ExpertiseController::class);
