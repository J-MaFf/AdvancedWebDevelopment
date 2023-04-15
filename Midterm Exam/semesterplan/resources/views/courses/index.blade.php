<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ url('/') }}">{{ __('Home') }}</a> &nbsp; &nbsp; &nbsp; &nbsp;
            <a href="{{ route('courses.index') }}">{{ __('Course Catalog') }}</a>
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
                        <th>Title</th>
                        <th>Credits</th>
                        <th>Description</th>
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
                            <td style="text-align: justify;"><a
                                    href="{{ $href }}">{{ $course->description }}</a></td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $courses->links() }}
        </div>
    </div>
</x-app-layout>
