<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('subjects.index') }}">{{ __('Subjects') }}</a>
        </h2>
    </x-slot>

    <div class="py-12">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            User ID: {{ $id }} <br>
            <a href="{{ route('subjects.create') }}"> + New Subject</a>
            <table class="table">
                <thead>
                    <tr>
                        <th> ID</th>
                        <th> Subject</th>
                        <th> Course name</th>
                        <th> Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subjects as $subject)
                        @php
                            $href = route('subjects.show', $subject->id);
                        @endphp
                        <tr>
                            <td><a href="{{ $href }}">{{ $subject->id }}</a></td>
                            <td><a href="{{ $href }}">{{ $subject->subject }}</a></td>
                            <td><a href="{{ $href }}">{{ $subject->full_name }}</a></td>
                            <td>
                                <!--Update and Delete buttons-->
                                <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-link">Update</a>
                                <form method="post" action="{{ $href }}">
                                    @method('delete')
                                    @csrf
                                    <x-primary-button
                                        onclick="return confirm('Are you sure you want to delete this subject?')">
                                        {{ __('Delete') }}
                                    </x-primary-button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $subjects->links() }}
        </div>
    </div>
</x-app-layout>
