<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black-800 dark:text-black-200 leading-tight">
            {{ __('adminportal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black-900 dark:text-black-100">
                    {{ __("You're logged in!") }} <br>
                    <button class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
                        <a href="{{ route('courses.index') }}">{{ __('Courses') }} </a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="{{ route('subjects.index') }}">{{ __('Subjects') }} </a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="{{ route('schedules.index') }}">{{ __('Schedules') }} </a>&nbsp;&nbsp;&nbsp;&nbsp;
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

