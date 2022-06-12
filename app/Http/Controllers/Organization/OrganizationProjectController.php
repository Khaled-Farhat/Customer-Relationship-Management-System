<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function index(Organization $organization)
    {
        return view('control-panel.organizations.show.projects', [
            'organization' => $organization,
            'projects' => $organization
                ->projects()
                ->latest()
                ->with(['client', 'manager', 'status'])
                ->paginate(10),
        ]);
    }
}
