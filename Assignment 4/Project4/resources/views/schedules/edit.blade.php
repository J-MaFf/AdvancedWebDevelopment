<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Schedules') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('schedules.update', $schedule->id) }}">
                @method('put')
                @csrf

                <!-- Subject -->
                <div>
                    <x-input-label for="subject" :value="__('Subject')" />
                    <textarea id="subject" class="block mt-1 w-full" type="text" name="subject"
                        :value="old('subject', $schedule - > subject)" autofocus>{{ old('subject', $schedule->subject) }} </textarea>
                    @error('subject')
                        <div class='alert alert-danger'>{{ $message }}</div>
                    @enderror
                </div>

                <!-- Number -->
                <div>
                    <x-input-label for="number" :value="__('Course Number')" />
                    <textarea id="number" class="block mt-1 w-full" type="text" name="number"
                        :value="old('number', $schedule - > number)">{{ old('number', $schedule->number) }}</textarea>
                    @error('number')
                        <div class='alert alert-danger'>{{ $message }}</div>
                    @enderror
                </div>

                <!-- Section -->
                <div>
                    <x-input-label for="section" :value="__('Section')" />
                    <textarea id="section" class="block mt-1 w-full" type="text" name="section"
                        :value="old('section', $schedule - > section)">{{ old('section', $schedule->section) }}</textarea>
                    @error('section')
                        <div class='alert alert-danger'>{{ $message }}</div>
                    @enderror
                </div>

                <!-- Days -->
                <div>
                    <x-input-label for="days" :value="__('Days')" />
                    <textarea id="days" class="block mt-1 w-full" type="text" name="days"
                        :value="old('days', $schedule - > days)">{{ old('days', $schedule->days) }}</textarea>
                    @error('days')
                        <div class='alert alert-danger'>{{ $message }}</div>
                    @enderror
                </div>

                <!-- Time -->
                <div>
                    <x-input-label for="time" :value="__('Time')" />
                    <textarea id="time" class="block mt-1 w-full" type="text" name="time"
                        :value="old('time', $schedule - > time)">{{ old('time', $schedule->time) }}</textarea>
                    @error('time')
                        <div class='alert alert-danger'>{{ $message }}</div>
                    @enderror
                </div>

                <!-- Instructor -->
                <div>
                    <x-input-label for="instructor" :value="__('Instructor')" />
                    <textarea id="instructor" class="block mt-1 w-full" type="text" name="instructor"
                        :value="old('instructor', $schedule - > instructor)">{{ old('instructor', $schedule->instructor) }}</textarea>
                    @error('instructor')
                        <div class='alert alert-danger'>{{ $message }}</div>
                    @enderror
                </div>

                <!-- Location -->
                <div>
                    <x-input-label for="location" :value="__('Location')" />
                    <textarea id="location" class="block mt-1 w-full" type="text" name="location"
                        :value="old('location', $schedule - > location)">{{ old('location', $schedule->location) }}</textarea>
                    @error('location')
                        <div class='alert alert-danger'>{{ $message }}</div>
                    @enderror
                </div>

                <!-- Button -->
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-3">
                        {{ __('Update schedule') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
