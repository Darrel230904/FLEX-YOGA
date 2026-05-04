@extends('layouts.auth')

@section('content')
<div class="w-full min-h-screen flex justify-center items-center bg-cover bg-center bg-no-repeat p-4" 
     style="background-image: url('{{ asset('images/bg-auth-page.png') }}');">
    
    <div class="flex flex-col md:flex-row w-full max-w-[850px] rounded-[15px] overflow-hidden shadow-2xl bg-[#0A1628]">
        
        <div class="w-full md:w-[55%] bg-white px-12 py-16 flex flex-col justify-center relative">
            
            <h2 class="text-[28px] font-bold text-center text-[#0A1628] mb-2">Verification</h2>
            <p class="text-gray-500 text-sm text-center mb-8 px-4">Enter your WhatsApp number to receive verification code</p>

            <!-- Error Messages -->
            @if($errors->any())
                <div class="mb-4 p-3 bg-red-50 text-red-500 text-xs rounded-md border border-red-200">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('wa.send.otp') }}" method="POST">
                @csrf
                
                <div class="mb-6">
                    <label class="block text-xs font-semibold text-gray-700 mb-2">Phone Number</label>
                    <div class="flex border border-gray-400 rounded overflow-hidden focus-within:border-[#0a1628] transition-all">
                        <!-- Phone Input -->
                        <input type="text" name="phone_number" required value="{{ old('phone_number') }}"
                            class="w-full bg-white text-black px-4 py-2.5 focus:outline-none placeholder-gray-400" 
                            placeholder="8123456789">
                    </div>
                </div>

                <div class="flex justify-center mt-2">
                    <button type="submit" class="w-full bg-[#0A1628] text-white text-[15px] font-medium py-3 rounded-full hover:bg-gray-800 transition-colors">
                        Send Verification Code
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
@endsection