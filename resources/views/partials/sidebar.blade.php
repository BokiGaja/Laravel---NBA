<nav class="col-md-2 d-none d-md-block bg-dark sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            @foreach($teams as $team)
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route(('team-news'), ['team' => $team->name ]) }}">{{ $team->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>