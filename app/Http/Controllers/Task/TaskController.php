<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\GetTasksRequest;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Models\Project;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Http\Requests\Task\GetTasksRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index(GetTasksRequest $request)
    {
        $this->authorize('viewAny', Task::class);

        $tasks = Task::filter($request->filters())
            ->latest()
            ->with(['project', 'user', 'status'])
            ->paginate(10);

        return view('control-panel.tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Task::class);

        if (is_null(Project::first())) {
            session()->flash('error', 'Create some projects before creating a task');

            return redirect()->back();
        }

        return view('control-panel.tasks.create', [
            'projects' => Project::pluck('id', 'title'),
            'users' => User::pluck('id', 'name'),
            'statuses' => Status::pluck('id', 'name'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Task\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->validated());

        session()->flash('success', 'Task created successfully');

        return redirect()->route('tasks.show', $task);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $this->authorize('view',$task);

        session()->reflash();

        return redirect()->route('tasks.documents.index', $task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $this->authorize('update',$task);

        return view('control-panel.tasks.edit', [
            'task' => $task,
            'projects' => Project::pluck('id', 'title'),
            'users' => User::pluck('id', 'name'),
            'statuses' => Status::pluck('id', 'name'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Task\UpdateTaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        session()->flash('success', 'Task updated successfully');

        return redirect()->route('tasks.show', $task);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $this->authorize('delete',$task);

        $task->delete();

        session()->flash('success', 'Task deleted successfully');

        // when deleting from any 'show' page, redirect to the tasks index
        $projectShowSections = ['documents'];
        foreach ($projectShowSections as $section) {
            $routeName ='tasks.' . $section . '.index';
            if (url()->previous() === route($routeName, $task)) {
                return redirect()->route('tasks.index');
            }
        }

        return redirect()->back();
    }
}
