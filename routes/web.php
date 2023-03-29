<?php

use App\Http\Livewire\Admin\Admin;
use App\Http\Livewire\Admin\AdminAddServiceCategory;
use App\Http\Livewire\Admin\AdminEditServiceCategory;
use App\Http\Livewire\Admin\AdminServiceCategory;
use App\Http\Livewire\Customer\Customer;
use App\Http\Livewire\Home;
use App\Http\Livewire\ServiceCategory;
use App\Http\Livewire\ServiceProvider\ServiceProvider;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/',Home::class)->name('home');
Route::get('/service-categories',ServiceCategory::class)->name('home.service_categories');

// For Admin
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified','auth-admin'])->group(function () {
    Route::get('/admin/dashboard', Admin::class)->name('admin.dashboard');
    Route::get('/admin/service-categories',AdminServiceCategory::class)->name('admin.service_categories');
    Route::get('/admin/service-categories/add',AdminAddServiceCategory::class)->name('admin.add_service');
    Route::get('/admin/service-categories/edit/{category_id}',AdminEditServiceCategory::class)->name('admin.edit_service');
});

// For Service Provider
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified','auth-service-provider'])->group(function () {
    Route::get('/service-provider/dashboard', ServiceProvider::class)->name('service-provider.dashboard');
});

// For Customer
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/customer/dashboard', Customer::class)->name('customer.dashboard');
});
