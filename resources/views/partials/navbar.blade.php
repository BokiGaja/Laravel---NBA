<header class="navbar navbar-dark bg-dark d-flex justify-content-between">
    <div>
        <img src="https://www.vivifyideas.com/images/logo-cover.jpg" style="height: 80px; width: 200px; border-radius: 20%" alt="">
        @auth
            @if(auth()->user()->email == 'admin@admin.com')
                <a class="btn btn-sm btn-outline-info btn-lg" href="">Users</a>
                <a class="btn btn-sm btn-outline-info btn-lg" href="telescope">Telescope</a>
            @endif
                <a class="btn btn-sm btn-outline-info btn-lg" href="">Create Team</a>
                <a class="btn btn-sm btn-outline-info btn-lg" href="">Create Player</a>
        @endauth
    </div>
    <div style="margin-left: 100px">
        <a href="{{ route('show-teams') }}" class="btn btn-info btn-lg">Teams</a>
    </div>
    <div class="d-flex justify-content-end align-items-center">
        @auth
            <a class="btn btn-sm btn-outline-info btn-lg" href="{{ route('logout') }}">{{ auth()->user()->name }}(Logout)</a>
        @endauth
        @guest
            <a class="btn btn-sm btn-outline-info btn-lg" href="{{ route('show-register') }}">Sign up</a>
            <a class="btn btn-sm btn-outline-info btn-lg" href="{{ route('show-login') }}">Login</a>
        @endguest
    </div>
</header>
