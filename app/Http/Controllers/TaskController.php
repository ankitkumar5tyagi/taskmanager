<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use function PHPUnit\Framework\isNull;

class TaskController extends Controller
{

    public function home(Request $request)
    {   
        if(empty($request->input('query'))) {
            $tasks = Task::orderby('created_at','desc')->paginate(20);
            $grouped = $tasks->groupby(function($tasks){
                return $tasks->date;
            });
            return view('home', compact('tasks','grouped'));
        }
            $searchTerm = $request->input('query');
            $tasks = Task::where('task', 'like', '%' . $searchTerm . '%')
                                ->orWhere('customer_name', 'like', '%' . $searchTerm . '%')
                                ->orWhere('customer_mobile', 'like', '%' . $searchTerm . '%')
                                ->orWhere('detail', 'like', '%' . $searchTerm . '%')
                                ->orWhere('status', 'like', '%' . $searchTerm . '%')
                                ->orderby('created_at','desc')
                                ->paginate(10);
            $grouped = $tasks->groupby(function($tasks){
                return $tasks->date;
            });                   
            return view('home', compact('grouped', 'tasks'));
       
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $user = Auth::user();
        $tasks = $user->tasks()->orderby('created_at','desc')->paginate(30);
        $grouped = $tasks->groupby(function($tasks){
            return $tasks->date;
        });
        return view('task.task', compact('tasks','grouped'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        return view('task.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields= $request->validate([
            'date'=>'required|date',
            'task'=> 'required',
            'detail' => 'required',
            'status' => 'required',
            'customer_name' => 'nullable|max:255',
            'customer_mobile' => 'nullable|numeric'
        ]);
         
        $user = Auth::user();
        $user->tasks()->create($fields);
        
        return redirect()->route('task.index')->with('success', 'Task Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        Gate::authorize('modify', $task);
        $services = Service::all();
        return view('task.edit', compact('task','services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $fields= $request->validate([
            'date'=>'required|date',
            'task'=> 'required',
            'detail' => 'required',
            'status' => 'required',
            'customer_name' => 'nullable|max:255',
            'customer_mobile' => 'nullable|numeric'
        ]);
        $task->update($fields);
        
        return redirect()->route('task.index')->with('success', 'Task Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        Gate::authorize('modify', $task);
        $task->delete();
        return back()->with('success', 'Task Deleted Successfully');
    }
}
