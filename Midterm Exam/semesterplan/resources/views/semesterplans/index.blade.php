<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ url('/') }}">{{ __('Home') }}</a> &nbsp; &nbsp; &nbsp; &nbsp;
            <a href="{{ route('semesterplans.index') }}">{{ __('Semester Plans') }}</a>
        </h2>
        @include('includes.style')

    </x-slot>
    <div class="py-12">
        @if (session('status'))
            <div class="courseChangeSuccess">{{ session('status') }} </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-10">

            <table class="table">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Section</th>
                        <th>Time</th>
                        <th>Location</th>
                        <th>Instructor</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($semesterplans as $semesterplan)
                        @if ($semesterplan->user_id == $id)
                            <tr>
                                <td>{{ $semesterplan->course }}</td>
                                <td>{{ $semesterplan->section }}</td>
                                <td>{{ $semesterplan->time }}</td>
                                <td>{{ $semesterplan->location }}</td>
                                <td>{{ $semesterplan->instructor }}</td>
                                <td>
                                    <form method="post"
                                        action="{{ route('semesterplans.destroy', $semesterplan->id) }}">
                                        @method('delete') @csrf <input type="hidden" name="id"
                                            value="{{ $semesterplan->id }}"><x-primary-button class="ml-4"
                                            style="background-color: red;"
                                            onclick="return confirm('Are you sure you wish to delete this course from your semester plan?')">{{ __('Delete') }}
                                        </x-primary-button></form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>{{ $semesterplans->links() }}
        </div>
    </div>
</x-app-layout>
