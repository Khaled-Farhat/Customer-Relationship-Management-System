<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\GetProjectsRequest;
use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Http\Requests\Project\GetProjectsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index(GetProjectsRequest $request)
    {
        $this->authorize('viewAny', Project::class);

        $projects = Project::latest()
            ->filter($request->filters())
            ->with(['client', 'manager', 'status'])
            ->paginate(10);

        return view('control-panel.projects.index', [
            'projects' => $projects,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Project::class);

        return view('control-panel.projects.create', [
            'organizations' => Client::pluck('id', 'name'),
            'users' => User::pluck('id', 'name'),
            'statuses' => Status::pluck('id', 'name'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Project\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $project = Project::create($request->validated());

        session()->flash('success', 'Project created successfully');

        return redirect()->route('projects.show', $project);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $this->authorize('view', $project);

        session()->reflash();

        return redirect()->route('projects.tasks.index', $project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $this->authorize('update', $project);

        return view('control-panel.projects.edit', [
            'project' => $project,
            'organizations' => Client::pluck('id', 'name'),
            'users' => User::pluck('id', 'name'),
            'statuses' => Status::pluck('id', 'name'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Project\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->validated());

        session()->flash('success', 'Project updated successfully');

        return redirect()->route('projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);

        $project->delete();

        session()->flash('success', 'Project deleted successfully');

        // when deleting from any 'show' page, redirect to the projects index
        $projectShowSections = ['documents'];
        foreach ($projectShowSections as $section) {
            $routeName ='projects.' . $section . '.index';
            if (url()->previous() === route($routeName, $project)) {
                return redirect()->route('projects.index');
            }
        }

        return redirect()->back();
    }
}
