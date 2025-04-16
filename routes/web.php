<?php

use App\Http\Controllers\{HomepageController, ProductController};
use Illuminate\Support\Facades\Route;

Route::get('/', [HomepageController::class, 'index'])->name('index');

Route::group([
    'prefix' => 'product',
    'as' => 'product.'
], function () {
    Route::get('/fetch-api', [ProductController::class, 'fetchApi'])->name('fetch_api');
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::post('/', [ProductController::class, 'store'])->name('store');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::get('{id}/edit', [ProductController::class, 'edit'])->name('edit');
    Route::put('{id}', [ProductController::class, 'update'])->name('update');
    Route::delete('{id}', [ProductController::class, 'destroy'])->name('destroy');
});
