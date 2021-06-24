<?php

namespace Modules\Core\Files;

use Modules\Core\AppController;
use Modules\Core\Files\Requests\AttemptUpload;
use Modules\Core\Files\UploadService;

class UploadController extends AppController
{
    /* services */
    protected UploadService $uploadService;

    public function __construct(UploadService $us)
    {
        $this->uploadService = $us;
    }

    public function __invoke(AttemptUpload $request)
    {
        $file = $this->uploadService->file(
            $request->file('file'),
            $request->validated()
        );
        return success($file);
    }
}