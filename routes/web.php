<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'user_login_view'])->name('admin.user.login');
    Route::get('/admin/login', [AuthController::class, 'index'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.make.login');
    Route::post('/user/login', [AuthController::class, 'user_login'])->name('admin.make.user.login');

});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.user.dashboard');
    Route::get('/admin/logout', [DashboardController::class, 'logout'])->name('admin.logout');
    
    Route::get('/change/password', [AdminController::class, 'profile_view'])->name('admin.user.profile_view');
    Route::post('/change/password', [AdminController::class, 'change_password'])->name('admin.user.change.password');

    Route::get('/admin/profile_view', [AdminController::class, 'profile_view'])->name('admin.admin.profile_view');
    Route::post('/admin/update/profile', [AdminController::class, 'update_profile'])->name('admin.update.profile');
    Route::post('/admin/change/password', [AdminController::class, 'change_password'])->name('admin.change.password');

    Route::middleware(['super_admin'])->group(function () {
        Route::get('/admin/user/list', [AdminController::class, 'index'])->name('admin.user.index');
        Route::get('/admin/user/create', [AdminController::class, 'create'])->name('admin.user.create');
        Route::post('/admin/user/store', [AdminController::class, 'store'])->name('admin.user.store');
        Route::get('/admin/user/update/{id}', [AdminController::class, 'edit'])->name('admin.user.edit');
        Route::post('/admin/user/update', [AdminController::class, 'update'])->name('admin.user.update');
        Route::post('/admin/user/delete', [AdminController::class, 'delete'])->name('admin.user.delete');
        Route::get('/admin/lead/list', [LeadController::class, 'index'])->name('admin.admin.lead.index');
        Route::get('/admin/sale/list', [SaleController::class, 'index'])->name('admin.admin.sale.index');
        Route::post('/admin/lead/delete', [LeadController::class, 'delete'])->name('admin.admin.lead.delete');
        Route::get('/admin/profile_view', [AdminController::class, 'profile_view'])->name('admin.admin.profile_view');
        Route::post('/admin/update/profile', [AdminController::class, 'update_profile'])->name('admin.update.profile');
        Route::post('/admin/change/password', [AdminController::class, 'change_password'])->name('admin.change.password');

    });

    Route::middleware(['sale'])->group(function () {
        Route::get('/lead/list', [LeadController::class, 'index'])->name('admin.lead.index');
        Route::get('/leads/create', [LeadController::class, 'create'])->name('admin.lead.create');
        Route::post('/lead/store', [LeadController::class, 'store'])->name('admin.lead.store');
        Route::get('/lead/update/{id}', [LeadController::class, 'edit'])->name('admin.lead.edit');
        Route::post('/lead/update', [LeadController::class, 'update'])->name('admin.lead.update');
        Route::post('/lead/delete', [LeadController::class, 'delete'])->name('admin.lead.delete');
        Route::post('/lead/confirm-sale', [LeadController::class, 'confirm_to_sale'])->name('admin.lead.confirm_sale');
        Route::get('/sale/list', [SaleController::class, 'index'])->name('admin.sale.index');
        Route::get('/follow/up/{id}', [LeadController::class, 'follow_up_view'])->name('admin.lead.follow_up_view');
        Route::post('/add/follow/up', [LeadController::class, 'add_follow'])->name('admin.lead.add_follow');
    });
});
