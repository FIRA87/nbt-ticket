<?php

use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ActiveUserController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ManagerController::class, 'ManagerLogin'])->name('manager.login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Dashboard
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('update.password');

    // Route::resource('roles', \App\Http\Controllers\RoleController::class);
    Route::controller(RoleController::class)->group(function () {
        Route::get('/all/permission', 'AllPermission')->name('all.permission');
        Route::get('/add/permission', 'AddPermission')->name('add.permission');
        Route::post('/store/permission', 'StorePermission')->name('store.permission');
        Route::get('/edit/permission/{id}', 'EditPermission')->name('edit.permission');
        Route::post('/update/permission', 'UpdatePermission')->name('update.permission');
        Route::get('/delete/permission/{id}', 'DeletePermission')->name('delete.permission');
    });

    // Manager Active and Inactive All Route
    Route::controller(AdminController::class)->group(function () {
        Route::get('/inactive/manager', 'InactiveManager')->name('inactive.manager');
        Route::get('/active/manager', 'ActiveManager')->name('active.manager');
        Route::get('/inactive/manager/details/{id}', 'InactiveManagerDetails')->name('inactive.manager.details');
        Route::post('/active/manager/approve', 'ActiveManagerApprove')->name('active.manager.approve');
        Route::get('/active/manager/details/{id}', 'ActiveManagerDetails')->name('active.manager.details');
        Route::post('/inactive/manager/approve', 'InActiveManagerApprove')->name('inactive.manager.approve');
    });

    // Active user and vendor All Route
    Route::controller(ActiveUserController::class)->group(function () {
        Route::get('/all/user', 'AllUser')->name('all-user');
        Route::get('/all/manager', 'AllManager')->name('all-manager');
    });
});

// Manager Dashboard
Route::middleware(['auth', 'role:manager'])->group(function () {
    Route::get('/manager/dashboard', [ManagerController::class, 'ManagerDashboard'])->name('manager.dashboard');
    Route::get('/manager/logout', [ManagerController::class, 'ManagerDestroy'])->name('manager.logout');
    Route::get('/manager/profile', [ManagerController::class, 'ManagerProfile'])->name('manager.profile');
    Route::post('/manager/profile/store', [ManagerController::class, 'ManagerProfileStore'])->name('manager.profile.store');
    Route::get('/manager/change/password', [ManagerController::class, 'ManagerChangePassword'])->name('manager.change.password');
    Route::post('/manager/update/password', [ManagerController::class, 'ManagerUpdatePassword'])->name('manager.update.password');
});
Route::middleware(['auth', 'role: admin, manager'])->group(function () {
    Route::get('/ticket', [TicketController::class, 'index'])->name('ticket.index');
    Route::get('/ticket/get-data', [TicketController::class, 'getData'])->name('getData');
    Route::post('/ticket/pdf', [TicketController::class, 'exportToPdf'])->name('export.to.pdf');
    Route::post('/ticket', [TicketController::class, 'filter'])->name('ticket.filter');
});


Route::get('/admin/login', [AdminController::class, 'AdminLogin']);
Route::get('/manager/login', [ManagerController::class, 'ManagerLogin'])->name('manager.login');
Route::get('/become/manager', [ManagerController::class, 'BecomeManager'])->name('become.manager');
Route::post('/manager/register', [ManagerController::class, 'ManagerRegister'])->name('manager.register');

require __DIR__ . '/auth.php';
