<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Document\StoreDocumentRequest;
use App\Models\Task;
use App\Services\DocumentService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;

class TaskDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function index(Task $task)
    {
        $this->authorize('view', $task);

        return view('control-panel.tasks.show.documents', [
            'task' => $task,
            'documents' => $task
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
     * @param  \App\Models\Task  $Task
     * @param  \App\Services\DocumentService  $documentService
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentRequest $request, Task $task, DocumentService $documentService)
    {
        $this->authorize('create', Document::class);

        try {
            $documentService->store($task, $request->file('document'));
            session()->flash('success', 'File uploaded successfully');
        }
        catch (UploadException $exception) {
            session()->flash('error', 'Failed to upload the file');
        }

        return redirect()->back();
    }
}
