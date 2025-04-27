<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\PatientCategoryController;
use App\Http\Controllers\EmploymentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\RegistrationController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // User Management
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::get('user/index', [UserController::class, 'index'])->name('user.index');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');
    Route::put('user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    // Role Management
    Route::get('roles/index', [RoleController::class, 'index'])->name('roles.index');
    Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('roles/store', [RoleController::class, 'store'])->name('roles.store');
    Route::get('roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('roles/update/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('roles/destroy/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
    // Room Management
    Route::get('rooms/index', [RoomController::class, 'index'])->name('rooms.index');
    Route::get('rooms/create', [RoomController::class, 'create'])->name('rooms.create');
    Route::post('rooms/store', [RoomController::class, 'store'])->name('rooms.store');
    Route::get('rooms/edit/{id}', [RoomController::class, 'edit'])->name('rooms.edit');
    Route::put('rooms/update/{id}', [RoomController::class, 'update'])->name('rooms.update');
    Route::delete('rooms/destroy/{id}', [RoomController::class, 'destroy'])->name('rooms.destroy');
    // Route untuk Action
    Route::get('actions/index', [ActionController::class, 'index'])->name('actions.index');
    Route::get('actions/create', [ActionController::class, 'create'])->name('actions.create');
    Route::post('actions/store', [ActionController::class, 'store'])->name('actions.store');
    Route::get('actions/edit/{id}', [ActionController::class, 'edit'])->name('actions.edit');
    Route::put('actions/update/{id}', [ActionController::class, 'update'])->name('actions.update');
    Route::delete('actions/destroy/{id}', [ActionController::class, 'destroy'])->name('actions.destroy');
    // Route untuk Education
    Route::get('educations/index', [EducationController::class, 'index'])->name('educations.index');
    Route::get('educations/create', [EducationController::class, 'create'])->name('educations.create');
    Route::post('educations/store', [EducationController::class, 'store'])->name('educations.store');
    Route::get('educations/edit/{id}', [EducationController::class, 'edit'])->name('educations.edit');
    Route::put('educations/update/{id}', [EducationController::class, 'update'])->name('educations.update');
    Route::delete('educations/destroy/{id}', [EducationController::class, 'destroy'])->name('educations.destroy');
    // Route untuk PatientCategory
    Route::get('patient_categories/index', [PatientCategoryController::class, 'index'])->name('patient_categories.index');
    Route::get('patient_categories/create', [PatientCategoryController::class, 'create'])->name('patient_categories.create');
    Route::post('patient_categories/store', [PatientCategoryController::class, 'store'])->name('patient_categories.store');
    Route::get('patient_categories/edit/{id}', [PatientCategoryController::class, 'edit'])->name('patient_categories.edit');
    Route::put('patient_categories/update/{id}', [PatientCategoryController::class, 'update'])->name('patient_categories.update');
    Route::delete('patient_categories/destroy/{id}', [PatientCategoryController::class, 'destroy'])->name('patient_categories.destroy');
    // Route untuk Employment
    Route::get('employments/index', [EmploymentController::class, 'index'])->name('employments.index');
    Route::get('employments/create', [EmploymentController::class, 'create'])->name('employments.create');
    Route::post('employments/store', [EmploymentController::class, 'store'])->name('employments.store');
    Route::get('employments/edit/{id}', [EmploymentController::class, 'edit'])->name('employments.edit');
    Route::put('employments/update/{id}', [EmploymentController::class, 'update'])->name('employments.update');
    Route::delete('employments/destroy/{id}', [EmploymentController::class, 'destroy'])->name('employments.destroy');
    // Route untuk Patient
    Route::get('patients/index', [PatientController::class, 'index'])->name('patients.index');
    Route::get('patients/create', [PatientController::class, 'create'])->name('patients.create');
    Route::post('patients/store', [PatientController::class, 'store'])->name('patients.store');
    Route::get('patients/edit/{id}', [PatientController::class, 'edit'])->name('patients.edit');
    Route::get('patients/show/{id}', [PatientController::class, 'show'])->name('patients.show');
    Route::put('patients/update/{id}', [PatientController::class, 'update'])->name('patients.update');
    Route::delete('patients/destroy/{id}', [PatientController::class, 'destroy'])->name('patients.destroy');
    Route::get('/getCities/{provinceId}', [PatientController::class, 'getCities']);
    Route::get('/getDistricts/{cityId}', [PatientController::class, 'getDistricts']);
    Route::get('/getVillages/{districtId}', [PatientController::class, 'getVillages']);

    // routes/web.php
    Route::resource('transactions', TransactionController::class);
    Route::resource('registrations', RegistrationController::class);

    
});

require __DIR__.'/auth.php';
