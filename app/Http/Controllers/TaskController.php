
namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        // Retrieve all tasks from the database
        $tasks = Task::all();

        // Return the view with the tasks data
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        // Return the view for creating a new task
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Create a new task in the database
        Task::create($request->all());

        // Redirect to the index page with a success message
        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }

    public function show(Task $task)
    {
        // Return the view with the details of a specific task
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        // Return the view for editing a specific task
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        // Validate the request data
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Update the task in the database
        $task->update($request->all());

        // Redirect to the index page with a success message
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    public function destroy(Task $task)
    {
        // Delete the task from the database
        $task->delete();

        // Redirect to the index page with a success message
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }
}
