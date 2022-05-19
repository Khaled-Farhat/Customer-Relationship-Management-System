<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Document\StoreDocumentRequest;
use App\Models\Client;
use App\Services\DocumentService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;

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
            'documents' => $client->media()->latest()->paginate(10),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Document\StoreDocumentRequest  $request
     * @param  \App\Models\Client  $client
     * @param  \App\Services\DocumentService  $documentService
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentRequest $request, Client $client, DocumentService $documentService)
    {
        try {
            $documentService->store($client, $request->file('document'));
            session()->flash('success', 'File uploaded successfully');
        }
        catch (UploadException $exception) {
            session()->flash('error', 'Failed to upload the file');
        }

        return redirect()->back();
    }
}
