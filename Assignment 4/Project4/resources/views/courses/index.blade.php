<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('courses.index') }}">{{ __('Courses') }}</a>
        </h2>
    </x-slot>

    <div class="py-12">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            UserId: {{ $id }} <br>
            <a href="{{ route('courses.create') }}">+ New Course </a>
            <table class="table">
                <thead>
                    <tr>
                        <th> Course</th>
                        <th>Title</th>
                        <th>Credits</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        @php
                            $href = route('courses.show', $course->id);
                        @endphp
                        <tr>
                            <td><a href="{{ $href }}">{{ $course->subject }}
                                    {{ $course->number }} </a></td>
                            <td><a href="{{ $href }}">{{ $course->title }}</a></td>
                            <td><a href="{{ $href }}">{{ $course->credits }}</a></td>
                            <td>
                                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-link">Update</a>
                                <form method="post" action="{{ $href }}">
                                    @method('delete')
                                    @csrf
                                    <x-primary-button
                                        onclick="return confirm('Are you sure you wish to delete this section?')">
                                        {{ __('Delete') }}
                                    </x-primary-button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $courses->links() }}
        </div>
    </div>
</x-app-layout>
