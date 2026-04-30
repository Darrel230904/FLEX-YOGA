@extends('member.layout')

@section('title', 'Member Profile')

@section('content')
    <section class="mb-8">
        <h1 class="font-[Cormorant_Garamond] text-6xl text-[#d7a338] leading-none">Your Profile</h1>
    </section>

    <section class="grid lg:grid-cols-[2fr_1fr] gap-6">
        <article class="member-card rounded-2xl p-6 md:p-8">
            <h2 class="uppercase text-white/60 text-xs tracking-[0.18em] mb-3">Profile Settings</h2>

            @if($errors->has('name') || $errors->has('phone_number') || $errors->has('email'))
                <div class="mb-4 rounded-xl border border-rose-300/35 bg-rose-400/10 px-4 py-3 text-sm text-rose-200">
                    <p class="font-semibold mb-1">Periksa data profile:</p>
                    <ul class="list-disc pl-5 space-y-1">
                        @error('name') <li>{{ $message }}</li> @enderror
                        @error('phone_number') <li>{{ $message }}</li> @enderror
                        @error('email') <li>{{ $message }}</li> @enderror
                    </ul>
                </div>
            @endif

            <form action="{{ route('member.profile.update') }}" method="POST" class="border-t border-white/15 pt-6 grid md:grid-cols-2 gap-4">
                @csrf

                <div>
                    <label class="member-label" for="name">Legal Full Name</label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        value="{{ old('name', $user->name) }}"
                        class="member-input @error('name') border-rose-400/80 @enderror"
                        required
                    >
                </div>

                <div>
                    <label class="member-label" for="phone_number">Primary Communication Path</label>
                    <input
                        id="phone_number"
                        name="phone_number"
                        type="text"
                        value="{{ old('phone_number', $user->phone_number) }}"
                        class="member-input @error('phone_number') border-rose-400/80 @enderror"
                        required
                    >
                </div>

                <div>
                    <label class="member-label" for="email">Primary Email</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email', $user->email) }}"
                        class="member-input @error('email') border-rose-400/80 @enderror"
                        required
                    >
                </div>

                <div>
                    <label class="member-label" for="member_since">Member Since</label>
                    <input
                        id="member_since"
                        type="text"
                        value="{{ optional($user->created_at)->format('d M Y') }}"
                        class="member-input"
                        readonly
                    >
                </div>

                <div class="md:col-span-2 rounded-2xl border border-[#b98f38] bg-[#031b3f]/85 p-5 flex items-center justify-between gap-3 mt-2">
                    <div>
                        <p class="text-[10px] uppercase tracking-[0.08em] text-white/60">Membership Status</p>
                        <h3 class="font-[Cormorant_Garamond] text-3xl mt-2">Flex Elite Active</h3>
                        <p class="text-[10px] uppercase tracking-[0.08em] text-white/55 mt-1">Vigilant Since {{ optional($user->created_at)->format('d M Y') }}</p>
                    </div>
                    <span class="member-btn-gold px-7 py-2 rounded-full text-[11px] uppercase tracking-[0.12em]">Verified</span>
                </div>

                <div class="md:col-span-2 flex justify-end mt-1">
                    <button type="submit" class="rounded-md border border-[#b98f38] py-3 px-6 text-xs tracking-[0.12em] uppercase text-[#d7a338] hover:bg-[#b98f38]/10">
                        Save Profile
                    </button>
                </div>
            </form>
        </article>

        <article class="member-card rounded-2xl p-6">
            <h2 class="uppercase text-white/60 text-xs tracking-[0.18em] mb-3">Security Settings</h2>
            <div class="border-t border-white/15 pt-5 space-y-3">
                <div>
                    <label class="member-label" for="current_password">Current Password</label>
                    <input
                        id="current_password"
                        type="password"
                        class="member-input"
                        placeholder=""
                        readonly
                    >
                </div>

                <div>
                    <label class="member-label" for="password">New Password</label>
                    <input
                        id="password"
                        type="password"
                        class="member-input"
                        placeholder=""
                        readonly
                    >
                </div>

                <div>
                    <label class="member-label" for="password_confirmation">Confirm New Password</label>
                    <input
                        id="password_confirmation"
                        type="password"
                        class="member-input"
                        placeholder=""
                        readonly
                    >
                </div>

                <a href="{{ route('member.security.request') }}" class="w-full inline-flex items-center justify-center mt-6 rounded-md border border-[#b98f38] py-3 text-xs tracking-[0.12em] uppercase text-[#d7a338] hover:bg-[#b98f38]/10">
                    Update Core Security
                </a>
            </div>
        </article>
    </section>
@endsection
