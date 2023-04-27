<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ url('/dashboard') }}">{{ __('Home') }}</a> &nbsp; &nbsp; &nbsp; &nbsp;
            <a href="{{ route('schedules.index') }}">{{ __('Schedule of Classes') }} &nbsp; &nbsp; &nbsp; &nbsp;</a>
        </h2>
    </x-slot>

    <div class="py-12">
        @if (session('status'))
            <div class="courseChangeSuccess">
                {{ session('status') }}
            </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-10">
            <a href="{{ route('schedules.create') }}">
                <x-primary-button style="background-color: black;">
                    {{ __('Add new schedule') }}
                </x-primary-button>
            </a>
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
                            <td><a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-link">Update</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $schedules->links() }}
        </div>
    </div>
</x-app-layout>
