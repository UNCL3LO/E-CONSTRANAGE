<x-app-layout>

    <form action="Projects.edit" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div class="flex items-center justify-center bg-green-200 py-4 px-6 rounded-lg shadow-md" style="background-color:  #9041f1;">
            <div class="overflow-y-auto max-h-60">
                <div class="space-y-4">
                    <div>
                        <label for="name" class="block text-gray-700">Project Name:</label>
                        <input type="text" name="name" id="name" value="{{$project->name}}" class="form-input mt-1 block w-full" required>
                    </div>
                    <div>
                        <label for="description" class="block text-gray-700">Project Description:</label>
                        <textarea name="description" id="description" value="{{$project->description}}" class="form-textarea mt-1 block w-full">{{ $project->description }}</textarea>
                    </div>
                    <div>
                        <label for="start_date" class="block text-gray-700">Start Date:</label>
                        <input type="date" name="start_date" id="start_date" value="" class="form-input mt-1 block w-full">
                    </div>
                    <div>
                        <label for="end_date" class="block text-gray-700">End Date:</label>
                        <input type="date" name="end_date" id="end_date" value="" class="form-input mt-1 block w-full">
                    </div>
                    <div>
                        <label for="budget" class="block text-gray-700">Project Budget:</label>
                        <input type="number" name="budget" id="budget" value="" class="form-input mt-1 block w-full" step="0.01" min="0">
                    </div>
                    <div>
                        <label for="budgetItem" class="block text-green-700">Budget Item</label>
                        <input type="string" name="budgetItem" id="budgetItem" >
                    </div>
                    <!-- Add additional fields for other project details -->
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Project</button>
        </div>
    </form>

</div>
</x-app-layout>
