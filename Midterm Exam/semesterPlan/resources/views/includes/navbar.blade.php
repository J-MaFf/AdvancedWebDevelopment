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
                    <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('courses.index') }}">View Course Catalog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/schedule') }}">View Schedule of Classes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/schedule') }}">View Semester Plan</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                </li>

            </ul>
        </div>
    </div>
</nav>
