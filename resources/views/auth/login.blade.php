@extends('layouts.auth')

@section('content')
<div class="w-full min-h-screen flex justify-center items-center bg-cover bg-center bg-no-repeat p-4" 
     style="background-image: url('{{ asset('images/bg-auth-page.png') }}');">
    
    <div class="flex flex-col md:flex-row w-full max-w-[850px] rounded-[15px] overflow-hidden shadow-2xl bg-[#0A1628]">
        
        <div class="w-full md:w-[55%] bg-white px-12 py-16 flex flex-col justify-center">
            <h2 class="text-[28px] font-bold text-center text-[#0A1628] mb-8">Welcome Back</h2>

            <form action="{{ route('login.process') }}" method="POST">
                @csrf
                
                <div class="mb-4">
                    <input type="text" name="email" placeholder="Email" value="{{ old('email') }}" 
                           class="w-full bg-white border placeholder-gray-400 text-black rounded px-4 py-2.5 focus:outline-none focus:border-[#0A1628] transition-all {{ $errors->has('email') ? 'border-red-500' : 'border-gray-400' }}">
                    @error('email')
                        <p class="text-red-500 text-[11px] mt-1 ml-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <div class="relative">
                        <input type="password" id="password" name="password" placeholder="Password" 
                               class="w-full bg-white border placeholder-gray-400 text-black rounded px-4 py-2.5 pr-12 focus:outline-none focus:border-[#0A1628] transition-all {{ $errors->has('password') ? 'border-red-500' : 'border-gray-400' }}">
                        
                        <button type="button" onclick="togglePassword('password', 'eye_open_password', 'eye_closed_password')" class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-500 hover:text-[#0A1628]">
                            <svg id="eye_open_password" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            <svg id="eye_closed_password" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.05 10.05 0 011.51-2.79M15 12a3 3 0 00-3-3m0 0a3 3 0 00-3 3m3-3l-3 3M3 3l18 18"></path></svg>
                        </button>
                    </div>
                    
                    @error('password')
                        <div class="flex justify-between items-center mt-1 px-1">
                            <p class="text-red-500 text-[11px] font-medium">{{ $message }}</p>
                            <a href="{{ route('forgot.password') }}" class="text-[#0A1628] text-[11px] font-medium hover:underline">Forgot password ?</a>
                        </div>
                    @enderror
                </div>
                
                <div class="flex justify-center">
                    <button type="submit" class="w-[200px] bg-[#0A1628] text-white text-[15px] font-medium py-2.5 rounded-full hover:bg-gray-800 transition-colors">
                        Log In
                    </button>
                </div>
            </form>
            
            <div class="text-center text-[22px] font-bold text-[#0A1628] my-5">Or</div>
            
            <button type="button" class="w-full bg-white border border-gray-400 rounded py-2.5 hover:bg-gray-50 transition-colors flex justify-center items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#25D366" viewBox="0 0 16 16">
                    <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c-.003 1.396.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                </svg>
                <span class="text-gray-400 text-[15px]">Log in With Whatsapp</span>
            </button>
        </div>

        <div class="w-full md:w-[45%] bg-[#0A1628]/40 backdrop-blur-md p-10 flex flex-col justify-center items-center text-center">
            <h2 class="text-4xl font-bold text-white mb-2 leading-tight">Don't Have</h2>
            <h2 class="text-4xl font-bold text-white mb-6 leading-tight">An ACCOUNT</h2>
            <p class="text-gray-300 mb-8 text-sm">Create an Account</p>
            <a href="{{ route('register') }}" class="border border-white text-white font-normal py-2 px-10 rounded-full hover:bg-white hover:text-[#0A1628] transition-all text-sm">
                Sign Up
            </a>
        </div>

    </div>
</div>
@endsection