<?php

namespace App\Http\Controllers;

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

Route::get('/', [ListsController::class, 'ShowLists'])->name('wordLists');

Route::get('/add-list', function() {
    return view('addList');
})->name('addList');

Route::post('/add-list', [AllListsController::class, 'store']);

Route::get('/add-word', function() {
    return view('addWord');
})->name('addWord');

Route::get('list/{id}', function ($id) {
    return response('Lista ' . $id);
});
Route::get('/main', function (){
    return view('main');
});
Route::get('/register',function (){
    return view('register');
});
Route::post('/register',[AuthController::class , 'register']);

Route::get('/login',function () {
    return view('login',$_GET);
})->name('login');

Route::post('/login',[AuthController::class , 'login']);