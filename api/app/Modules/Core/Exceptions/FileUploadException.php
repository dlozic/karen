<?php

namespace Modules\Core\Exceptions;

class FileUploadException extends AppException
{
    protected $httpCode = 422;
    protected $errorCode = 'app.file_upload_error';
}