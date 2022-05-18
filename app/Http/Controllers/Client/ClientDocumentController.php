<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Document\StoreDocumentRequest;
use App\Models\Client;
use App\Services\DocumentService;
use Illuminate\Http\Request;

class ClientDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function index(Client $client)
    {
        return view('control-panel.clients.show.documents', [
            'client' => $client,
            'documents' => $client->getMedia(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Document\StoreDocumentRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentRequest $request, Client $client, DocumentService $documentService)
    {
        if ($request->file('document')->isValid()) {
            $documentService->store($client, $request->file('document'));
            session()->flash('success', 'File uploaded successfully');
        }
        else {
            session()->flash('error', 'Failed to upload the file');
        }

        return redirect()->back();
    }
}
