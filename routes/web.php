<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CarController;

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

Route::get('/', [PagesController::class, 'homepage'])->name('homepage');
Route::get('/about_us', [PagesController::class, 'about_us'])->name('about_us');
Route::get('/contacts', [PagesController::class, 'contacts'])->name('contacts');
Route::get('/conditions', [PagesController::class, 'conditions'])->name('conditions');
Route::get('/finance_department', [PagesController::class, 'finance_department'])->name('finance_department');
Route::get('/for_clients', [PagesController::class, 'for_clients'])->name('for_clients');

Route::get('/catalog/{category}', [CarController::class, 'index'])->name('cars.index');
Route::get('/products/{car}', [CarController::class, 'show'])->name('cars.show');

Route::resource('articles', ArticleController::class);

