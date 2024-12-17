<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/', function () {
    return view('welcome');
});
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('profile', ProfileController::class)->name('profile');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::resource('employees', EmployeeController::class);Route::get('employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::get('employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::put('employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Group middleware untuk halaman yang membutuhkan login
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::resource('employees', EmployeeController::class);
});
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::resource('employees', EmployeeController::class);
});

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
// Route untuk menampilkan halaman login
Route::get('/', [AuthController::class, 'showLogin'])->name('login');

// Route untuk proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth'); // Pastikan middleware auth ada

