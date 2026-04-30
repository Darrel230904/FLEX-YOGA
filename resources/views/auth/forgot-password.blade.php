@extends('layouts.auth')
@section('content')
<div class="w-full min-h-screen flex justify-center items-center bg-cover bg-center bg-no-repeat p-4" 
style="background-image: url('{{ asset('images/bg-auth-page.png') }}');">
    <div class="flex flex-col md:flex-row w-full max-w-[850px] rounded-[15px] overflow-hidden shadow-2xl">
        
        <div class="w-full md:w-[55%] bg-white px-12 py-16 flex flex-col justify-center items-center">
            <h2 class="text-[28px] font-bold text-center text-[#0A1628] mb-4">Forgot Password</h2>
            <p class="text-center text-gray-400 text-[13px] mb-8 leading-relaxed px-4">
                Enter your email for the verification proccess, we will send 4 digits code to your email.
            </p>

            <form action="{{ route('forgot.password.process') }}" method="POST" class="w-full">
                @csrf
                <div class="mb-6">
                    <input type="text" name="email" placeholder="Email" value="{{ old('email') }}" 
                           class="w-full bg-white border placeholder-gray-400 text-black rounded px-4 py-2.5 focus:outline-none focus:border-[#0A1628] transition-all {{ $errors->has('email') ? 'border-red-500' : 'border-gray-400' }}">
                    @error('email')
                        <p class="text-red-500 text-[11px] mt-1 ml-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex justify-center">
                    <button type="submit" class="w-[200px] bg-[#0A1628] text-white text-[15px] font-medium py-2.5 rounded-full hover:bg-gray-800 transition-colors">
                        Continue
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