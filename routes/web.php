<?php

use App\Http\Controllers\RolesAndPermissionController;
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
    return view('welcome');
});
Route::get('test', function () {
    return "hello ";
})->middleware('role:Admin');
Route::get('/assignRole', [RolesAndPermissionController::class, 'addPemission']);
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
    Route::resource('employes', 'EmployesController');
    Route::get('employes/{id}/certificate', 'EmployesController@getWorkCertificate')
        ->name('work.certificate');
    Route::get('employes/{id}/vacation', 'EmployesController@vacationRequest')
        ->name('work.vacation');
});
