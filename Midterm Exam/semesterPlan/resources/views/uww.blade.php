@include('includes.header')

<body>

    @if (Auth::check())
        @include('includes.navbar')
        <h1 style="color: antiquewhite;">Welcome back, {{ Auth::user()->name }}!</h1>
    @else
        @include('includes.loginOnlyNavbar')
    @endif

    <!-- Homepage image -->
    <img src="https://www.uww.edu/images/admissions/tour/campus-tour-main1.jpg" class="img-fluid" alt="Campus img">

</body>

</html>
