<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Member Area - Flex Yoga')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="member-shell min-h-screen text-white">
    <div class="member-overlay"></div>

    <header class="member-header">
        <nav class="member-nav max-w-[1200px] mx-auto px-6 py-5">
            <div class="hidden md:flex gap-10 text-[11px] tracking-[0.08em] uppercase text-white/70">
                <a href="{{ route('member.home') }}" class="{{ request()->routeIs('member.home') ? 'text-white font-semibold' : 'hover:text-white' }}">Dashboard</a>
                <a href="{{ route('member.booking.index') }}" class="{{ request()->routeIs('member.booking.index') ? 'text-white font-semibold' : 'hover:text-white' }}">Book A Class</a>
                <a href="{{ route('member.booking.history') }}" class="{{ request()->routeIs('member.booking.history') ? 'text-white font-semibold' : 'hover:text-white' }}">MyBooking</a>
                <a href="{{ route('member.profile') }}" class="{{ request()->routeIs('member.profile') ? 'text-white font-semibold' : 'hover:text-white' }}">Profile</a>
            </div>

            <div class="flex items-center gap-3 ml-auto">
                <div class="text-right leading-tight">
                    <p class="text-[9px] uppercase tracking-[0.11em] text-white/60">Active Member</p>
                    <p class="text-[13px] font-semibold tracking-[0.04em]">{{ strtoupper(Auth::user()->name) }}</p>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="w-10 h-10 rounded-full border border-white/35 flex items-center justify-center hover:border-[#e1b44f] hover:text-[#e1b44f] transition-colors" title="Logout" aria-label="Logout">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M15 3h3a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3h-3" stroke-linecap="round" />
                            <path d="M10 17l5-5-5-5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M15 12H3" stroke-linecap="round"/>
                        </svg>
                    </button>
                </form>
            </div>
        </nav>
    </header>

    <main class="relative z-10 w-full px-2 pb-2 pt-2">
        @if(session('success'))
            <div class="mb-5 rounded-xl border border-emerald-300/35 bg-emerald-400/10 px-4 py-3 text-sm text-emerald-200">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-5 rounded-xl border border-rose-300/35 bg-rose-400/10 px-4 py-3 text-sm text-rose-200">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>
