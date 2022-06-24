<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use Illuminate\Http\Request;
use Silber\Bouncer\Database\Role;
use Silber\Bouncer\BouncerFacade as Bouncer;
use Silber\Bouncer\Database\Titles\RoleTitle;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Role::class);

        return view('control-panel.roles.index', [
            'roles' => Role::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Role::class);

        return view('control-panel.roles.create', [
            'permissions' => Bouncer::ability()
                ->orderBy('title')
                ->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Role\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $role = Role::create(['name' => $request->name]);

        if ($request->has('permissions')) {
            $abilities = Bouncer::ability()->whereIn('title', $request->permissions)->get();
            Bouncer::sync($role)->abilities($abilities);
        }

        session()->flash('success', 'Role created successfully');

        return redirect()->route('roles.show', $role);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Silber\Bouncer\Database\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $this->authorize('view', $role);

        session()->reflash();

        return redirect()->route('roles.permissions.index', $role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Silber\Bouncer\Database\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $this->authorize('update', $role);

        return view('control-panel.roles.edit', [
            'role' => $role,
            'permissions' => Bouncer::ability()
                ->orderBy('title')
                ->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Role\UpdateRoleRequest  $request
     * @param  \Silber\Bouncer\Database\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        if (($role->name == 'super-admin' || $role->name == 'user')
                && $request->name != $role->name) {
            session()->flash('error', "{$role->title} role name could not be changed");
            return redirect()->back();
        }
        else {
            $role->name = $request->name;
            $role->title = RoleTitle::from($role)->toString();
            $role->save();
        }

        if ($request->has('permissions')) {
            $abilities = Bouncer::ability()->whereIn('title', $request->permissions)->get();
            Bouncer::sync($role)->abilities($abilities);
        }

        session()->flash('success', 'Role updated successfully');

        return redirect()->route('roles.show', $role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Silber\Bouncer\Database\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $this->authorize('delete', $role);

        if ($role->users()->count() !== 0) {
            session()->flash('error', 'Role is assigned to existing users');
            return redirect()->back();
        }
        else {
            $role->delete();

            session()->flash('success', 'Role deleted successfully');

            // when deleting from any 'show' page, redirect to the roles index
            $roleShowSections = ['permissions', 'users'];
            foreach ($roleShowSections as $section) {
                $routeName ='roles.' . $section . '.index';
                if (url()->previous() === route($routeName, $role)) {
                    return redirect()->route('roles.index');
                }
            }

            return redirect()->back();
        }
    }
}
