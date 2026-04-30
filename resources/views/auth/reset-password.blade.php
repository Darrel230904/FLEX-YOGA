@extends('layouts.auth')

@section('content')
<div class="w-full min-h-screen flex justify-center items-center bg-cover bg-center bg-no-repeat p-4" 
     style="background-image: url('{{ asset('images/bg-auth-page.png') }}');">
    
    <div class="flex flex-col md:flex-row w-full max-w-[850px] rounded-[15px] overflow-hidden shadow-2xl bg-[#0A1628]">
        
        <div class="w-full md:w-[55%] bg-white px-12 py-16 flex flex-col justify-center">
            <h2 class="text-[28px] font-bold text-center text-[#0A1628] mb-4">New Password</h2>
            <p class="text-center text-gray-400 text-[13px] mb-8 leading-relaxed px-4">
                Set the new password for your account so you can login and access all features.
            </p>

            <form action="{{ route('reset.password.process') }}" method="POST" class="w-full">
                @csrf
                
                <div class="mb-4">
                    <div class="relative">
                        <input type="password" id="password" name="password" placeholder="Enter new password" 
                               class="w-full bg-white border placeholder-gray-400 text-black rounded px-4 py-2.5 pr-12 focus:outline-none focus:border-[#0A1628] transition-all {{ $errors->has('password') ? 'border-red-500' : 'border-gray-400' }}">
                        <button type="button" onclick="togglePassword('password', 'eye_open_password', 'eye_closed_password')" class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-500 hover:text-[#0A1628]">
                            <svg id="eye_open_password" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            <svg id="eye_closed_password" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.05 10.05 0 011.51-2.79M15 12a3 3 0 00-3-3m0 0a3 3 0 00-3 3m3-3l-3 3M3 3l18 18"></path></svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-[11px] mt-1 ml-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-8">
                    <div class="relative">
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm password" 
                               class="w-full bg-white border border-gray-400 placeholder-gray-400 text-black rounded px-4 py-2.5 pr-12 focus:outline-none focus:border-[#0A1628] transition-all">
                        <button type="button" onclick="togglePassword('password_confirmation', 'eye_open_confirm', 'eye_closed_confirm')" class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-500 hover:text-[#0A1628]">
                            <svg id="eye_open_confirm" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            <svg id="eye_closed_confirm" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.05 10.05 0 011.51-2.79M15 12a3 3 0 00-3-3m0 0a3 3 0 00-3 3m3-3l-3 3M3 3l18 18"></path></svg>
                        </button>
                    </div>
                </div>
                
                <div class="flex justify-center">
                    <button type="submit" class="w-[200px] bg-[#0A1628] text-white text-[15px] font-medium py-2.5 rounded-full hover:bg-gray-800 transition-colors">
                        Update Password
                    </button>
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
@endsection