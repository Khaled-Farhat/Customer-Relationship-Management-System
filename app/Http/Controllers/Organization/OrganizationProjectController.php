<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\GetProjectsRequest;
use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Http\Requests\Project\GetProjectsRequest  $request
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function index(GetProjectsRequest $request, Organization $organization)
    {
        $this->authorize('view', $organization);

        return view('control-panel.organizations.show.projects', [
            'organization' => $organization,
            'projects' => $organization
                ->projects()
                ->filter($request->filters())
                ->latest()
                ->with(['client', 'manager', 'status'])
                ->paginate(10),
        ]);
    }
}
