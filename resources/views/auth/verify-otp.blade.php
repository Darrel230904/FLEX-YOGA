@extends('layouts.auth')
@section('content')
<div class="w-full min-h-screen flex justify-center items-center bg-cover bg-center bg-no-repeat p-4" 
style="background-image: url('{{ asset('images/bg-auth-page.png') }}');">
    <div class="flex flex-col md:flex-row w-full max-w-[850px] rounded-[15px] overflow-hidden shadow-2xl">
        <div class="w-full md:w-[55%] bg-white px-12 py-16 flex flex-col justify-center items-center">
            <h2 class="text-[28px] font-bold text-center text-[#0A1628] mb-8">Verification</h2>

            <form action="{{ route('verify.otp.process') }}" method="POST" class="w-full">
                @csrf
                <div class="flex gap-4 justify-center mb-4">
                    <input type="text" name="otp1" maxlength="1" 
                           class="otp-input w-14 h-14 text-center text-xl font-bold text-[#0A1628] border rounded focus:border-[#0A1628] focus:outline-none {{ $errors->has('otp') ? 'border-red-500' : 'border-gray-400' }}">
                           
                    <input type="text" name="otp2" maxlength="1" 
                           class="otp-input w-14 h-14 text-center text-xl font-bold text-[#0A1628] border rounded focus:border-[#0A1628] focus:outline-none {{ $errors->has('otp') ? 'border-red-500' : 'border-gray-400' }}">
                           
                    <input type="text" name="otp3" maxlength="1" 
                           class="otp-input w-14 h-14 text-center text-xl font-bold text-[#0A1628] border rounded focus:border-[#0A1628] focus:outline-none {{ $errors->has('otp') ? 'border-red-500' : 'border-gray-400' }}">
                           
                    <input type="text" name="otp4" maxlength="1" 
                           class="otp-input w-14 h-14 text-center text-xl font-bold text-[#0A1628] border rounded focus:border-[#0A1628] focus:outline-none {{ $errors->has('otp') ? 'border-red-500' : 'border-gray-400' }}">
                </div>

                @error('otp')
                    <p class="text-red-500 text-[11px] text-center font-medium mb-2">{{ $message }}</p>
                @enderror

                @if(session('success'))
                    <p class="text-green-500 text-[11px] text-center font-medium mb-2">{{ session('success') }}</p>
                @endif

                <div class="text-center mb-6 h-5">
                    <p id="timer" class="text-red-400 text-sm font-medium">00:30</p>
                    
                    <a href="{{ route('resend.otp') }}" id="resend-link" class="text-[#0A1628] text-sm font-bold hover:underline hidden">Resend Code</a>
                </div>

                <p class="text-center text-gray-400 text-[13px] mb-8">Enter your 4 digits code that you received on your email.</p>
                
                <div class="flex justify-center">
                    <button type="submit" class="w-[200px] bg-[#0A1628] text-white text-[15px] font-medium py-2.5 rounded-full hover:bg-gray-800 transition-colors">Continue</button>
                </div>
            </form>
        </div>

        <div class="w-full md:w-[45%] bg-[#0A1628]/40 backdrop-blur-md p-10 flex flex-col justify-center items-center text-center">
            <h2 class="text-4xl font-bold text-white mb-2 leading-tight">Don't Have</h2>
            <h2 class="text-4xl font-bold text-white mb-6 leading-tight">An ACCOUNT</h2>
            <p class="text-gray-300 mb-8 text-sm">Create an Account</p>
            <a href="{{ route('register') }}" class="border border-white text-white font-normal py-2 px-10 rounded-full hover:bg-white hover:text-[#0A1628] transition-all text-sm">Sign Up</a>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        
        // 1. Script Auto-Focus (Pindah kanan saat ngetik, pindah kiri saat Backspace)
        const inputs = document.querySelectorAll('.otp-input');
        inputs.forEach((input, index) => {
            input.addEventListener('input', (e) => {
                if (e.target.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            });
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && e.target.value === '' && index > 0) {
                    inputs[index - 1].focus();
                }
            });
        });

        // 2. Script Countdown Timer 30 Detik
        let timeLeft = 30; // Mulai dari 30 detik
        const timerElement = document.getElementById('timer');
        const resendLink = document.getElementById('resend-link');

        const countdown = setInterval(() => {
            timeLeft--;
            
            // Format detik agar selalu dua digit (contoh: 09, 08)
            let s = timeLeft.toString().padStart(2, '0');
            
            if(timeLeft > 0) {
                timerElement.textContent = `00:${s}`;
            } else {
                // Waktu habis, sembunyikan timer dan munculkan link Resend
                clearInterval(countdown);
                timerElement.classList.add('hidden');
                resendLink.classList.remove('hidden');
            }
        }, 1000);
    });
</script>
@endsection