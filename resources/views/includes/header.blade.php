<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand display-2" href="{{ route('homepage') }}">Food Sharing</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-nav ml-auto" id="navbarSupportedContent">
        <ul class="nav navbar-nav navbar-right">
            <li nav-item>
                <a class="nav-link" href="{{ route('profile')  }}">My Profile</a>
            </li>
            <li nav-item>
                <a class="nav-link" href="{{ route('dashboard')  }}">Dashboard</a>
            </li>
            <li nav-item>
                <a class="nav-link" href="{{ route('home') }}">Sign In Log In</a>
            </li>
            <li nav-item>
                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
            </li>
        </ul>
    </div>

</nav>
