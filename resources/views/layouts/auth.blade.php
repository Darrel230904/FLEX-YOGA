<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Proyek Klien'))</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        input::-ms-reveal,
        input::-ms-clear {
            display: none !important;
        }
    </style>

    @stack('styles')
</head>

<body class="min-h-screen bg-[#08111f] text-white">
    <div class="min-h-screen relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(74,144,226,0.18),_transparent_35%),radial-gradient(circle_at_bottom_right,_rgba(14,165,233,0.12),_transparent_30%)]"></div>
        <div class="absolute inset-0 opacity-40 bg-[linear-gradient(rgba(255,255,255,0.04)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.04)_1px,transparent_1px)] bg-[size:48px_48px]"></div>

        <main class="relative z-10 min-h-screen">
            @yield('content')
        </main>
    </div>

    @stack('scripts')

    <script>
        function togglePassword(inputId, openIconId, closedIconId) {
            const input = document.getElementById(inputId);
            const openIcon = document.getElementById(openIconId);
            const closedIcon = document.getElementById(closedIconId);

            // Cek apakah elemennya benar-benar ada untuk mencegah error
            if (!input || !openIcon || !closedIcon) return;

            if (input.type === 'password') {
                input.type = 'text';
                openIcon.classList.remove('hidden');
                closedIcon.classList.add('hidden');
            } else {
                input.type = 'password';
                openIcon.classList.add('hidden');
                closedIcon.classList.remove('hidden');
            }
        }
    </script>
</body>
</html>