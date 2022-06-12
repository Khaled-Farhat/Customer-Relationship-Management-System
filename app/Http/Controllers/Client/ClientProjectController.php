<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function index(Client $client)
    {
        return view('control-panel.clients.show.projects', [
            'client' => $client,
            'projects' => $client
                ->projects()
                ->latest()
                ->with(['client', 'manager', 'status'])
                ->paginate(10),
        ]);
    }
}
