<?php

use App\Http\Controllers\ProfileController;
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

Route::middleware('splade')->group(function () {
    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    Route::get('/', function () {
        return view('welcome');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['verified'])->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';
});

Route::middleware(['auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/customer', [App\Http\Controllers\Admin\CustomerController::class, 'index'])->name('customer.index');
    Route::get('admin/customer/api', [App\Http\Controllers\Admin\CustomerController::class, 'api'])->name('customer.api');
    Route::get('admin/customer/create', [App\Http\Controllers\Admin\CustomerController::class, 'create'])->name('customer.create');
    Route::post('admin/customer', [App\Http\Controllers\Admin\CustomerController::class, 'store'])->name('customer.store');
    Route::get('admin/customer/{model}', [App\Http\Controllers\Admin\CustomerController::class, 'show'])->name('customer.show');
    Route::get('admin/customer/{model}/edit', [App\Http\Controllers\Admin\CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('admin/customer/{model}', [App\Http\Controllers\Admin\CustomerController::class, 'update'])->name('customer.update');
    Route::delete('admin/customer/{model}', [App\Http\Controllers\Admin\CustomerController::class, 'destroy'])->name('customer.destroy');
});
