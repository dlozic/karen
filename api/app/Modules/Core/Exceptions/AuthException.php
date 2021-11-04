<?php

namespace Modules\Core\Exceptions;

use Illuminate\Support\Facades\Log;

class AuthException extends AppException
{
    protected $httpCode = 401;

    public function report()
    {

        $metadata = $this->getRequestMetadata();

        /* hide password in log */
        if(isset($metadata['body']['password'])) {
            $metadata['body']['password'] = '******';
        }

        Log::error($metadata);
    }
}
