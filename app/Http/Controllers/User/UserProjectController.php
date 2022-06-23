<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\GetProjectsRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Http\Requests\Project\GetProjectsRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function index(GetProjectsRequest $request, User $user)
    {
        $this->authorize('view', $user);

        return view('control-panel.users.show.projects', [
            'user' => $user,
            'projects' => $user
                ->projects()
                ->filter($request->filters())
                ->latest()
                ->with(['client', 'manager', 'status'])
                ->paginate(10),
        ]);
    }
}
