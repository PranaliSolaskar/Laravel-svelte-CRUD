<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\http\Controllers\CustomerController;
use App\http\Controllers\ProfileController;
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
    return Inertia::render('Home');
});
/*Route::get('/ss', function () {
    return Inertia::render('Seessiondata');
});*/

Route::get('customers',[CustomerController::class,'index']);
Route::get('customers/create',[CustomerController::class,'create']);
Route::post('/customers',[CustomerController::class,'store']);
Route::get('/customers/{id}/edit', [CustomerController::class, 'edit']);
Route::post('/Customers/{id}', [CustomerController::class, 'update']);
Route::get('/customers/{id}/delete', [CustomerController::class, 'destroy']);
Route::get('/customers/{id}/trash', [CustomerController::class, 'trash']);
Route::get('/customers/onlytrash', [CustomerController::class, 'deleted']);     
Route::get('/customers/{id}/restore', [CustomerController::class, 'restorep']);
Route::get('/profile/upload', [ProfileController::class,'showUploadForm']);
Route::post('/profile/upload', [ProfileController::class,'upload']);
Route::get('/profile', function () {
    return Inertia::render('ProfileUpload');
});

Route::get('/start-session', function () {
    Session::put('user_id', 123);
    Session::put('password','Pranalee@123');
    //return redirect('/ss');
    return Inertia::render('Seessiondata');
});

Route::get('/get-session', function () {
    return response()->json([
        'user_id' => Session::get('user_id', null),
        'password' => Session::get('password',null),
    ]);
});

