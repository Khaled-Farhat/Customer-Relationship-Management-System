<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\GetTasksRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class UserTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Http\Requests\Task\GetTasksRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function index(GetTasksRequest $request, User $user)
    {
        $this->authorize('view', $user);

        return view('control-panel.users.show.tasks', [
            'user' => $user,
            'tasks' => $user
                ->tasks()
                ->filter($request->filters())
                ->with(['project', 'user', 'status'])
                ->latest()
                ->paginate(10),
        ]);
    }
}
