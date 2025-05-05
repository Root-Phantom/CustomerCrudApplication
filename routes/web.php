<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/customer');

Route::get('customer/trash', [CustomerController::class, 'trashIndex'])->name('customer.trash');
Route::patch('customer/{customer}/restore', [CustomerController::class, 'restore'])->name('customer.restore');
Route::delete('customer/{customer}/forcedelete', [CustomerController::class, 'forceDelete'])->name('customer.forcedelete');
Route::resource('customer', CustomerController::class);
