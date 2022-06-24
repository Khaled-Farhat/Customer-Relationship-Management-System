<?php

namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;
use App\Http\Requests\Document\StoreDocumentRequest;
use App\Http\Requests\Document\UpdateDocumentRequest;
use App\Models\Document;
use App\Services\DocumentService;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Document $document, DocumentService $documentService)
    {
        $this->authorize('view', $document->model);

        return $documentService->download($request, $document);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Document\UpdateDocumentRequest  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocumentRequest $request, Document $document)
    {
        $this->authorize('update', $document);

        $document->name = $request->name;
        $document->save();

        session()->flash('success', 'Document renamed successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $this->authorize('delete', $document);

        $document->delete();

        session()->flash('success', 'Document deleted successfully');

        return redirect()->back();
    }
}
