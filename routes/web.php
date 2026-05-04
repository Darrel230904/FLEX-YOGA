<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Member\BookingController as MemberBookingController;
use Illuminate\Support\Facades\Route;

// ==========================================
// 1. PUBLIC ROUTES (LANDING PAGE)
// ==========================================
Route::get('/', [LandingPageController::class, 'index'])->name('landing');

// ==========================================
// 2. GUEST ROUTES (HANYA UNTUK YANG BELUM LOGIN)
// ==========================================
Route::middleware('guest')->group(function () {
    // --- LOGIN MEMBER---
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'loginMember'])->name('login.process');

    // --- LOGIN ADMIN ---
    Route::get('/admin-login', [AuthController::class, 'showAdminLogin'])->name('admin.login');
    Route::post('/admin-login', [AuthController::class, 'loginAdmin'])->name('admin.login.process');

    // --- REGISTRATION ---
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    // LOGIN WHATSAPP
    Route::get('/login/whatsapp', [AuthController::class, 'showWaLogin'])->name('wa.login');
    Route::post('/login/whatsapp', [AuthController::class, 'sendWaOtp'])->name('wa.send.otp');
    Route::get('/login/whatsapp/verify', [AuthController::class, 'showWaVerifyOtp'])->name('wa.verify.otp');
    Route::post('/login/whatsapp/verify', [AuthController::class, 'processWaVerifyOtp'])->name('wa.verify.otp.process');
}); 

// ==========================================
// 3. GLOBAL AUTH ROUTES (BISA DIAKSES GUEST MAUPUN MEMBER)
// ==========================================
// Rute-rute ini diletakkan DI LUAR middleware guest agar member yang sedang login bisa mengaksesnya saat update security

// --- AUTH ADMIN (OTP & RESET) ---
Route::get('/admin-forgot-password', [AuthController::class, 'showAdminForgotPassword'])->name('admin.forgot.password');
Route::post('/admin-forgot-password', [AuthController::class, 'processAdminForgotPassword'])->name('admin.forgot.password.process');
Route::get('/admin-verify-otp', [AuthController::class, 'showAdminVerifyOtp'])->name('admin.verify.otp');
Route::post('/admin-verify-otp', [AuthController::class, 'processAdminVerifyOtp'])->name('admin.verify.otp.process');
Route::get('/admin-resend-otp', [AuthController::class, 'adminResendOtp'])->name('admin.resend.otp');
Route::get('/admin-reset-password', [AuthController::class, 'showAdminResetPassword'])->name('admin.reset.password');
Route::post('/admin-reset-password', [AuthController::class, 'processAdminResetPassword'])->name('admin.reset.password.process');
Route::get('/admin-reset-success', [AuthController::class, 'showAdminResetSuccess'])->name('admin.reset.success');

// --- FORGOT & RESET PASSWORD MEMBER ---
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('forgot.password');
Route::post('/forgot-password', [AuthController::class, 'processForgotPassword'])->name('forgot.password.process');
Route::get('/verify-otp', [AuthController::class, 'showVerifyOtp'])->name('verify.otp');
Route::post('/verify-otp', [AuthController::class, 'processVerifyOtp'])->name('verify.otp.process');
Route::get('/resend-otp', [AuthController::class, 'resendOtp'])->name('resend.otp');
Route::get('/reset-password', [AuthController::class, 'showResetPassword'])->name('reset.password');
Route::post('/reset-password', [AuthController::class, 'processResetPassword'])->name('reset.password.process');
Route::get('/reset-success', [AuthController::class, 'showResetSuccess'])->name('reset.success');


// ==========================================
// 4. LOGOUT (HARUS LOGIN)
// ==========================================
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// ==========================================
// 5. CMS ADMIN SECTION
// ==========================================
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
});

// ==========================================
// 6. MEMBER SECTION
// ==========================================
Route::middleware(['auth', 'role:member'])->prefix('member')->name('member.')->group(function () {
    
    // RUTE BEBAS (Boleh diakses meski profil belum lengkap)
    Route::get('/home', [MemberBookingController::class, 'dashboard'])->name('home');
    Route::get('/profile', [MemberBookingController::class, 'profile'])->name('profile');
    Route::post('/profile', [MemberBookingController::class, 'updateProfile'])->name('profile.update'); 
    
    // PASTIKAN RUTE INI ADA DAN NAMANYA BENAR:
    Route::get('/security-update', [AuthController::class, 'requestSecurityUpdate'])->name('security.request');
    
    // RUTE PROTEKSI KETAT (Wajib lengkapi profil)
    Route::middleware(['profile.completed'])->group(function () {
        // Halaman Booking
        Route::get('/booking', [MemberBookingController::class, 'index'])->name('booking.index');
        Route::post('/booking/{schedule}', [MemberBookingController::class, 'store'])->name('booking.store');
        
        // Halaman Riwayat Booking
        Route::get('/my-bookings', [MemberBookingController::class, 'history'])->name('booking.history');
        Route::post('/my-bookings/{booking}/cancel', [MemberBookingController::class, 'cancel'])->name('booking.cancel');
    });

});