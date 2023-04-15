<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ url('/') }}">{{ __('Home') }}</a> &nbsp; &nbsp; &nbsp; &nbsp;
            <a href="{{ route('courses.index') }}">{{ __('Course Catalog') }}</a>
        </h2>
        @include('includes.style')
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Check for success message -->
            @if (session('status'))
                <div class="courseChangeSuccess">
                    {{ session('status') }}
                </div>
            @endif
            <h3 class="mt-6">{{ $course->subject }} {{ $course->number }} </h3>
            <p class="mt-6">{{ $course->title }}</p>
            <p class="mt-6">Credits: {{ $course->credits }}</p>
            <p class="mt-6 whitespace-pre-wrap">{{ $course->description }}</p>
            <p class="mt-6">Prerequisites: {{ $course->prereq }}</p>
        </div>

    </div>
</x-app-layout>
