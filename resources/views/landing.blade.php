@extends('layouts.app')

@section('content')

<div class="w-full pb-10">

    <section class="relative pt-36 pb-20 overflow-hidden" style="background-image: url('{{ asset('images/bg-auth-page.png') }}');">

        <div class="max-w-[1200px] mx-auto px-6 md:px-10 relative grid lg:grid-cols-2 gap-10 items-center min-h-[500px]">
            
            <div class="relative z-10 w-full mt-10 md:mt-0">
                <p class="text-white/90 text-4xl md:text-[46px] leading-tight font-light tracking-wide" style="font-family: 'Lustria', serif;">Your Yoga Journey</p>
                <h1 class="text-[#F2B632] text-4xl md:text-[46px] leading-tight font-light tracking-wide" style="font-family: 'Lustria', serif;">Starts Here</h1>
                
                <p class="text-[#8e9cba] text-[13px] md:text-[14px] max-w-[500px] leading-[2] mb-10" style="font-family: 'poppins', sans-serif;">
                    Discover tranquility and strength at Flex Yoga. We provide a sanctuary for your physical and mental transformation with expert masters.
                </p>
            </div>

            <div class="relative flex justify-center items-center mt-16 md:mt-0">
                
                <div class="absolute z-0 text-center text-[150px] md:text-[230px] text-white select-none" 
                     style="
                        line-height: 1.30; 
                        letter-spacing: 0.4em; 
                        color: #f8fbff;
                        text-shadow:
                            0 0 8px rgba(255,255,255,0.95),
                            0 0 24px rgba(255,255,255,0.85),
                            0 0 46px rgba(188,220,255,0.65),
                            0 0 80px rgba(122,173,255,0.45);
                        font-family: 'Lustria', serif;
                        top: 50%;
                        left: 60%;
                        transform: translate(-50%, -50%);">
                    YO<br>GA
                </div>

                <img
                    src="{{ asset('images/lp-yoga-1.png') }}"
                    alt="Yoga Hero Pose"
                    class="relative z-10 w-full max-w-[500px] drop-shadow-2xl translate-x-0 translate-y-0 md:translate-x-[-10px] md:-translate-y-[100px]"
                >
            </div>
        </div>
    </section>

    <div class="bg-[#021939] py-6 md:py-10">

        <section class="max-w-[1200px] mx-auto px-6 md:px-10 mt-1 relative z-10" style="font-family: 'Poppins', sans-serif;">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <p class="text-[#8E6C26] text-2xl font-medium">1.5K</p>
                    <p class="text-[10px] tracking-[0.15em] text-[#8e9cba] uppercase mt-2">Active Members</p>
                </div>
                <div>
                    <p class="text-[#8E6C26] text-2xl font-medium">12+</p>
                    <p class="text-[10px] tracking-[0.15em] text-[#8e9cba] uppercase mt-2">Expert Training</p>
                </div>
                <div>
                    <p class="text-[#8E6C26] text-2xl font-medium">25</p>
                    <p class="text-[10px] tracking-[0.15em] text-[#8e9cba] uppercase mt-2">Yoga Classes</p>
                </div>
                <div>
                    <p class="text-[#8E6C26] text-2xl font-medium">4.9/5</p>
                    <p class="text-[10px] tracking-[0.15em] text-[#8e9cba] uppercase mt-2">Studio Reward</p>
                </div>
            </div>
        </section>

        <section class="max-w-[1200px] mx-auto px-6 md:px-10 mt-20 grid lg:grid-cols-2 gap-12 items-center">
            <div class="relative">
                <img src="{{ asset('images/lp-yoga-2.png') }}" 
                alt="Balance Yoga" class="w-full h-[300px] md:h-[380px]" style="border-radius: 15px 15px 15px 15px;">
            </div>
            <div class="max-w-[620px]">
                <p class="text-[14px] tracking-[0.01em] text-[#8E6C26] font-normal uppercase" style="font-family: 'Lustria', serif;">ABOUT YOGA</p>
                <h2 class="text-white text-[58px] md:text-[55px] leading-[1.06] mt-3 font-normal tracking-[0.01em]" style="font-family: 'Lustria', serif;">We Help You Find<br>Balance & Clarity</h2>
                <p class="text-[#808C9C] mt-7 leading-[1.45] text-[14px] font-normal" style="font-family: 'Poppins', sans-serif;">
                    sky yoga was founded with a single mission: to provide a high-end sanctuary where everyone can explore the profound benefits of yoga. our studio in the heart of senopati offers state-of-the-art facilities and a curated team of masters dedicated to your growth.
                </p>

                <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-x-10 gap-y-4" style="font-family: 'Poppins', sans-serif;">
                    <div class="flex items-center gap-3 text-white text-[12px] uppercase tracking-[0.01em]">
                        <span class="w-6 h-6 rounded-full border border-[#8E6C26] text-[#8E6C26] flex items-center justify-center text-[10px] leading-none">✓</span>
                        <span>EXPERT MODERN FACILITIES</span>
                    </div>
                    <div class="flex items-center gap-3 text-white text-[12px] uppercase tracking-[0.01em]">
                        <span class="w-6 h-6 rounded-full border border-[#8E6C26] text-[#8E6C26] flex items-center justify-center text-[10px] leading-none">✓</span>
                        <span>CERTIFIED YOGA MASTERS</span>
                    </div>
                    <div class="flex items-center gap-3 text-white text-[12px] uppercase tracking-[0.01em]">
                        <span class="w-6 h-6 rounded-full border border-[#8E6C26] text-[#8E6C26] flex items-center justify-center text-[10px] leading-none">✓</span>
                        <span>MINDFUL COMMUNITY</span>
                    </div>
                    <div class="flex items-center gap-3 text-white text-[12px] uppercase tracking-[0.01em]">
                        <span class="w-6 h-6 rounded-full border border-[#8E6C26] text-[#8E6C26] flex items-center justify-center text-[10px] leading-none">✓</span>
                        <span>HOLISTIC PRACTICE STYLE</span>
                    </div>
                </div>
            </div>
        </section>

        <section id="classes" class="max-w-[1200px] mx-auto px-6 md:px-10 mt-28">
            <div class="flex items-center justify-center gap-5">
                <span class="h-px w-24 md:w-32 bg-white/45"></span>
                <p class="text-center text-[12px] uppercase tracking-[0.12em] text-white/90" style="font-family: 'Poppins', sans-serif;">Explore Schedule</p>
                <span class="h-px w-24 md:w-32 bg-white/45"></span>
            </div>

            <h2 class="text-center text-white text-[55px] md:text-[58px] leading-[1.05] mt-4 font-normal" style="font-family: 'Lustria', serif;">Upcoming Sessions</h2>
            <p class="text-center text-[#808C9C] text-[14px] mt-4 max-w-[620px] mx-auto leading-[1.45]" style="font-family: 'Poppins', sans-serif;">
                Discover our signature practices, each designed to specifically target your physical and emotional needs.
            </p>

            <div class="mt-12 grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($schedules as $schedule)
                    @php
                        $className = $schedule->yogaClass->name ?? 'Yoga Session';
                        $classNameLower = strtolower($className);
                        $studioLabel = 'DYNAMIC STUDIO';

                        if (str_contains($classNameLower, 'hatha')) {
                            $studioLabel = 'TRADITIONAL STUDIO';
                        } elseif (str_contains($classNameLower, 'yin')) {
                            $studioLabel = 'THERAPEUTIC STUDIO';
                        } elseif (str_contains($classNameLower, 'power')) {
                            $studioLabel = 'STRENGTH STUDIO';
                        }

                        $coachName = $schedule->trainer->name ?? 'Coach';
                        $bookedCount = (int) ($schedule->bookings_count ?? 0);
                        $quota = max(1, (int) ($schedule->quota ?? 20));
                        $occupancyPercent = min(100, (int) round(($bookedCount / $quota) * 100));

                        $startTime = is_string($schedule->start_time) ? substr($schedule->start_time, 0, 5) : '';
                        $endTime = is_string($schedule->end_time) ? substr($schedule->end_time, 0, 5) : '';
                        $dateText = $schedule->date;
                    @endphp

                    <div class="rounded-[26px] overflow-hidden bg-[#0D274B] border border-[#8E6C26]/70 shadow-[0_0_22px_rgba(0,0,0,0.32)]">
                        <div class="p-6">
                            <p class="text-white text-[16px] md:text-[18px] uppercase tracking-[0.08em]" style="font-family: 'Lustria', serif;">{{ $className }}</p>

                            <div class="mt-5 space-y-3 text-white/85 text-[11px] uppercase tracking-[0.14em]" style="font-family: 'Poppins', sans-serif;">
                                <div class="flex items-center gap-3">
                                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M12 12a4 4 0 1 0-4-4 4 4 0 0 0 4 4Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M4 20a8 8 0 0 1 16 0" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span>COACH {{ strtoupper($coachName) }}</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M7 7h10M7 12h10M7 17h10" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                        <path d="M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="1.8"/>
                                    </svg>
                                    <span>{{ $studioLabel }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-[#8E6C26]/45"></div>

                        <div class="p-6">
                            <div class="grid gap-5 text-white/80" style="font-family: 'Poppins', sans-serif;">
                                <div class="flex items-center gap-4">
                                    <div class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                            <path d="M12 7v5l3 2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M12 22a10 10 0 1 0-10-10 10 10 0 0 0 10 10Z" stroke="currentColor" stroke-width="1.8"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-[12px] uppercase tracking-[0.12em] text-white/55 font-semibold">Time Window</p>
                                        <p class="mt-1 text-[14px] font-semibold tracking-[0.04em]">{{ $startTime }} — {{ $endTime }}</p>
                                    </div>
                                </div>

                                <div class="flex items-center gap-4">
                                    <div class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                            <path d="M7 3v3M17 3v3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                            <path d="M3.5 9h17" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                            <path d="M5 6h14a2 2 0 0 1 2 2v13a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="1.8"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-[12px] uppercase tracking-[0.12em] text-white/55 font-semibold">Date</p>
                                        <p class="mt-1 text-[14px] font-semibold tracking-[0.04em]">{{ $dateText }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6">
                                <p class="text-[#8E6C26] text-[12px] uppercase tracking-[0.12em]" style="font-family: 'Poppins', sans-serif;">
                                    Sanctuary Occupancy
                                </p>
                                <p class="mt-1 text-[#F2B632] text-[18px] font-semibold tracking-[0.04em]" style="font-family: 'Poppins', sans-serif;">
                                    {{ $bookedCount }} / {{ $quota }}
                                </p>
                                <div class="mt-3 h-[7px] w-full rounded-full bg-white/85 overflow-hidden">
                                    <div class="h-full rounded-full bg-[#8E6C26]" style="width: {{ $occupancyPercent }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-14">
                <a href="{{ route('member.booking.index') }}" class="inline-block text-white text-[16px] tracking-[0.08em] uppercase border-b border-[#8E6C26]/70 pb-1" style="font-family: 'Poppins', sans-serif;">View Full Schedule</a>
            </div>
        </section>

        <section id="pricing" class="max-w-[1200px] mx-auto px-6 md:px-10 mt-28">

            <!-- Container dengan ukuran dan efek shadow/glow asli Anda -->
            <div class="relative min-h-[200px] md:min-h-[450px] rounded-[28px] overflow-hidden border border-white/35 shadow-[0_0_38px_rgba(255,255,255,0.62)] bg-[#e6e4df] group">
                
                <!-- START: Carousel Track (Berada di lapisan paling dasar / z-0) -->
                <div id="image-carousel" class="absolute inset-0 flex transition-transform duration-700 ease-in-out z-0">
                    @php
                        $carouselSlides = [
                            [
                                'image' => 'images/vinyasa flow - crsl.jpeg',
                                'tag' => 'DYNAMIC',
                                'title' => 'Vinyasa Flow',
                                'description' => 'A Dynamic Flow-Based Class That Synchronizes Breath With Movement, Guiding You Through A Series Of Continuous Poses To Build Strength, Improve Flexibility, And Enhance Focus. This Session Helps Create A Balanced Connection Between Body And Mind While Keeping Your Energy Flowing Throughout The Practice.',
                                'price' => 'RP150.000',
                            ],
                            [
                                'image' => 'images/Power Yoga - crsl.jpeg',
                                'tag' => 'STRENGTH',
                                'title' => 'Power Yoga',
                                'description' => 'A high-intensity yoga session focused on building strength, endurance, and control through powerful, continuous movements. Power Yoga combines dynamic sequences with breathwork to elevate your energy, improve flexibility, and challenge both body and mind.',
                                'price' => 'RP170.000',
                            ],
                            [
                                'image' => 'images/Hatha Yoga - crsl.jpeg',
                                'tag' => 'TRADITIONAL',
                                'title' => 'Hatha Yoga',
                                'description' => 'A traditional and balanced yoga practice focused on foundational postures, controlled breathing, and proper alignment. Hatha Yoga helps improve flexibility, build strength, and create a calm connection between body and mind, making it suitable for all levels, especially beginners.',
                                'price' => 'RP150.000',
                            ],
                            [
                                'image' => 'images/yin Yoga - crsl.jpeg',
                                'tag' => 'THERAPEUTIC',
                                'title' => 'Yin Yoga',
                                'description' => 'A slow and therapeutic yoga practice focused on deep stretching and long-held poses to release tension and improve flexibility. Yin Yoga encourages mindfulness and relaxation, helping to restore balance in both body and mind while promoting inner calm.',
                                'price' => 'RP150.000',
                            ],
                        ];
                    @endphp

                    @foreach($carouselSlides as $slideIndex => $slide)
                        <div class="min-w-full h-full relative">
                            <img src="{{ asset($slide['image']) }}" alt="Gallery {{ $slideIndex + 1 }}" class="absolute inset-0 w-full h-full object-cover">

                            <!-- Lapisan gelap untuk readability (di atas gambar, di bawah teks) -->
                            <div class="absolute inset-0 bg-gradient-to-r from-[#0A1628]/85 via-[#0A1628]/55 to-transparent"></div>

                            <!-- Teks di atas lapisan gelap -->
                            <div class="relative z-10 h-full flex items-center">
                                <div class="pl-14 pr-7 md:pl-20 md:pr-12 max-w-[740px]">
                                    <p class="text-[10px] md:text-[11px] uppercase tracking-[0.24em] text-white/75" style="font-family: 'Poppins', sans-serif;">{{ $slide['tag'] }}</p>
                                    <h3 class="mt-3 text-[#F2B632] text-[36px] md:text-[52px] leading-[1.02] font-normal" style="font-family: 'Lustria', serif;">{{ $slide['title'] }}</h3>
                                    <p class="mt-4 text-white/92 text-[12px] md:text-[14px] leading-[1.75]" style="font-family: 'Poppins', sans-serif;">
                                        {{ $slide['description'] }}
                                    </p>
                                    <p class="mt-5 text-[#F2B632] text-[14px] md:text-[16px] font-semibold" style="font-family: 'Poppins', sans-serif;">
                                        {{ $slide['price'] }} <span class="text-[#F2B632]/90 font-normal text-[12px] md:text-[14px]">/ session</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- END: Carousel Track -->

                <!-- Ornamen Bintang -->
                <div class="relative z-30 px-6 md:px-10 pt-8 pb-8 pointer-events-none">
                    <div class="flex justify-center mb-12 text-[#F2B632] text-2xl tracking-widest">
                        ★ ★ ✿ ★ ★
                    </div>
                </div>

                <!-- Tombol Navigasi Kiri (Elegan: Tanpa background, panah lebih tipis & responsif) -->
                <button id="prev-btn" class="absolute left-4 md:left-8 top-1/2 -translate-y-1/2 text-white/60 hover:text-white opacity-0 group-hover:opacity-100 transition-all duration-300 hover:-translate-x-2 z-30 cursor-pointer drop-shadow-xl" aria-label="Previous">
                    <svg class="w-9 h-9 md:w-12 md:h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>

                <!-- Tombol Navigasi Kanan (Elegan: Tanpa background, panah lebih tipis & responsif) -->
                <button id="next-btn" class="absolute right-4 md:right-8 top-1/2 -translate-y-1/2 text-white/60 hover:text-white opacity-0 group-hover:opacity-100 transition-all duration-300 hover:translate-x-2 z-30 cursor-pointer drop-shadow-xl" aria-label="Next">
                    <svg class="w-9 h-9 md:w-12 md:h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>

                <!-- Indikator Garis Tipis (Z-30) -->
                <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex gap-2 z-30">
                    <button class="carousel-dot h-px w-7 md:w-10 rounded-full bg-white transition-colors duration-300 cursor-pointer"></button>
                    <button class="carousel-dot h-px w-7 md:w-10 rounded-full bg-white/40 hover:bg-white/70 transition-colors duration-300 cursor-pointer"></button>
                    <button class="carousel-dot h-px w-7 md:w-10 rounded-full bg-white/40 hover:bg-white/70 transition-colors duration-300 cursor-pointer"></button>
                    <button class="carousel-dot h-px w-7 md:w-10 rounded-full bg-white/40 hover:bg-white/70 transition-colors duration-300 cursor-pointer"></button>
                </div>

            </div>

        </section>

        <section class="max-w-[1200px] mx-auto px-6 md:px-10 mt-28">
            <p class="text-[16px] md:text-[16px] uppercase tracking-[0.08em] text-[#8E6C26]" style="font-family: 'Poppins', regular;">Our Masters</p>
            <h2 class="text-white text-[40px] md:text-[40px] mt-2 leading-[1.05] font-normal" style="font-family: 'Lustria', serif;">Meet The Experts</h2>
            <p class="text-[#808C9C] text-[12px] md:text-[14px] mt-2 max-w-[760px]" style="font-family: 'Poppins', regular;">certified instructors with international backgrounds, dedicated to guiding you through every flow.</p>

            <div class="mt-10 grid grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($trainers->take(4) as $trainer)
                    @php
                        $trainerPhoto = $trainer->photo_url;

                        if (!$trainerPhoto) {
                            $trainerPhoto = asset('images/trainer-profiles.png');
                        } elseif (str_starts_with($trainerPhoto, 'http://') || str_starts_with($trainerPhoto, 'https://')) {
                            // Keep absolute URLs as-is.
                        } elseif (str_starts_with($trainerPhoto, 'public/')) {
                            $trainerPhoto = asset(substr($trainerPhoto, 7));
                        } else {
                            $trainerPhoto = asset(ltrim($trainerPhoto, '/'));
                        }
                    @endphp
                    <div class="rounded-[26px] bg-[#0D274B] p-3 border border-white/85 shadow-[0_0_14px_rgba(255,255,255,0.55)] text-center">
                        <img
                            src="{{ $trainerPhoto }}"
                            alt="{{ $trainer->name }}"
                            class="w-full h-[140px] md:h-[190px] object-cover rounded-[18px]"
                        >
                        <h3 class="text-white text-[16px] md:text-[22px] mt-4 font-medium" style="font-family: 'Poppins', sans-serif;">{{ $trainer->name }}</h3>
                        <p class="text-white text-[12px] md:text-[15px] mt-1 mb-3" style="font-family: 'Poppins', sans-serif;">{{ $trainer->bio ?? 'Yoga Instructor' }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    </div>

    <div class="bg-[#021939] py-6 md:py-10" style="background-image: url('{{ asset('images/bg-lp-1.jpeg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <section class="max-w-[1200px] mx-auto px-6 md:px-10 mt-10 md:mt-10 grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-[#F2B632] text-[40px] md:text-[40px] leading-[0.9] font-normal" style="font-family: 'Lustria', serif;">Bring Your Bestfriend</h2>

                <p class="text-white/90 text-[12px] md:text-[14px] mt-2" style="font-family: 'Poppins', sans-serif;">and build a healthier, happier life together</p>
                <div class="mt-7 space-y-7">
                    <div class="flex gap-5 items-start">
                        <div class="w-14 h-14 rounded-full bg-[#D1D4DA] flex-shrink-0 mt-1"></div>
                        <div class="text-white" style="font-family: 'Poppins', sans-serif;">
                            <p class="text-[20px] md:text-[20px] leading-[1.2] -mt-0">Sky Yoga is the best place to wind. Love the vibe</p>
                            <p class="text-[16px] md:text-[16px] leading-none mt-2">Andi</p>
                        </div>
                    </div>

                    <div class="flex gap-5 items-start">
                        <div class="w-14 h-14 rounded-full bg-[#D1D4DA] flex-shrink-0 mt-1"></div>
                        <div class="text-white" style="font-family: 'Poppins', sans-serif;">

                            <p class="text-[20px] md:text-[20px] leading-[1.2] -mt-0">Amazing instructor and a calming environment</p>
                            <p class="text-[16px] md:text-[16px] leading-none mt-2">Maya</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rounded-2xl overflow-hidden border border-[#4d83b7]">
                <div class="h-[265px] md:h-[305px] relative">
                    <img src="https://static-maps.yandex.ru/1.x/?ll=106.6309,-6.1783&size=650,350&z=11&l=map&pt=106.6309,-6.1783,pm2rdm" alt="Sky Yoga Location" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-white/28"></div>
                </div>
                <div class="bg-[#947227] text-center py-5 px-4">
                    <h3 class="text-[#071f42] text-[32px] md:text-[32px] leading-[0.96] font-semibold" style="font-family: 'Poppins', sans-serif;">Sky Yoga Indonesia</h3>
                    <p class="text-[#071f42] text-[20px] md:text-[20px] mt-1" style="font-family: 'Poppins', sans-serif;">Tangerang, Banten</p>
                </div>
            </div>
        </section>
    </div>

    <div class="bg-[#021939] py-6 md:py-10" style="background-image: url('{{ asset('images/bg-lp-2.jpeg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

        <section class="max-w-[1200px] mx-auto px-6 md:px-10 pt-12 md:pt-16 pb-8 text-center">
            <h2 class="text-white text-[64px] md:text-[64px] leading-[1.05]" style="font-family: 'Lustria', serif;">Ready To Flow?</h2>
            <p class="text-[#F4B942] text-[64px] md:text-[64px] leading-[1.03] mt-2" style="font-family: 'Lustria', serif;">Sanctuary Is Yours.</p>
            <a href="#classes" class="inline-flex items-center justify-center mt-8 rounded-[14px] min-w-[338px] h-[63px] px-10 text-[24px] md:text-[24px] text-[#051a3a] bg-[radial-gradient(95%_145%_at_50%_10%,#f8cb5f_0%,#f4b942_46%,#c98d21_100%)] border border-[#F4B942] shadow-[inset_0_1px_0_rgba(255,241,198,0.45)]" style="font-family: 'Poppins', sans-serif;">Book Your Class Now</a>
        </section>
        
    </div>

    <div class="w-full border-t border-b border-[#6f83a2]/50 mt-5 mb-5">
        <div class="max-w-[1200px] mx-auto px-6 md:px-10 py-8 text-center">
            <p class="text-[13px] md:text-[16px] text-[#7f8da8] tracking-[0.2em]" style="font-family: 'Poppins', sans-serif;">
                YOGA ID © 2026 · LUXURY YOGA SANCTUARY
            </p>
        </div>
    </div>

    <footer class="max-w-[1200px] mx-auto px-6 md:px-10 mt-0 mb-10 pt-7">
            <div class="grid grid-cols-2 md:grid-cols-[1.45fr_0.85fr_0.85fr_0.85fr] gap-x-6 gap-y-8 md:gap-x-10 text-sm items-start">
                <div class="col-span-2 md:col-span-1">
                    <p class="text-[32px] leading-none text-[#F4B942]" style="font-family: 'Lustria', serif; letter-spacing: 0.2em;">YOGA</p>
                    <p class="text-[#8C9BB6] text-[16px] mt-3 leading-relaxed max-w-[355px] md:max-w-[340px]" style="font-family: 'Poppins', regular;">Luxury sanctuary in Senopati. Transforming bodies and minds through mindful movement and professional guidance.</p>
                </div>
                <div>
                    <p class="text-[#F4B942] uppercase tracking-[0.12em] text-[16px] font-semibold mb-4">Explore</p>
                    <ul class="text-[#8C9BB6] text-[16px] space-y-2">
                        <li><a href="#" class="hover:text-white">About Us</a></li>
                        <li><a href="#" class="hover:text-white">Class Styles</a></li>
                        <li><a href="#" class="hover:text-white">Class Schedule</a></li>
                        <li><a href="#" class="hover:text-white">Elite Masters</a></li>
                    </ul>
                </div>
                <div>
                    <p class="text-[#F4B942] uppercase tracking-[0.12em] text-[16px] font-semibold mb-4">Support</p>
                    <ul class="text-[#8C9BB6] text-[16px] space-y-2">
                        <li><a href="#" class="hover:text-white">Member FAQ</a></li>
                        <li><a href="#" class="hover:text-white">Security</a></li>
                        <li><a href="#" class="hover:text-white">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-white">Terms of Use</a></li>
                    </ul>
                </div>
                <div>
                    <p class="text-[#F4B942] uppercase tracking-[0.12em] text-[16px] font-semibold mb-4">Contact</p>
                    <ul class="text-[#8C9BB6] text-[16px] space-y-3">
                        <li class="flex items-start gap-3">
                            <svg viewBox="0 0 24 24" fill="none" class="w-5 h-5 mt-1 shrink-0 text-[#8C9BB6]" aria-hidden="true">
                                <path d="M4 7.5L12 13L20 7.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                                <rect x="3" y="5" width="18" height="14" rx="2.5" stroke="currentColor" stroke-width="1.7"/>
                            </svg>
                            <span>HELLO@YOGA.ID</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg viewBox="0 0 24 24" fill="none" class="w-5 h-5 mt-1 shrink-0 text-[#8C9BB6]" aria-hidden="true">
                                <path d="M9.75 5.5h1.5a1 1 0 0 1 1 1v1.25a1 1 0 0 1-.3.71l-1.05 1.05a.7.7 0 0 0-.18.7c.34 1.1.97 2.2 1.88 3.12.92.92 2.02 1.54 3.12 1.88a.7.7 0 0 0 .7-.18l1.05-1.05a1 1 0 0 1 .71-.3H19a1 1 0 0 1 1 1v1.5c0 .55-.45 1.03-1 1.03-6.08 0-11-4.92-11-11 0-.55.48-1 1.03-1Z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span>+62 812 3456 789</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg viewBox="0 0 24 24" fill="none" class="w-5 h-5 mt-1 shrink-0 text-[#8C9BB6]" aria-hidden="true">
                                <path d="M12 22s6-5.2 6-11a6 6 0 10-12 0c0 5.8 6 11 6 11z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/>
                                <path d="M12 12.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" fill="currentColor"/>
                            </svg>
                            <span>Senopati No. 123,<br>South Jakarta</span>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>

    <div class="border-t border-[#6f83a2]/50">
        <div class="max-w-[1200px] mx-auto px-6 md:px-10 pt-9">
            <p class="text-[16px] md:text-[16px] text-[#7f8da8] tracking-[0.2em] text-center">JAKARTA · BALI · SINGAPORE</p>
        </div>
    </div>

</div>

@endsection

@push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const carousel = document.getElementById('image-carousel');
                const prevBtn = document.getElementById('prev-btn');
                const nextBtn = document.getElementById('next-btn');
                const dots = document.querySelectorAll('.carousel-dot');
                
                let currentIndex = 0;
                const totalSlides = carousel ? carousel.children.length : dots.length;
                if (!totalSlides) return;
                let autoSlideInterval;

                function updateCarousel() {
                    carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
                    dots.forEach((dot, index) => {
                        if (index === currentIndex) {
                            dot.classList.add('bg-white');
                            dot.classList.remove('bg-white/40');
                        } else {
                            dot.classList.add('bg-white/40');
                            dot.classList.remove('bg-white');
                        }
                    });
                }

                function nextSlide() {
                    currentIndex = (currentIndex + 1) % totalSlides;
                    updateCarousel();
                }

                function prevSlide() {
                    currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                    updateCarousel();
                }

                nextBtn.addEventListener('click', () => {
                    nextSlide();
                    resetInterval();
                });

                prevBtn.addEventListener('click', () => {
                    prevSlide();
                    resetInterval();
                });

                dots.forEach((dot, index) => {
                    dot.addEventListener('click', () => {
                        currentIndex = index;
                        updateCarousel();
                        resetInterval();
                    });
                });

                function startAutoSlide() {
                    autoSlideInterval = setInterval(nextSlide, 5000);
                }

                function resetInterval() {
                    clearInterval(autoSlideInterval);
                    startAutoSlide();
                }

                startAutoSlide();
            });
        </script>
    @endpush