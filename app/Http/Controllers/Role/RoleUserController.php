<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Silber\Bouncer\Database\Role;

class RoleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Silber\Bouncer\Database\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function index(Role $role)
    {
        $this->authorize('view', $role);

        return view('control-panel.roles.show.users', [
            'role' => $role,
            'users' => $role
                ->users()
                ->with('roles:title')
                ->paginate(10),
        ]);
    }
}
