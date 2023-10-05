<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'showUsers'])->name('user.list');
Route::get('/user/create', [Usercontroller::class, 'createUser'])->name('user.create');
Route::post('/user/create',[UserController::class, 'saveUser'])->name('user.store');
Route::get('/user/edit/{id}', [UserController::class, 'getUser'])->name('user.edit');
Route::put('/user/edit/{id}', [UserController::class, 'saveUser'])->name('user.update');
Route::get('/user/delete/{id}', [UserController::class, 'deleteUser'])->name('user.delete');
Route::get('/user/search', [UserController::class, 'userSearch'])->name('user.search');