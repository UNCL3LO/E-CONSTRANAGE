<!-- resources/views/projects/search.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search Results') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Display the search query -->
                    <h3 class="font-semibold text-lg mb-4">Search Results for "{{ $search }}":</h3>
                    @if($projects->isEmpty())
                        <p>No projects found.</p>
                    @else
                        <div class="border border-gray-300 p-4 rounded-md bg-white">
                            <div class="flex items-center justify-center bg-green-200 py-4 px-6 rounded-lg shadow-md">
                                <div class="overflow-y-auto max-h-60">
                                    <ul class="divide-y divide-gray-200">
                                        @foreach($projects as $project)
                                            <li class="py-4">
                                                <div class="flex items-left space-x-4">
                                                    <div class="flex-1">
                                                        <a href="{{ route('projects.edit', ['project' => $project->id]) }}" class="block">
                                                            <h3 class="text-lg font-semibold text-green-800">{{ $project->name }}</h3>
                                                            <p class="text-sm text-gray-600">{{ $project->description }}</p>
                                                        </a>
                                                    </div>
                                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-sm text-red-600">Delete</button>
                                                    </form>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
