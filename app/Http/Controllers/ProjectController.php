<?php
namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // Retrieve all projects from the database
        $projects = Project::all();

        // Return the view with the projects data
        return view('projects.index', compact('projects'));
    }



    public function createProject()
    {
        // Return the view for creating a new project
        return 'Hello from Controller';
    }


    public function store(Request $request)
    {
        // Validate the request data
        $validatedData= $request;
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Create a new project in the database
        Project::create([
        'name' => $request->name,
        'description' => $request->description,
    ]);

    // Create a new project instance
        $project = new Project();
        $project->name = $validatedData['name'];
        $project->description = $validatedData['description'];
        $project->save();

        // Redirect the user with a success message
        // Attempt to save the project
        if ($project->save()) {

 // Fetch all projects created by the authenticated user
 $projects = Project::where('id', auth()->id())->get();

 // Pass the projects data to the view
 return view('projects', ['projects' => $projects]);
        } else {
            // Data could not be stored
            return back()->withInput()->with('error', 'Failed to store project data.');
        }
    }

    public function destroy(Project $project)
    {
        $projectName = $project->name;
        // Delete the project
        $project->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', "Project $projectName deleted successfully.");
        session()->flash('success')->delay(2);
    }

    public function edit(Project $project)
{
    // Assuming you're using Eloquent and 'projects' table
    return view('projects.edit', compact('project'));
}

public function search(Request $project)
    {
        // Retrieve search query
        $search = $project->input('search');

        // Query projects sorted by most recently created
        $projects = Project::latest();

        // If search query is provided, filter projects by name
        if ($search) {
            $projects->where('name', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
                       ->get();
        }

        // Retrieve projects
        $projects = $projects->get();

        // Return the view with the sorted projects
        return view('projects.index', compact('projects'));
    }


}
?>
