<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Schedules') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <form method="POST" action="{{ route('schedules.store') }}">
                @csrf
                <!-- Subject -->
                <div>
                    <x-input-label for="subject" :value="__('Subject')" />
                    <x-textarea id="subject" class="block mt-1 w-full" type="text" name="subject" :value="old('subject')"
                        autofocus />
                    @error('subject')
                        <div class='alert alert-danger'>{{ $message }}</div>
                    @enderror
                </div>

                <!-- Number -->
                <div>
                    <x-input-label for="number" :value="__('Course Number')" />
                    <x-textarea id="number" class="block mt-1 w-full" type="text" name="number"
                        :value="old('number')" />
                    @error('number')
                        <div class='alert alert-danger'>{{ $message }}</div>
                    @enderror
                </div>

                <!-- Section -->
                <div>
                    <x-input-label for="section" :value="__('Section')" />
                    <x-textarea id="section" class="block mt-1 w-full" type="text" name="section"
                        :value="old('section')" />
                    @error('section')
                        <div class='alert alert-danger'>{{ $message }}</div>
                    @enderror
                </div>

                <!-- Days -->
                <div>
                    <x-input-label for="days" :value="__('Days')" />
                    <x-textarea id="days" class="block mt-1 w-full" type="text" name="days"
                        :value="old('days')" />
                    @error('days')
                        <div class='alert alert-danger'>{{ $message }}</div>
                    @enderror
                </div>

                <!-- Time -->
                <div>
                    <x-input-label for="time" :value="__('Time')" />
                    <x-textarea id="time" class="block mt-1 w-full" type="text" name="time"
                        :value="old('time')" />
                    @error('time')
                        <div class='alert alert-danger'>{{ $message }}</div>
                    @enderror
                </div>

                <!-- Location -->
                <div>
                    <x-input-label for="location" :value="__('Location')" />
                    <x-textarea id="location" class="block mt-1 w-full" type="text" name="location"
                        :value="old('location')" />
                    @error('location')
                        <div class='alert alert-danger'>{{ $message }}</div>
                    @enderror
                </div>

                <!-- Instructor -->
                <div>
                    <x-input-label for="instructor" :value="__('Instructor')" />
                    <x-textarea id="instructor" class="block mt-1 w-full" type="text" name="instructor"
                        :value="old('instructor')" />
                    @error('instructor')
                        <div class='alert alert-danger'>{{ $message }}</div>
                    @enderror
                </div>

                <!-- Action -->
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-3" style="background-color: black;">
                        {{ __('Add new schedule') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
