<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return view('control-panel.users.show.projects', [
            'user' => $user,
            'projects' => $user
                ->projects()
                ->latest()
                ->with(['client', 'manager', 'status'])
                ->paginate(10),
        ]);
    }
}
