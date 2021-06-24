<?php

namespace Modules\Core\Exceptions;

class NotFoundException extends AppException
{
    protected $errorCode = 'app.entity_not_found';
}
