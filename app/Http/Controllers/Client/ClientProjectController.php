<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\GetProjectsRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Http\Requests\Project\GetProjectsRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function index(GetProjectsRequest $request, Client $client)
    {
        $this->authorize('view', $client);

        return view('control-panel.clients.show.projects', [
            'client' => $client,
            'projects' => $client
                ->projects()
                ->filter($request->filters())
                ->latest()
                ->with(['client', 'manager', 'status'])
                ->paginate(10),
        ]);
    }
}
