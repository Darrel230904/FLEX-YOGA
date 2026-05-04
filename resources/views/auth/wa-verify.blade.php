@extends('layouts.auth')

@section('content')
<div class="w-full min-h-screen flex justify-center items-center bg-cover bg-center bg-no-repeat p-4" 
     style="background-image: url('{{ asset('images/bg-auth-page.png') }}');">
    
    <div class="flex flex-col md:flex-row w-full max-w-[850px] rounded-[15px] overflow-hidden shadow-2xl bg-[#0A1628]">
        
        <div class="w-full md:w-[55%] bg-white px-12 py-16 flex flex-col justify-center relative">
            
            <h2 class="text-[28px] font-bold text-center text-[#0A1628] mb-4">Verification</h2>
            
            <div class="text-sm text-gray-600 text-center mb-8">
                <p>Your verification code is sent via WhatsApp</p>
                <p class="font-medium mt-1 flex items-center justify-center gap-1">
                    <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12.012 2c-5.506 0-9.989 4.478-9.99 9.984a9.964 9.964 0 001.333 4.993L2 22l5.233-1.237a9.994 9.994 0 004.779 1.217h.004c5.505 0 9.988-4.478 9.989-9.984 0-2.669-1.037-5.176-2.926-7.066A9.94 9.94 0 0012.012 2zm5.952 14.152c-.25.702-1.427 1.352-1.996 1.455-.53.097-1.22.18-3.528-.598-2.825-.953-4.636-3.83-4.778-4.02-.14-.19-1.139-1.51-1.139-2.88 0-1.37.712-2.046.966-2.344.253-.298.55-.373.733-.373.183 0 .367.003.518.01.163.008.38-.063.593.447.226.54 1.1 2.68 1.196 2.873.097.193.16.417.02.667-.14.25-.214.407-.424.654-.197.234-.413.51-.59.69-.193.197-.393.413-.173.794.22.38 1.01 1.666 2.146 2.82 1.467 1.488 2.705 1.944 3.085 2.142.38.197.6.16.824-.093.224-.253.966-1.127 1.226-1.514.26-.387.52-.324.863-.223.344.103 2.176 1.026 2.546 1.213.37.187.616.277.706.43.09.153.09 1.12-.16 1.82z"/></svg>
                    (+{{ session('country_code', '62') }}) {{ session('wa_phone', 'xxxxxxxxxx') }}
                </p>
            </div>

            <!-- Error Messages -->
            @if($errors->any())
                <div class="mb-4 text-center text-red-500 text-xs font-medium">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('wa.verify.otp.process') }}" method="POST" id="otp-form">
                @csrf
                
                <!-- 5 Digit OTP Inputs -->
                <div class="flex justify-center gap-3 md:gap-4 mb-6">
                    @for($i = 1; $i <= 5; $i++)
                        <input type="text" name="otp[]" maxlength="1" required
                        class="w-10 h-12 md:w-12 md:h-14 text-center text-2xl font-bold text-[#0A1628] bg-transparent border-b-2 border-[#0A1628] focus:border-[#d7a338] focus:outline-none transition-colors otp-input"
                        autocomplete="off">
                    @endfor
                </div>

                <!-- Hidden merged OTP field -->
                <input type="hidden" name="otp_code" id="merged-otp">

                <div class="text-center text-xs text-gray-500 mb-8">
                    Did not receive the code? 
                    <a href="{{ route('wa.login') }}" class="text-[#3b82f6] hover:underline ml-1 font-medium">Resend</a>
                </div>

                <div class="flex justify-center">
                    <button type="button" onclick="submitOtp()"
                        class="w-[200px] bg-[#0A1628] text-white text-[15px] font-medium py-2.5 rounded-full hover:bg-gray-800 transition-colors">
                        Continue
                    </button>
                </div>
            </form>
        </div>

        <div class="w-full md:w-[45%] bg-[#0A1628]/40 backdrop-blur-md p-10 flex flex-col justify-center items-center text-center">
            <h2 class="text-4xl font-cormorant font-bold text-white mb-2 leading-tight">Don't Have</h2>
            <h2 class="text-4xl font-cormorant font-bold text-white mb-6 leading-tight">An ACCOUNT</h2>
            <p class="text-gray-300 mb-8 text-sm">Create an Account</p>
            <a href="{{ route('register') }}" class="border border-white text-white font-normal py-2 px-10 rounded-full hover:bg-white hover:text-[#0A1628] transition-all text-sm">
                Sign Up
            </a>
        </div>

    </div>
</div>

<!-- Script to handle OTP inputs (Auto focus to next input) -->
<script>
    const inputs = document.querySelectorAll('.otp-input');
    
    inputs.forEach((input, index) => {
        input.addEventListener('input', (e) => {
            // Only allow numbers
            e.target.value = e.target.value.replace(/[^0-9]/g, '');
            
            // Move to next input if value is entered
            if (e.target.value !== '' && index < inputs.length - 1) {
                inputs[index + 1].focus();
            }
        });

        // Handle backspace to move to previous input
        input.addEventListener('keydown', (e) => {
            if (e.key === 'Backspace' && e.target.value === '' && index > 0) {
                inputs[index - 1].focus();
            }
        });
    });

    function submitOtp() {
        let otpValue = '';
        inputs.forEach(input => {
            otpValue += input.value;
        });
        
        document.getElementById('merged-otp').value = otpValue;
        document.getElementById('otp-form').submit();
    }
</script>
@endsection