<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flex Yoga</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lustria&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-[#0A1628] text-white font-poppins antialiased overflow-x-hidden">

    <header class="absolute top-0 left-0 w-full z-50 pt-8 md:pt-10">
       <nav class="flex items-center justify-between py-5 px-10">
            <a href="/" class="text-white font-bold tracking-widest text-lg">FLEX YOGA</a>

            <div class="hidden md:flex absolute left-1/2 -translate-x-1/2 items-center gap-10 text-[10px] tracking-[0.15em] uppercase font-medium text-white/80">
                @guest
                    <a href="/" class="hover:text-[#FACC15] transition-colors">Dashboard</a>
                    <a href="{{ route('member.booking.index') }}" class="hover:text-[#FACC15] transition-colors">Book A Class</a>
                @else
                    <a href="{{ route('member.home') }}" class="hover:text-[#FACC15] transition-colors">DASHBOARD</a>
                    <a href="{{ route('member.booking.index') }}" class="hover:text-[#FACC15] transition-colors">BOOK A CLASS</a>
                    <a href="{{ route('member.booking.history') }}" class="hover:text-[#FACC15] transition-colors">MY BOOKING</a>
                    <a href="{{ route('member.profile') }}" class="hover:text-[#FACC15] transition-colors">PROFILE</a>
                @endguest
            </div>

            <div class="hidden md:block z-10">
                @guest
                    <a href="{{ route('login') }}" class="rounded-full border border-[#FACC15] bg-[#FACC15]/10 px-6 py-2.5 text-[10px] text-[#FACC15] font-semibold tracking-wider hover:bg-[#FACC15] hover:text-[#0A1628] transition-all">
                        MEMBER SECTION
                    </a>
                @else
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button class="rounded-full border border-[#FACC15] bg-[#FACC15]/10 px-6 py-2.5 text-[10px] text-[#FACC15] font-semibold tracking-wider hover:bg-[#FACC15] hover:text-[#0A1628] transition-all">
                            LOGOUT
                        </button>
                    </form>
                @endguest
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    @stack('scripts')

</body>
</html>