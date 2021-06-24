<?php

namespace Modules\Core\Exceptions;


class AuthException extends AppException
{
    protected $httpCode = 401;
}
