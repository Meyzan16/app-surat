<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Mahasiswa\DashboardMhsController;


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

// Route::get('/', function () {
//     return view('Admin.main.dashboard');
// });



//Admin
Route::group([
    'prefix' => 'admin/'], function(){
    Route::get('/', [DashboardController::Class, 'index'] )->name('dashboard-admin');

  


});

Route::group([
    'prefix' => 'mahasiswa/'], function(){
    Route::get('/', [DashboardMhsController::Class, 'index'])->name('dashboard-mhs');
});
