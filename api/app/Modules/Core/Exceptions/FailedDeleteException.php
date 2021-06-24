<?php

namespace Modules\Core\Exceptions;


class FailedDeleteException extends AppException
{
    protected $errorCode = 'app.entity_removal_failed';
}
