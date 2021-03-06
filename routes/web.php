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

Route::get('/', [App\Http\Controllers\VacanciesController::class, 'index']);
Route::get('/vacancies/create', [App\Http\Controllers\VacanciesController::class, 'create'])->middleware('auth');
Route::post('/vacancies', [App\Http\Controllers\VacanciesController::class, 'store']);
Route::any('/search', [App\Http\Controllers\VacanciesController::class, 'search'])->name('query');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::match(['get', 'post'], 'search',[
//     'as' => 'query',
//     'uses' => 'App\Http\Controllers\VacanciesController@search' ]);