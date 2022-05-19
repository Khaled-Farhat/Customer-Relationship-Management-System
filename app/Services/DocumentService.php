<?php

namespace App\Services;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Spatie\MediaLibrary\HasMedia;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;

class DocumentService
{
    /**
     * Store a new document in the owner collection.
     *
     * @param  \Spatie\MediaLibrary\HasMedia  $owner
     * @param  \Illuminate\Http\UploadedFile  $file
     * @return \Illuminate\Http\Response
     */
    public function store(HasMedia $owner, UploadedFile $file)
    {
        if (!$file->isValid()) {
            throw new UploadException();
        }

        $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $fileName = $this->getNextFileName($owner, $fileName);

        $owner
            ->addMedia($file)
            ->usingName($fileName)
            ->usingFileName($file->hashName())
            ->toMediaCollection();
    }

    /**
     * Download the specified document.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function download(Request $request, Document $document)
    {
        $extension = pathinfo($document->file_name, PATHINFO_EXTENSION);
        $downloadFileName = "{$document->name}.{$extension}";

        $response = $document->toResponse($request);
        $response->headers->set('Content-Disposition', "attachment; filename={$downloadFileName}");
        return $response;
    }

    /**
     * Get a unique file name according to the copies count in the owner collection.
     *
     * @param  \Spatie\MediaLibrary\HasMedia  $owner
     * @param  string  $copifileNameesCount
     * @return string
     */
    private function getNextFileName(HasMedia $owner, string $fileName)
    {
        $copiesCount = 0;
        while ($this->ownerHasFile($owner, $this->generateFileName($fileName, $copiesCount))) {
            ++$copiesCount;
        }

        return $this->generateFileName($fileName, $copiesCount);
    }

    /**
     * Check if the owner has a file with same name.
     *
     * @param  \Spatie\MediaLibrary\HasMedia  $owner
     * @param  string  $fileName
     * @return bool
     */
    private function ownerHasFile(HasMedia $owner, string $fileName)
    {
        return $owner
                    ->media()
                    ->where('name', $fileName)
                    ->exists();
    }

    /**
     * Generate a file name in format: $orignialName - (Copy $copiesCount).
     *
     * @param  string  $originalName
     * @param  string  $copiesCount
     * @return string
     */
    private function generateFileName(string $originalName, string $copiesCount)
    {
        if ($copiesCount == 0) {
            return $originalName;
        }
        else {
            return "{$originalName} - (Copy {$copiesCount})";
        }
    }
}
