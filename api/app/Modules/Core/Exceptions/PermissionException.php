<?php

namespace Modules\Core\Exceptions;


class PermissionException extends AppException
{
    protected $errorCode = 'acl.no_permissions';
}
