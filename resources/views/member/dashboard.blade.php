@extends('member.layout')

@section('title', 'Member Dashboard')

@section('content')
    <section class="member-dashboard-wrap mx-auto max-w-[1320px] px-4 md:px-6 pb-5 md:pb-8 pt-6 md:pt-8">
        <div class="flex items-center justify-center gap-4 md:gap-6 text-[#c08b22] mb-3 md:mb-4">
            <span class="member-hero-rule"></span>
            <p class="text-[11px] md:text-[14px] tracking-[0.12em] uppercase">Welcome Back</p>
            <span class="member-hero-rule"></span>
        </div>

        <h1 class="text-center font-[Cormorant_Garamond] text-[48px] leading-none md:text-[66px]">Member Flex Yoga</h1>

        <div class="grid lg:grid-cols-2 gap-6 md:gap-8 mt-10 md:mt-14">
            <article class="member-card member-home-card rounded-[24px] p-7 md:p-9 min-h-[330px] md:min-h-[380px]">
                <div class="flex justify-between items-center mb-7 md:mb-10 gap-4">
                    <p class="text-[12px] uppercase tracking-[0.12em] text-white/45 font-semibold">Active Membership</p>
                    <span class="px-5 py-1.5 rounded-full border border-[#b98f38] bg-[#b98f38]/12 text-[9px] tracking-[0.08em] text-[#b98f38] uppercase">Verified Active</span>
                </div>

                <h2 class="font-[Cormorant_Garamond] text-[42px] md:text-[52px] leading-none">4 Session Pack</h2>
                <p class="mt-3 text-[12px] uppercase tracking-[0.08em] text-white/52">Valid until: 30 Jun {{ now()->year }}</p>

                <div class="mt-7 md:mt-8 border-t border-white/25 pt-6">
                    <p class="text-[12px] uppercase tracking-[0.08em] text-white/52">Remaining Sanctuary Session</p>
                    <p class="text-[46px] md:text-[58px] mt-4 font-[Cormorant_Garamond] leading-none"><span class="text-[#c08b22]">{{ $membershipRemaining }}</span><span class="text-white/90">/{{ $membershipTotal }}</span></p>
                </div>
            </article>

            <article class="member-card member-home-card rounded-[24px] p-7 md:p-9 min-h-[330px] md:min-h-[380px]">
                <p class="text-[12px] uppercase tracking-[0.2em] text-white/48 font-semibold">Sanctuary History</p>

                <div class="grid grid-cols-2 mt-12 md:mt-14 text-center">
                    <div>
                        <p class="text-[46px] md:text-[60px] font-[Cormorant_Garamond] text-[#c08b22] leading-none">{{ $upcomingCount }}</p>
                        <p class="text-[11px] md:text-[12px] mt-3 tracking-[0.24em] uppercase text-white/60 font-semibold">Upcoming</p>
                    </div>
                    <div>
                        <p class="text-[46px] md:text-[60px] font-[Cormorant_Garamond] text-[#c08b22] leading-none">{{ $finishedCount }}</p>
                        <p class="text-[11px] md:text-[12px] mt-3 tracking-[0.24em] uppercase text-white/60 font-semibold">Finished</p>
                    </div>
                </div>

                <a href="{{ route('member.booking.index') }}" class="member-btn-gold w-full inline-flex items-center justify-center py-3.5 rounded-md text-[11px] font-semibold tracking-[0.18em] uppercase mt-14 md:mt-16">Book Your Next Sanctuary</a>
            </article>
        </div>
    </section>
@endsection
