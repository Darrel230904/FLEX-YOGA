<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Mail\PasswordChangedNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\ResetPasswordOTP;
use Carbon\Carbon;


class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showAdminLogin()
    {
        return view('admin.auth.admin-login');
    }

    // ==========================================
    // PROSES LOGIKA UNTUK ADMIN
    // ==========================================
        public function showAdminForgotPassword() {
            return view('admin.auth.admin-forgot-password');
        }

        public function showAdminVerifyOtp() {
        // Cek session khusus admin, jika tidak ada tendang ke halaman awal
            if (!session('admin_reset_email')) return redirect()->route('admin.forgot.password');
            return view('admin.auth.admin-verify-otp');
        }

        public function showAdminResetPassword() {
        // Cek session verifikasi admin
            if (!session('admin_otp_verified')) return redirect()->route('admin.forgot.password');
            return view('admin.auth.admin-reset-password');
        }

        public function showAdminResetSuccess() {
            return view('admin.auth.admin-reset-success');
        }
            
        public function processAdminForgotPassword(Request $request) {
            $request->validate(['email' => ['required', 'email']],
            [
                'email.required' => 'Email is required',
                'email.email' => 'Invalid email format'
            ]);

            $user = User::where('email', $request->email)->where('role', 'admin')->first();
    
        if (!$user) {
                return back()->withErrors(['email' => 'Admin account not found in our system.']);
            }

            // Generate 4 Digit OTP
            $otp = rand(1000, 9999);

            // Simpan OTP ke tabel password_reset_tokens
            DB::table('password_reset_tokens')->updateOrInsert(
                ['email' => $request->email],
                ['token' => $otp, 'created_at' => Carbon::now()]
            );

            // Kirim email
            Mail::to($request->email)->send(new ResetPasswordOTP($otp));

            // Simpan email ke session dengan NAMA KHUSUS ADMIN
            session(['admin_reset_email' => $request->email]);
                return redirect()->route('admin.verify.otp');
        }

        public function processAdminVerifyOtp(Request $request) {
            $otp = $request->otp1 . $request->otp2 . $request->otp3 . $request->otp4;
            $email = session('admin_reset_email'); // Ambil dari session admin

            $record = DB::table('password_reset_tokens')->where('email', $email)->where('token', $otp)->first();

        if (!$record) {
            return back()->withErrors(['otp' => 'Invalid or expired verification code.']);
        }

        // OTP Benar, izinkan reset password admin
            session(['admin_otp_verified' => true]);
            return redirect()->route('admin.reset.password');
        }

        public function adminResendOtp(Request $request) {
            $email = session('admin_reset_email');

            if (!$email) {
                return redirect()->route('admin.forgot.password')->withErrors(['email' => 'Session expired. Please request a new code.']);
            }

            $newOtp = rand(1000, 9999);

            DB::table('password_reset_tokens')->updateOrInsert(
                ['email' => $email],
                ['token' => $newOtp, 'created_at' => Carbon::now()]
            );

            Mail::to($email)->send(new ResetPasswordOTP($newOtp));

            return back()->with('success', 'A new code has been sent to your email!');
        }

        public function processAdminResetPassword(Request $request) {
            $request->validate([
                'password' => ['required', 'min:8', 'confirmed']
            ], [
                'password.required' => 'Password is required',
                'password.confirmed' => 'Passwords do not match',
            ]);

            $email = session('admin_reset_email');
            $user = User::where('email', $email)->first();

            if (Hash::check($request->password, $user->password)) {
                return back()->withErrors(['password' => 'New password cannot be the same as your old password.']);
            }

            $user->password = Hash::make($request->password);
            $user->save();

            Mail::to($user->email)->send(new PasswordChangedNotification());

            DB::table('password_reset_tokens')->where('email', $email)->delete();
            
            // Bersihkan session admin
            session()->forget(['admin_reset_email', 'admin_otp_verified']);

            return redirect()->route('admin.reset.success');
        }

    public function showRegister()
    {
        return view('auth.register'); 
    }

    public function register(Request $request)
    {
        // 1. Validasi Data
        $data = $request->validate([
            // Alphabet, spasi, titik, strip, petik tunggal, min 1, max 50
            'name' => ['required', 'string', 'min:1', 'max:50', 'regex:/^[a-zA-Z\s\.\-\']+$/'],
            
            // Format email standar, min 6, max 100, wajib unik (belum terdaftar)
            'email' => ['required', 'string', 'email', 'min:6', 'max:100', 'unique:users'],
            
            // Angka saja, min 6, max 15, wajib unik di tabel users kolom phone_number
            'phone_number' => ['required', 'string', 'min:6', 'max:15', 'regex:/^[0-9]+$/', 'unique:users,phone_number'],
            
            // Min 8, max 20, dan wajib sama dengan password_confirmation
            'password' => ['required', 'string', 'min:8', 'max:20', 'confirmed'],
        ], [
            // Kustomisasi pesan error (Opsional agar bahasa lebih enak dibaca)
            'name.regex' => 'Format nama hanya boleh berisi huruf, spasi, titik (.), strip (-), dan petik (\').',
            'phone_number.regex' => 'Nomor telepon hanya boleh berisi angka.',
            'phone_number.min' => 'Nomor telepon minimal 6 angka.',
            'phone_number.max' => 'Nomor telepon maksimal 15 angka.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.'
        ]);

        // 2. Hash password dan set role
        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'member';
        
        // 3. Simpan ke database
        User::create($data);
        
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // PROSES LOGIN MEMBER
    public function loginMember(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // TAHAP 1: Cari user berdasarkan email DAN role member
        $user = User::where('email', $request->email)->where('role', 'member')->first();

        // KONDISI 1: Jika email tidak ditemukan / bukan member
        if (!$user) {
            return back()->withErrors(['email' => 'Email salah atau tidak terdaftar sebagai Member flex yoga.'])->withInput($request->only('email'));
        }

        // KONDISI 2: Jika email valid tetapi password salah
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password yang Anda masukkan salah.'])->withInput($request->only('email'));
        }

        // JIKA SEMUA BENAR: Lakukan login
        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->intended(route('member.home'));
    }

    // PROSES LOGIN ADMIN
    public function loginAdmin(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // TAHAP 1: Cari user berdasarkan email DAN role admin
        $user = User::where('email', $request->email)->where('role', 'admin')->first();

        // KONDISI 1: Jika email tidak ditemukan / bukan admin
        if (!$user) {
            return back()->withErrors(['email' => 'Email salah atau tidak terdaftar sebagai Admin.'])->withInput($request->only('email'));
        }

        
        // KONDISI 2: Jika email valid tetapi password salah
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password yang Anda masukkan salah.'])->withInput($request->only('email'));
        }

        // JIKA SEMUA BENAR: Lakukan login
        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->intended(route('admin.dashboard'));
    }

    public function logout(Request $request)
    {
        // 1. TANGKAP ROLE USER SEBELUM LOGOUT
        // simpan dulu role-nya di sebuah variabel sementara
        $role = Auth::user() ? Auth::user()->role : 'member';

        // 2. PROSES LOGOUT STANDAR LARAVEL
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // 3. ARAHKAN (REDIRECT) BERDASARKAN ROLE TADI
        if ($role === 'admin') {
            return redirect()->route('admin.login');
        }

        // Jika dia member (atau tidak terdeteksi), kembalikan ke login biasa
        return redirect()->route('login');
    }


    public function showForgotPassword() {
        return view('auth.forgot-password');
    }

    public function showResetPasswordRequest() {
        return view('auth.reset-password-request');
    }

    // Proses Kirim Email & OTP
    public function processForgotPassword(Request $request) {
        $request->validate([
            'email' => ['required', 'email']
        ], [
            'email.required' => 'email is required',
            'email.email' => 'Invalid email format'
        ]);

        // Cek apakah email ada di database
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Email not found in our system.']);
        }

        // Generate 4 Digit OTP
        $otp = rand(1000, 9999);

        // Simpan OTP ke tabel password_reset_tokens
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            ['token' => $otp, 'created_at' => Carbon::now()]
        );

        // Kirim email (Akan error jika .env mail belum disetting)
        Mail::to($request->email)->send(new ResetPasswordOTP($otp));

        // Simpan email ke session untuk tahap verifikasi
        session(['reset_email' => $request->email]);

        return redirect()->route('verify.otp');
    }

    // Tampilkan Halaman Input OTP
    public function showVerifyOtp() {
        if (!session('reset_email')) return redirect()->route('forgot.password');
        return view('auth.verify-otp');
    }

    // Proses Verifikasi OTP
    public function processVerifyOtp(Request $request) {
        $otp = $request->otp1 . $request->otp2 . $request->otp3 . $request->otp4;
        $email = session('reset_email');

        $record = DB::table('password_reset_tokens')->where('email', $email)->where('token', $otp)->first();

        if (!$record) {
            return back()->withErrors(['otp' => 'Invalid or expired verification code.']);
        }

        // OTP Benar, izinkan reset password
        session(['otp_verified' => true]);
        return redirect()->route('reset.password');
    }

    // Tampilkan Halaman Input Password Baru
    public function showResetPassword() {
        if (!session('otp_verified')) return redirect()->route('forgot.password');
        return view('auth.reset-password');
    }

    // Proses Update Password
    public function processResetPassword(Request $request) {
        $request->validate([
            'password' => ['required', 'min:8', 'confirmed']
        ], [
            'password.required' => 'Password is required',
            'password.confirmed' => 'Passwords do not match',
        ]);

        $email = session('reset_email');
        $user = User::where('email', $email)->first();

        // Validasi: Password baru tidak boleh sama dengan password lama
        if (Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'New password cannot be the same as your old password.']);
        }

        // Update ke database
        $user->password = Hash::make($request->password);
        $user->save();

        // ---------------------------------------------------------
        // KIRIM EMAIL NOTIFIKASI PERGANTIAN PASSWORD
        // ---------------------------------------------------------
        Mail::to($user->email)->send(new PasswordChangedNotification());

        // Bersihkan token dan session
        DB::table('password_reset_tokens')->where('email', $email)->delete();
        session()->forget(['reset_email', 'otp_verified']);

        return redirect()->route('reset.success');
    }

    // 7. Tampilkan Halaman Success
    public function showResetSuccess() {
        return view('auth.reset-success');
    }

    public function resendOtp()
    {
        // 1. Ambil email dari session (UBAH 'email' menjadi 'reset_email')
        $email = session('reset_email');

        // Jika session tidak ada, kembalikan ke forgot password
        if (!$email) {
            return redirect()->route('forgot.password')->withErrors(['email' => 'Session expired. Please request a new code.']);
        }

        // 2. Generate ulang kode OTP 4 digit baru
        $newOtp = rand(1000, 9999);

        // 3. Update kode OTP di database password_reset_tokens
        \Illuminate\Support\Facades\DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $email],
            ['token' => $newOtp, 'created_at' => \Carbon\Carbon::now()]
        );

        // 4. Kirim ulang email
        \Illuminate\Support\Facades\Mail::to($email)->send(new \App\Mail\ResetPasswordOTP($newOtp));

        // 5. Kembalikan user ke halaman verify-otp dengan pesan sukses
        return back()->with('success', 'A new code has been sent to your email!');
    }


    // UPDATE CORE SECURITY (MEMBER LOGIN)
    public function requestSecurityUpdate() 
    {
        // 1. Ambil data user yang sedang login saat ini
        $user = Auth::user();

        // 2. Generate 4 Digit OTP
        $otp = rand(1000, 9999);

        // 3. Simpan ke database password_reset_tokens
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $user->email],
            ['token' => $otp, 'created_at' => Carbon::now()]
        );

        // 4. Kirim Email OTP
        Mail::to($user->email)->send(new ResetPasswordOTP($otp));

        // 5. Simpan session email agar dikenali di halaman verifikasi
        session(['reset_email' => $user->email]);

        // 6. Langsung arahkan ke halaman input OTP
        return redirect()->route('verify.otp')->with('success', 'Kode keamanan telah dikirim ke email Anda.');
    }

    // ==========================================
    // LOGIN DENGAN WHATSAPP
    // ==========================================
    
    // 1. Tampilkan Halaman Input Nomor WA
    public function showWaLogin() {
        return view('auth.wa-login'); 
    }

    // 2. Proses Kirim OTP WA
    public function sendWaOtp(Request $request) {
        $request->validate([
            'phone_number' => 'required|numeric|min:9'
        ]);

        $phone = $request->phone_number;
        // Generate 5 Digit OTP (Sesuai dengan 5 garis di desain UI Anda)
        $otp = rand(10000, 99999); 

        // TODO: Integrasikan dengan API WhatsApp Gateway Anda di sini (misal: Fonnte, Wablas, atau Twilio)
        // Http::post('URL_WA_GATEWAY', ['phone' => $phone, 'message' => "Kode OTP Flex Yoga Anda: $otp"]);
        
        // Untuk testing lokal, kita log saja OTP-nya:
        \Illuminate\Support\Facades\Log::info("OTP WA untuk $phone adalah: $otp");

        // Simpan ke session
        session(['wa_phone' => $phone, 'wa_otp' => $otp]);

        return redirect()->route('wa.verify.otp');
    }

    // 3. Tampilkan Halaman Input OTP
    public function showWaVerifyOtp() {
        if (!session('wa_phone')) return redirect()->route('wa.login');
        return view('auth.wa-verify');
    }

    // 4. Proses Verifikasi & Login
    public function processWaVerifyOtp(Request $request) {
        // Asumsi input dari 5 kotak digabung menjadi 1 string bernama 'otp'
        $request->validate(['otp_code' => 'required|numeric|digits:5']);

        if ($request->otp_code != session('wa_otp')) {
        return back()->withErrors(['otp' => 'Kode OTP salah atau tidak valid.']);
        }

        $phone = session('wa_phone');

        // Cari user berdasarkan nomor HP, JIKA TIDAK ADA, otomatis buatkan user baru
        $user = User::firstOrCreate(
            ['phone_number' => $phone],
            [
                'name' => 'Username', // Nama sementara
                'email' => $phone . '@wa.local', // Email sementara yang unik
                'password' => \Illuminate\Support\Facades\Hash::make(\Illuminate\Support\Str::random(16)), // Password acak yang tidak akan dipakai
                'role' => 'member'
            ]
        );

        // Lakukan Login
        Auth::login($user);
        
        // Bersihkan session OTP
        session()->forget(['wa_phone', 'wa_otp']);

        // Arahkan ke rute utama member (Home/Dashboard)
        return redirect()->route('member.home');
    }
}