<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ url('/') }}">{{ __('Home') }}</a> &nbsp; &nbsp; &nbsp; &nbsp;
            <a href="{{ route('schedules.index') }}">{{ __('Schedule of Classes') }} &nbsp; &nbsp; &nbsp; &nbsp;</a>
            <a href="{{ route('semesterplans.index') }}">{{ __('View Semester Plan') }}</a>
        </h2>
        @include('includes.style')
    </x-slot>

    <div class="py-12">
        @if (session('status'))
            <div class="courseChangeSuccess">
                {{ session('status') }}
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-10">
            <table class="table">
                <thead>
                    <tr>
                        <th> Course</th>
                        <th>Section</th>
                        <th>Time</th>
                        <th>Location</th>
                        <th>Instructor</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($schedules as $schedule)
                        <tr>
                            <td>{{ $schedule->subject }} {{ $schedule->number }}</td>
                            <td>{{ $schedule->section }}</td>

                            <td>
                                @if ($schedule->time != 'TBA')
                                    {{ $schedule->days }}
                                @endif
                                {{ $schedule->time }}
                            </td>

                            <td>{{ $schedule->location }}</td>
                            <td>{{ $schedule->instructor }}</td>
                            <td>
                                <form method="post" action="{{ route('semesterplans.store') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $schedule->id }}">
                                    <x-primary-button class="ml-4" style="background-color: green;"
                                        onclick="return confirm('Are you sure you wish to add this course?')">
                                        {{ __('Add to Plan') }}
                                    </x-primary-button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $schedules->links() }}
        </div>
    </div>
</x-app-layout>
