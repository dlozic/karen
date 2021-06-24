<?php

namespace Modules\Core\Exceptions;


class ValidationException extends AppException
{
    protected $httpCode = 422;
    protected $errorCode = 'app.validation_error';

    public function __construct($errors)
    {
        $errors['messages'] = [__("exceptions.{$this->errorCode}")];
        $this->errors = $errors;
    }
}
