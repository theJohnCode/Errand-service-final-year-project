<?php

use App\Http\Livewire\Admin\Admin;
use App\Http\Livewire\Admin\AdminAddService;
use App\Http\Livewire\Admin\AdminAddServiceCategory;
use App\Http\Livewire\Admin\AdminAddSlider;
use App\Http\Livewire\Admin\AdminEditService;
use App\Http\Livewire\Admin\AdminEditServiceCategory;
use App\Http\Livewire\Admin\AdminEditSlider;
use App\Http\Livewire\Admin\AdminServices;
use App\Http\Livewire\Admin\AdminServiceByCategory;
use App\Http\Livewire\Admin\AdminServiceCategory;
use App\Http\Livewire\Admin\AdminSlider;
use App\Http\Livewire\ChangeLocation;
use App\Http\Livewire\Customer\Customer;
use App\Http\Livewire\Home;
use App\Http\Livewire\ServiceByCategory;
use App\Http\Livewire\ServiceCategory;
use App\Http\Livewire\ServiceDetails;
use App\Http\Livewire\ServiceProvider\EditServiceProviderProfile;
use App\Http\Livewire\ServiceProvider\ServiceProvider;
use App\Http\Controllers\SearchService;

use App\Http\Livewire\ServiceProvider\ServiceProviderProfile;
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
Route::get('/{category_slug}/service',ServiceByCategory::class)->name('home.service_by_category');
Route::get('/service/{service_slug}',ServiceDetails::class)->name('home.service_details');

Route::get('/autocomplete',[SearchService::class,'autocomplete'])->name('home.autocomplete');
Route::post('/search-service',[SearchService::class,'search'])->name('home.search_service');
Route::get('/change-location',ChangeLocation::class)->name('home.change_location');

// For Admin
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified','auth-admin'])->group(function () {
    Route::get('/admin/dashboard', Admin::class)->name('admin.dashboard');

    Route::get('/admin/service-categories',AdminServiceCategory::class)->name('admin.service_categories');
    Route::get('/admin/service-categories/add',AdminAddServiceCategory::class)->name('admin.add_service_category');
    Route::get('/admin/service-categories/edit/{category_id}',AdminEditServiceCategory::class)->name('admin.edit_service_category');

    Route::get('/admin/all-services',AdminServices::class)->name('admin.all_services');
    Route::get('/admin/{category_slug}/service',AdminServiceByCategory::class)->name('admin.service_by_category');
    Route::get('/admin/services/add',AdminAddService::class)->name('admin.add_service');
    Route::get('/admin/services/edit/{service_id}',AdminEditService::class)->name('admin.edit_service');

    Route::get('/admin/sliders',AdminSlider::class)->name('admin.slider');
    Route::get('/admin/sliders/add',AdminAddSlider::class)->name('admin.add_slider');
    Route::get('/admin/sliders/edit/{slider_id}',AdminEditSlider::class)->name('admin.edit_slider');
});

// For Service Provider
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified','auth-service-provider'])->group(function () {
    Route::get('/service-provider/dashboard', ServiceProvider::class)->name('service-provider.dashboard');
    Route::get('/service-provider/profile', ServiceProviderProfile::class)->name('service-provider.profile');
    Route::get('/service-provider/profile/edit', EditServiceProviderProfile::class)->name('service-provider.edit_profile');
});

// For Customer
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/customer/dashboard', Customer::class)->name('customer.dashboard');
});
