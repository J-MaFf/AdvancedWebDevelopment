<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('subjects.index') }}">{{ __('Subjects') }}</a>
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Check for success message -->
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <p class="ml-6"><a href="{{ route('subjects.edit', $subject) }}" class="btn-link">Edit Subject </a></p>
            <p class="mt-6">ID: {{ $subject->id }}</p>
            <p class="mt-6">Subject: {{ $subject->subject }} </p>
            <p class="mt-6">Full name: {{ $subject->full_name }}</p>

        </div>
    </div>
</x-app-layout>
