<nav class="navbar-container">
    <div class="logo-area">
        <h2>Logo Aplikasi</h2>
    </div>
    
    <div class="user-menu">
        <span>Halo, Admin</span>
        <form action="{{ route('logout') }}" method="POST" style="display:inline; margin:0;">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</nav>