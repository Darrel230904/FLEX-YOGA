<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class BookingController extends Controller
{
    // 1. Halaman Dashboard Member (Home)
    public function dashboard()
    {
        $user = Auth::user();

        $upcomingCount = Booking::where('user_id', $user->id)
            ->where('status', 'active')
            ->whereHas('schedule', function ($query) {
                $query->where('date', '>=', now()->toDateString());
            })
            ->count();

        $finishedCount = Booking::where('user_id', $user->id)
            ->where(function ($query) {
                $query->where('status', 'completed')
                    ->orWhereHas('schedule', function ($scheduleQuery) {
                        $scheduleQuery->where('date', '<', now()->toDateString());
                    });
            })
            ->count();

        $membershipTotal = 4;
        $membershipRemaining = max($membershipTotal - $upcomingCount, 0);

        return view('member.dashboard', compact(
            'user',
            'upcomingCount',
            'finishedCount',
            'membershipTotal',
            'membershipRemaining'
        ));
    }

    // 2. Halaman Book A Class (Daftar Kelas)
    public function index()
    {
        $schedules = Schedule::with(['yogaClass', 'trainer'])
            ->withCount('bookings')
            ->where('date', '>=', now()->toDateString())
            ->orderBy('date')
            ->orderBy('start_time')
            ->get();

        return view('member.booking', compact('schedules'));
    }

    // 3. Proses Simpan Booking (Logika Anda yang sudah benar)
    public function store(Schedule $schedule)
    {
        // Cek apakah kuota masih tersedia (Otomatisasi Slot)
        $currentBookings = $schedule->bookings()->count();
        
        if ($currentBookings >= $schedule->quota) {
            return redirect()->back()->with('error', 'Maaf, slot kelas ini sudah penuh!');
        }

        // Cek apakah user sudah booking kelas yang sama
        $exists = Booking::where('user_id', Auth::id())
            ->where('schedule_id', $schedule->id)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Anda sudah terdaftar di kelas ini.');
        }

        // Simpan Booking
        Booking::create([
            'user_id' => Auth::id(),
            'schedule_id' => $schedule->id,
            'status' => 'active',
            'booking_date' => now(),
        ]);

        return redirect()->route('member.booking.history')->with('success', 'Booking berhasil!');
    }

    // 4. Halaman Riwayat Booking (My Booking)
    public function history()
    {
        $bookings = Booking::with(['schedule.yogaClass', 'schedule.trainer'])
            ->where('user_id', Auth::id())
            ->latest('booking_date')
            ->get();

        return view('member.history', compact('bookings'));
    }

    // 5. Halaman Profil Member
    public function profile()
    {
        $user = Auth::user();

        return view('member.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $data = $request->validate([
            'name' => ['required', 'string', 'min:1', 'max:50', 'regex:/^[a-zA-Z\s\.\-\']+$/'],
            'phone_number' => ['required', 'string', 'min:6', 'max:15', 'regex:/^[0-9]+$/', Rule::unique('users', 'phone_number')->ignore($user->id)],
            'email' => ['required', 'string', 'email', 'min:6', 'max:100', Rule::unique('users', 'email')->ignore($user->id)],
        ], [
            'name.regex' => 'Format nama hanya boleh berisi huruf, spasi, titik (.), strip (-), dan petik (\').',
            'phone_number.regex' => 'Nomor telepon hanya boleh berisi angka.',
            'phone_number.min' => 'Nomor telepon minimal 6 angka.',
            'phone_number.max' => 'Nomor telepon maksimal 15 angka.',
        ]);

        $user->name = $data['name'];
        $user->phone_number = $data['phone_number'];
        $user->email = $data['email'];
        $user->save();

        return redirect()->route('member.profile')->with('success', 'Profil berhasil diperbarui.');
    }

    public function cancel(Booking $booking)
    {
        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }

        if ($booking->status !== 'active') {
            return redirect()->route('member.booking.history')->with('error', 'Booking ini tidak dapat dibatalkan.');
        }

        $booking->update([
            'status' => 'cancelled',
        ]);

        return redirect()->route('member.booking.history')->with('success', 'Booking berhasil dibatalkan.');
    }
}