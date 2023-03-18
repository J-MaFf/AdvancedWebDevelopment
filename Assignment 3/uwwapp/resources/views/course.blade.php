@include('includes.header')

<body>
    @include('includes.navbar')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Course Catalog</h1>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" style="background-color: aliceblue; color: black" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        {{$buttonText ?? 'Select a Subject'}}

                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        @foreach($subjects as $s)
                        <li><a class="dropdown-item" href="{{ url('/coursesbysubject', ['subject' => $s->subject]) }}">{{ $s->subject }}</a></li>
                        @endforeach

                    </ul>
                </div>
                <h3>List of {{$subject}} Courses</h3>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Course</th>
                            <th scope="col">Title</th>
                            <th scope="col">Credits</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $c)
                        <tr>
                            <td>{{ $c->subject }} {{ $c->number}}</td>
                            <td>{{ $c->title}}</td>
                            <td>{{$c->credits}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</body>

</body>