<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;

// Rotas de Produtos
Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->middleware('auth')->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->middleware('auth')->name('products.store');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->middleware('auth')->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->middleware('auth')->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->middleware('auth')->name('products.destroy');

// Filtragem por Categoria
Route::get('/categorias/{id}/produtos', [ProductController::class, 'indexByCategory'])->name('categories.products');

// Rotas de Categorias (Admin)
Route::get('/categorias', [CategoryController::class, 'index'])->middleware('auth')->name('categories.index');
Route::get('/categorias/create', [CategoryController::class, 'create'])->middleware('auth')->name('categories.create');
Route::post('/categorias/store', [CategoryController::class, 'store'])->middleware('auth')->name('categories.store');
Route::get('/categorias/edit/{id}', [CategoryController::class, 'edit'])->middleware('auth')->name('categories.edit');
Route::put('/categorias/update/{id}', [CategoryController::class, 'update'])->middleware('auth')->name('categories.update');
Route::delete('/categorias/{id}', [CategoryController::class, 'destroy'])->middleware('auth')->name('categories.destroy');

// Rotas de Vendas / Compras
Route::get('/vendas', [SaleController::class, 'index'])->middleware('auth')->name('sales.index');
Route::post('/vendas/store/{p_id}', [SaleController::class, 'store'])->middleware('auth')->name('sales.store');

// Dashboard do Breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Perfil de Utilizador
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';