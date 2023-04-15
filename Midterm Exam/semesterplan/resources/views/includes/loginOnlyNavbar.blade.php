<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary" style="padding: 0%;">
    <div class="container-fluid" style="background-color: purple;"> <!-- This is the purple background of the navbar-->
        <a class="navbar-brand" href="#">UWW</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <h1>You must log in to use the site.</h1>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/register') }}">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/login') }}">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
