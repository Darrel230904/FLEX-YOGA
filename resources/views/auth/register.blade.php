@extends('layouts.auth')

@section('content')
<div class="w-full min-h-screen flex justify-center items-center bg-cover bg-center bg-no-repeat p-4" 
     style="background-image: url('{{ asset('images/bg-auth-page.png') }}');">
    
    <div class="flex flex-col md:flex-row w-full max-w-[850px] rounded-[15px] overflow-hidden shadow-2xl bg-[#0A1628]">
        
        <div class="w-full md:w-[55%] bg-white px-12 py-12 flex flex-col justify-center">
            <h2 class="text-[28px] font-bold text-center text-[#0A1628] mb-6">Create account</h2>

            <form action="{{ route('register') }}" method="POST" class="space-y-3">
                @csrf
                
                <div>
                    <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" 
                           class="w-full bg-white border placeholder-gray-400 text-black rounded px-4 py-2.5 focus:outline-none focus:border-[#0A1628] transition-all {{ $errors->has('name') ? 'border-red-500' : 'border-gray-400' }}">
                    @error('name')
                        <p class="text-red-500 text-[11px] mt-1 ml-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" 
                           class="w-full bg-white border placeholder-gray-400 text-black rounded px-4 py-2.5 focus:outline-none focus:border-[#0A1628] transition-all {{ $errors->has('email') ? 'border-red-500' : 'border-gray-400' }}">
                    @error('email')
                        <p class="text-red-500 text-[11px] mt-1 ml-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <input type="text" name="phone_number" placeholder="Phone Number" value="{{ old('phone_number') }}" 
                           class="w-full bg-white border placeholder-gray-400 text-black rounded px-4 py-2.5 focus:outline-none focus:border-[#0A1628] transition-all {{ $errors->has('phone_number') ? 'border-red-500' : 'border-gray-400' }}">
                    @error('phone_number')
                        <p class="text-red-500 text-[11px] mt-1 ml-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <div class="relative">
                        <input type="password" id="password" name="password" placeholder="Password" 
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
                
                <div>
                    <div class="relative">
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" 
                               class="w-full bg-white border border-gray-400 placeholder-gray-400 text-black rounded px-4 py-2.5 pr-12 focus:outline-none focus:border-[#0A1628] transition-all">
                        <button type="button" onclick="togglePassword('password_confirmation', 'eye_open_confirm', 'eye_closed_confirm')" class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-500 hover:text-[#0A1628]">
                            <svg id="eye_open_confirm" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            <svg id="eye_closed_confirm" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.05 10.05 0 011.51-2.79M15 12a3 3 0 00-3-3m0 0a3 3 0 00-3 3m3-3l-3 3M3 3l18 18"></path></svg>
                        </button>
                    </div>
                </div>
                
                <div class="flex justify-center pt-3">
                    <button type="submit" class="w-[200px] bg-[#0A1628] text-white text-[15px] font-medium py-2.5 rounded-full hover:bg-gray-800 transition-colors">
                        Sign Up
                    </button>
                </div>
            </form>
        </div>

        <div class="w-full md:w-[45%] bg-[#0A1628]/40 backdrop-blur-md p-10 flex flex-col justify-center items-center text-center">
            <h2 class="text-4xl font-bold text-white mb-6 leading-tight">Get Started</h2>
            <p class="text-gray-300 mb-8 text-sm">Already have an account?</p>
            <a href="{{ route('login') }}" class="border border-white text-white font-normal py-2 px-10 rounded-full hover:bg-white hover:text-[#0A1628] transition-all text-sm">
                Log in
            </a>
        </div>

    </div>
</div>
@endsection