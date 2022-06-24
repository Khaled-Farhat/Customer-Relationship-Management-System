<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Document\StoreDocumentRequest;
use App\Models\Project;
use App\Services\DocumentService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;

class ProjectDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        $this->authorize('view', $project);

        return view('control-panel.projects.show.documents', [
            'project' => $project,
            'documents' => $project
                ->media()
                ->latest()
                ->with('model:id')
                ->paginate(10),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Document\StoreDocumentRequest  $request
     * @param  \App\Models\Project  $Project
     * @param  \App\Services\DocumentService  $documentService
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentRequest $request, Project $project, DocumentService $documentService)
    {
        $this->authorize('create', Document::class);

        try {
            $documentService->store($project, $request->file('document'));
            session()->flash('success', 'File uploaded successfully');
        }
        catch (UploadException $exception) {
            session()->flash('error', 'Failed to upload the file');
        }

        return redirect()->back();
    }
}
