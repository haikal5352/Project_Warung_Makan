<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;

// Landing page
Route::get('/', function () {
    return view('landing');
})->name('landing');

// Menu listing (public)
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');

// Auth routes (login/register)
Auth::routes();

// Redirect /admin ke dashboard
Route::redirect('/admin', '/admin/dashboard');

// Customer-only order flow
Route::middleware('auth')->group(function () {
    Route::get('/order', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/order', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/order/success', [OrderController::class, 'success'])->name('orders.success');
});

// Admin-only panel
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('menus', MenuController::class);
    Route::get('/orders', [OrderController::class, 'adminIndex'])->name('admin.orders');
});
