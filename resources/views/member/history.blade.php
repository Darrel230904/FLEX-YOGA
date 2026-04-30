@extends('member.layout')

@section('title', 'My Booking History')

@section('content')
    <section class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <h1 class="font-[Cormorant_Garamond] text-6xl text-[#d7a338] leading-none">Your Bookings</h1>
        <a href="{{ route('member.booking.index') }}" class="member-btn-gold inline-flex items-center justify-center rounded-md px-8 py-3 text-[11px] font-semibold tracking-[0.14em] uppercase">Book New Sanctuary</a>
    </section>

    <section class="member-card rounded-2xl overflow-hidden">
        <div class="grid grid-cols-4 px-6 py-4 border-b border-white/10 uppercase text-[11px] tracking-[0.13em] text-white/60">
            <p>Schedule</p>
            <p>Sanctuary Type</p>
            <p>Status</p>
            <p>Action</p>
        </div>

        @forelse($bookings as $booking)
            @php
                $statusLabel = strtoupper($booking->status);
                $statusClass = match($booking->status) {
                    'active' => 'border-[#ba943f] text-[#d7a338]',
                    'completed' => 'border-slate-200/30 text-slate-200/85',
                    default => 'border-rose-300/40 text-rose-200'
                };
            @endphp
            <div class="grid grid-cols-4 px-6 py-4 border-b border-white/10 text-sm items-center">
                <div>
                    <p class="font-[Cormorant_Garamond] text-3xl leading-none">{{ optional($booking->schedule)->date ? \Carbon\Carbon::parse($booking->schedule->date)->format('d M Y') : '-' }}</p>
                    <p class="text-white/60 text-xs mt-1">
                        {{ optional($booking->schedule)->start_time ? \Carbon\Carbon::parse($booking->schedule->start_time)->format('H:i') : '--:--' }} - {{ optional($booking->schedule)->end_time ? \Carbon\Carbon::parse($booking->schedule->end_time)->format('H:i') : '--:--' }}
                    </p>
                </div>
                <div>
                    <p class="uppercase font-semibold tracking-[0.07em]">{{ optional(optional($booking->schedule)->yogaClass)->name ?? 'Unknown Studio' }}</p>
                    <p class="text-white/60 text-xs mt-1">Ref: Coach {{ optional(optional($booking->schedule)->trainer)->name ?? 'TBA' }}</p>
                </div>
                <div>
                    <span class="inline-flex px-5 py-2 rounded-full border text-[11px] {{ $statusClass }}">{{ $statusLabel }}</span>
                </div>
                <div>
                    @if($booking->status === 'active')
                        <form action="{{ route('member.booking.cancel', $booking) }}" method="POST">
                            @csrf
                            <button class="inline-flex px-5 py-2 rounded-full border border-rose-500/60 text-rose-400 text-[11px] hover:bg-rose-600/10">Revoke</button>
                        </form>
                    @else
                        <span class="text-white/40 text-xs uppercase tracking-[0.08em]">-</span>
                    @endif
                </div>
            </div>
        @empty
            <div class="px-6 py-12 text-center text-white/65">Belum ada riwayat booking.</div>
        @endforelse
    </section>
@endsection
