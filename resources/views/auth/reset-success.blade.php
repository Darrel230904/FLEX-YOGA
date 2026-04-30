@extends('layouts.auth')
@section('content')
<div class="w-full min-h-screen flex justify-center items-center bg-cover bg-center bg-no-repeat p-4" 
style="background-image: url('{{ asset('images/bg-auth-page.png') }}');">
    <div class="flex flex-col md:flex-row w-full max-w-[850px] rounded-[15px] overflow-hidden shadow-2xl">
        <div class="w-full md:w-[55%] bg-white px-12 py-16 flex flex-col justify-center items-center">
            
            <div class="w-24 h-24 rounded-full border-4 border-gray-400 flex items-center justify-center mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-[#0A1628]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
            </div>

            <h2 class="text-[28px] font-bold text-center text-[#0A1628] mb-4">Successfully</h2>
            <p class="text-center text-gray-400 text-[14px] mb-8">
                Your password has been reset successfully
            </p>
            
            <a href="{{ route('login') }}" class="w-[200px] bg-[#0A1628] text-white text-[15px] font-medium py-2.5 rounded-full hover:bg-gray-800 transition-colors text-center inline-block">
                Log In
            </a>
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