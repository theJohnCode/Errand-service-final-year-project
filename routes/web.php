<?php

use App\Http\Livewire\Home;
use App\Http\Livewire\ContactUs;
use App\Http\Livewire\Admin\Admin;
use App\Http\Livewire\Admin\Admins;
use App\Http\Livewire\Admin\AddAdmin;
use App\Http\Livewire\Admin\Contacts;
use App\Http\Livewire\ChangeLocation;
use App\Http\Livewire\ServiceDetails;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ServiceCategory;
use App\Http\Controllers\SearchService;
use App\Http\Livewire\Admin\AdminSlider;
use App\Http\Livewire\Customer\Customer;
use App\Http\Livewire\ServiceByCategory;
use App\Http\Livewire\Admin\ErrandClient;
use App\Http\Livewire\Admin\ErrandRunner;
use App\Http\Livewire\Admin\AdminServices;
use App\Http\Livewire\AvailabilityDetails;
use App\Http\Controllers\BookingController;
use App\Http\Livewire\Admin\AdminAddSlider;
use App\Http\Controllers\RegisterController;
use App\Http\Livewire\Admin\AdminAddService;
use App\Http\Livewire\Admin\AdminEditSlider;
use App\Http\Livewire\Customer\Availability;
use App\Http\Livewire\Admin\AdminEditService;
use App\Http\Livewire\Customer\AddAvailability;
use App\Http\Livewire\Customer\CustomerProfile;
use App\Http\Livewire\Customer\EditAvailability;
use App\Http\Livewire\Admin\AdminServiceCategory;
use App\Http\Livewire\Admin\AdminServiceByCategory;
use App\Http\Livewire\Admin\AdminAddServiceCategory;
use App\Http\Livewire\Admin\AdminEditServiceCategory;
use App\Http\Livewire\Customer\Rating;
use App\Http\Livewire\ServiceProvider\ServiceProvider;
use App\Http\Livewire\ServiceProvider\ServiceProviderProfile;
use App\Http\Livewire\ServiceProvider\EditServiceProviderProfile;


Route::get('/', Home::class)->name('home');
Route::get('/service-categories', ServiceCategory::class)->name('home.service_categories');
Route::get('/{category_slug}/service', ServiceByCategory::class)->name('home.service_by_category');
Route::get('/service/{service_slug}', ServiceDetails::class)->name('home.service_details');
Route::get('/availability/{availability_id}', AvailabilityDetails::class)->name('home.availability_details');
Route::post('/create-booking', [BookingController::class, 'store'])->name('create.booking');


Route::get('/autocomplete', [SearchService::class, 'autocomplete'])->name('home.autocomplete');
Route::post('/search-service', [SearchService::class, 'search'])->name('home.search_service');
Route::get('/change-location', ChangeLocation::class)->name('home.change_location');
Route::get('/contactus', ContactUs::class)->name('home.contactus');

// For Admin
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'auth-admin'])->group(function () {
    Route::get('/admin/dashboard', Admin::class)->name('admin.dashboard');
    Route::get('/admin/dashboard/errand-runners', ErrandRunner::class)->name('admin.errand.runner');
    // Route::get('/admin/dashboard/errand-runners/edit/{runner_id}', ErrandRunner::class)->name('admin.errand.runner.edit');
    Route::get('/admin/dashboard/errand-clients', ErrandClient::class)->name('admin.errand.client');
    // Route::get('/admin/dashboard/errand-clients/edit/{client_id}', ErrandRunner::class)->name('admin.errand.client.edit');
    Route::get('/admin/dashboard/admins', Admins::class)->name('admin.admins');
    Route::get('/admin/dashboard/admins/edit/{admin_id}', ErrandRunner::class)->name('admin.admin.edit');
    Route::get('/admin/dashboard/add-admin', AddAdmin::class)->name('admin.add.admin');

    Route::get('/admin/service-categories', AdminServiceCategory::class)->name('admin.service_categories');
    Route::get('/admin/service-categories/add', AdminAddServiceCategory::class)->name('admin.add_service_category');
    Route::get('/admin/service-categories/edit/{category_id}', AdminEditServiceCategory::class)->name('admin.edit_service_category');

    Route::get('/admin/{category_slug}/service', AdminServiceByCategory::class)->name('admin.service_by_category');


    Route::get('/admin/sliders', AdminSlider::class)->name('admin.slider');
    Route::get('/admin/sliders/add', AdminAddSlider::class)->name('admin.add_slider');
    Route::get('/admin/sliders/edit/{slider_id}', AdminEditSlider::class)->name('admin.edit_slider');

    Route::get('/admin/contacts', Contacts::class)->name('admin.contacts');
});

// For Service Provider
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'auth-service-provider'])->group(function () {
    Route::get('/service-provider/dashboard', ServiceProvider::class)->name('service-provider.dashboard');
    Route::get('/service-provider/profile', ServiceProviderProfile::class)->name('service-provider.profile');
    Route::get('/service-provider/profile/edit', EditServiceProviderProfile::class)->name('service-provider.edit_profile');
});

// For Service Provider and Admin
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'authAdminClient'])->group(function () {
    Route::get('/admin/all-services', AdminServices::class)->name('admin.all_services');
    Route::get('/admin/services/add', AdminAddService::class)->name('admin.add_service');
    Route::get('/admin/services/edit/{service_id}', AdminEditService::class)->name('admin.edit_service');
});

// For Customer
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/customer/availability', Availability::class)->name('customer.availability');
    Route::get('/customer/availability/add', AddAvailability::class)->name('customer.add.availability');
    Route::get('/customer/availability/edit/{availability_id}', EditAvailability::class)->name('customer.edit.availability');
    Route::get('/customer/dashboard', Customer::class)->name('customer.dashboard');
    Route::get('/customer/profile/{user_id?}', CustomerProfile::class)->name('customer.profile');
    Route::get('/customer/profile/edit', [RegisterController::class, 'editUser'])->name('customer.edit_profile');
    Route::put('/customer/profile/{id}', [RegisterController::class, 'updateUser'])->name('customer.update');
    Route::get('/customer/{user}/ratings', Rating::class)->name('customer.ratings');
});


Route::get('/register-errand-client', [RegisterController::class, 'showErcRegistrationForm'])->name('register.erc');

Route::get('/register-errand-runner', [RegisterController::class, 'showErrRegistrationForm'])->name('register.err');
