<!-- resources/views/projects.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background-color: #6e16d9;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Your projects content goes here -->
                    <p>This is the nice projects page!</p>
                    @include('projects.create')
                    <!-- Button to link to the create project form -->

                </div>
            </div>
            <div class="bg-red rounded border border-purple-500 p-4 flex items-end"> <!-- Add border styles -->
                <form action="{{ route('projects.search') }}" method="GET" class="flex items-center">
                    <input type="text" name="search" placeholder="Search projects..." class="mr-2">
                    <button type="submit" class="btn rounded-r-lg bg-red-500 hover:bg-purple-700 text-black font-bold py-2 px-4 transition duration-300 ease-in-out" style="background-color: #8f62c7;  border-radius: 8px; hover: ">Search</button>
                </form>
        </div>
    </div>

    @if(session()->has('success'))
    <div class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-green-500 text-black px-4 py-2 rounded-md shadow-md">
        {{ session()->get('success') }}
    </div>
    @endif

    @php
    $projects = App\Models\Project::all();
    @endphp

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
                        </div>
                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm text-red-600" onclick="return confirm('Are you sure you want to delete project {{$project->name}}?')">Delete</button>
                        </form>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    </div>
    @endif

    <x-slot name="scripts">
        <script src="{{ asset('alert.js') }}"></script>
    </x-slot>

</x-app-layout>
<script>
    // Select the success message element
    const successMessage = document.getElementById('successMessage');

    // Check if the success message exists
    if (successMessage) {
        // Hide the success message after 2.5 seconds
        setTimeout(() => {
            successMessage.style.display = 'none';
        }, 2500);
    }
</script>
