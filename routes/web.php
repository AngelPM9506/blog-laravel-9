<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

    Route::get('/', function () {
        $titulo = 'Categorias';
        $categories = Category::pluck('title');
        return view('dashboard.index', compact('titulo', 'categories'));
    })->name('dashboard');
|
*/

Route::get('/', function () {
    $titulo = 'Categorias';
    $categories = Category::pluck('title');
    return view('dashboard.index', compact('titulo', 'categories'));
})->name('dashboard');

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/

Route::group([
    'prefix' => 'dashboard',
    'middleware' => 'auth'
], function () {
    Route::resources([
        'post' => PostController::class,
        'category' => CategoryController::class,
    ]);
});

/*Route::resource('post', PostController::class);
Route::resource('category', CategoryController::class);*/

require __DIR__ . '/auth.php';
