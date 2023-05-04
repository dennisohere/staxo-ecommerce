<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('catalogue/{product:slug}', [ProductController::class, 'show'])->name('product.details');
Route::post('catalogue/{product:slug}/buy', [ProductController::class, 'buy'])->name('product.buy');

Route::get('orders/{order}/success', [\App\Http\Controllers\OrderController::class, 'success'])->name('order.success');

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function(){
    Route::get('/dashboard', function () {
        return view('pages.admin.dashboard');
    })->name('dashboard');
    Route::resource('products', ProductController::class);

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
