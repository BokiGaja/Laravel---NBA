<header class="navbar navbar-dark bg-dark d-flex justify-content-between">
    <div>
        <img src="https://cdn.nba.net/nba-drupal-prod/2017-08/SEO-image-NBA-logoman.jpg" style="height: 80px; width: 200px; border-radius: 20%" alt="">
        <a class="btn btn-sm btn-outline-info btn-lg" href="{{ route('show-create-news') }}">Create news</a>
    </div>
    <div style="margin-left: 100px">
        @auth
            <a href="{{ route('show-teams') }}" class="btn btn-info btn-lg">Teams</a>
            <a href="{{ route('show-news') }}" class="btn btn-info btn-lg">News</a>
        @endauth
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
