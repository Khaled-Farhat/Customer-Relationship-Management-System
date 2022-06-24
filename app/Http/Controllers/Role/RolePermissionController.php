<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Silber\Bouncer\Database\Role;

class RolePermissionController extends Controller
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

        return view('control-panel.roles.show.permissions', [
            'role' => $role,
            'permissions' => $role
                ->abilities()
                ->orderBy('title')
                ->get(),
        ]);
    }
}
