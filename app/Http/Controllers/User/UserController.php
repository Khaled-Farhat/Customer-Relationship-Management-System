<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Silber\Bouncer\BouncerFacade as Bouncer;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', User::class);

        return view('control-panel.users.index', [
            'users' => User::latest()
                ->with('roles:title')
                ->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', User::class);

        return view('control-panel.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\User\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());
        $user->assign('user'); // assign user role

        session()->flash('success', 'User created successfully');

        return redirect()->route('users.show', $user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);

        session()->reflash();

        return redirect()->route('users.projects.index', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $data = [
            'user' => $user,
        ];

        if (request()->user()->can('updateRole', $user)) {
            $data['roles'] =  Bouncer::role()->pluck('title', 'title');
        }

        return view('control-panel.users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\User\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $input = $request->validated();

        if (isset($input['role_title'])) {
            $role = Bouncer::role()->firstWhere('title', $input['role_title']);
            Bouncer::sync($user)->roles([$role]);
            unset($input['role_title']);
        }

        if (!$request->filled('password')) {
            unset($input['password']);
        }
        else {
            $input['password'] = Hash::make($input['password']);
        }

        $user->update($input);

        session()->flash('success', 'User updated successfully');

        return redirect()->route('users.show', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();

        session()->flash('success', 'User deleted successfully');

        return redirect()->route('users.index');
    }
}
