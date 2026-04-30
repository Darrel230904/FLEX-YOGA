<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layouts.head')
</head>
<body>

    <div class="app-wrapper">
        
        @include('admin.layouts.navbar')

        <div class="main-content-wrapper">
            
            @include('admin.layouts.sidebar')

            <main class="content-area">
                @include('admin.layouts.notification')
                @yield('content')
            </main>

        </div>

        @include('admin.layouts.footer')
        
    </div>

    @include('admin.layouts.script')

</body>
</html>