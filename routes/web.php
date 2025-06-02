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

// '/' -> wyświetla wszystkie listy z '__lists'
Route::get('/lists', [AllListsController::class, 'showLists'])->name('lists.showLists');

// '/add-list' -> wyświetla formularz dodawania list do bazy
Route::get('/add-list', function () {
    return view('lists.addList');
})->name('lists.addList');

// -> przetwarza formularz, tworzy tabele i dodaje dane do tabeli '__lists' -> przekierowuje na widok wszystkich list
Route::post('/add-list', [AllListsController::class, 'createList'])->name('lists.createList');

Route::post('/list/{action}', [AllListsController::class, 'listsOptions'])->name('lists.listsOptions');

Route::post('/list/addWord', [AllListsController::class, 'addWord'])->name('lists.addWord');

Route::get('/register', function () {
    return view('auth.register');
});
Route::post('/register', [AuthController::class, 'register']);

Route::get('/', function () {
    return view('auth.login', $_GET);
})->name('login');

Route::post('/', [AuthController::class, 'login']);

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::post('/flip',[AllListsController::class,'flip'])->name('flip');
