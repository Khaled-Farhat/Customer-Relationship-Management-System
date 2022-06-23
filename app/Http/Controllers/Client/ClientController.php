<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\StoreClientRequest;
use App\Http\Requests\Client\UpdateClientRequest;
use App\Models\Client;
use App\Models\Organization;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Client::class);

        return view('control-panel.clients.index', [
            'clients' => Client::latest()->with('organization:id,name')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Client::class);

        return view('control-panel.clients.create', [
            'organizations' => Organization::pluck('id', 'name'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Client\StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        $client = Client::create($request->validated());

        session()->flash('success', 'Client created successfully');

        return redirect()->route('clients.show', $client);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        $this->authorize('view', $client);

        session()->reflash();

        return redirect()->route('clients.projects.index', $client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $this->authorize('update', $client);

        return view('control-panel.clients.edit', [
            'client' => $client,
            'organizations' => Organization::pluck('id', 'name'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Client\UpdateClientRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->validated());

        session()->flash('success', 'Client updated successfully');

        return redirect()->route('clients.show', $client);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $this->authorize('delete', $client);

        $client->delete();

        session()->flash('success', 'Client deleted successfully');

        // when deleting from any 'show' page, redirect to the clients index
        $clientShowSections = ['projects', 'documents'];
        foreach ($clientShowSections as $section) {
            $routeName ='clients.' . $section . '.index';
            if (url()->previous() === route($routeName, $client)) {
                return redirect()->route('clients.index');
            }
        }

        return redirect()->back();
    }
}
