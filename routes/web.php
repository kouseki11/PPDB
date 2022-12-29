<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\User\PdfController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\LandingPageController;
use App\Http\Controllers\User\DashboardUserController;

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


Route::middleware(['isLogin', 'CheckRole:admin'])->group(function(){
    Route::get('/dashboard/payment/buktiPembayaran/{id}', [PaymentController::class, 'buktiPembayaran'])->name('bukti.pembayaran');
    Route::get('/dashboard/payment/detailPendaftaran/{id}', [PaymentController::class, 'detailPendaftaran'])->name('detail.pendaftaran');
    Route::get('/dashboard/contact', [ContactController::class, 'index'])->name('dashboard.contact');
    Route::get('/dashboard/contact/detailContact/{id}', [ContactController::class, 'detailContact'])->name('detail.message');
});

Route::middleware('isGuest')->group(function(){
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login/auth',[LoginController::class, 'auth'])->name('login.auth');
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register/create',[RegisterController::class, 'register'])->name('register.create');
});

Route::middleware('isLogin', 'CheckRole:admin,user')->group(function(){
    Route::patch('/rejected/{id}',[PaymentController::class, 'tolak'])->name('tolakPembayaran');
    Route::patch('/accepted/{id}',[PaymentController::class, 'validasi'])->name('validasiPembayaran');
    Route::get('/dashboard', [DashboardUserController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/payment', [PaymentController::class, 'index'])->name('dashboard.payment');
    Route::post('/dashbord/payment/create', [PaymentController::class, 'store'])->name('payment.create');
    Route::patch('/dashbord/payment/update/{id}', [PaymentController::class, 'update'])->name('payment.update');
    Route::get('/error', [DashboardUserController::class, 'error'])->name('error');
});

Route::middleware('isLogin', 'CheckRole:user')->group(function(){
});

Route::get('/', [LandingPageController::class, 'index'])->name('landing.page');
Route::post('/message', [LandingPageController::class, 'store'])->name('landing.message');
Route::post('/logout/auth', [LoginController::class, 'logout'])->name('logout.auth');

