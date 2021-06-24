<?php

namespace Modules\Core\Files;

use Illuminate\Http\UploadedFile;
use Modules\Core\AppService;
use Modules\Core\Exceptions\FileUploadException;

class UploadService extends AppService
{
    public function file(UploadedFile $rawFile = null, $metadata = [])
    {
        $this->validate($rawFile);
        $metadata = array_merge($this->parseRawFile($rawFile), $metadata);
        $metadata['disk_name'] = $this->saveToDisk($rawFile);
        $metadata['uploaded_by_id'] = auth_user('id');

        $file = AppFile::create($metadata);
        return $file;
    }

    public function saveToDisk(UploadedFile $file)
    {
        return basename($file->store('files'));
    }

    private function parseRawFile(UploadedFile $rawFile)
    {
        return [
            'original_name' => $rawFile->getClientOriginalName(),
            'mime_type' => $rawFile->getMimeType(),
            'file_size' => $rawFile->getSize()
        ];
    }

    private function validate(UploadedFile $rawFile)
    {
        if(!$rawFile || !$rawFile->isValid())
        {
            throw new FileUploadException();
        }
    }
}
