@include('includes.header')

<body>
    @include('includes.navbar')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Schedule of Classes</h1>
                <div class="dropdown">

                    <button class="btn btn-secondary dropdown-toggle" style="background-color: aliceblue; color: black" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        {{$buttonText ?? 'Select a Subject' }}
                    </button>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                        @foreach($subjects as $index=>$s)
                        <li><a class="dropdown-item" href="{{ url('/schedule', ['subject' => $s->subject]) }}">{{ $s->subject . ': ' . $names[$index]->full_name}}</a></li>
                        @endforeach
                    </ul>


                </div>
                <h3>List of {{$subject}} Course Schedules</h3>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Course</th>
                            <th scope="col">Section</th>
                            <th scope="col">Time</th>
                            <th scope="col">Instructor</th>
                            <th scope="col">Location</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $c)
                        <tr>
                            <td>{{ $c->subject }} {{ $c->number}}</td>
                            <td>{{ $c->section}}</td>
                            <td>{{$c->time}}</td>
                            <td>{{$c->instructor}}</td>
                            <td>{{$c->location}}</td>
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