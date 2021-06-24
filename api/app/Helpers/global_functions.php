<?php

use Illuminate\Support\Facades\Cache;
use Modules\Core\Acl\PermissionService;
use Modules\Core\Exceptions\AuthException;
use Modules\Core\Exceptions\NotFoundException;

function success($data = [])
{
    $result = ['success' => true];

    if(!empty($data)) { $result['response'] = $data; }

    return $result;
}

function continue_if($actions)
{
    return (new PermissionService)->continueIf($actions);
}

function is_allowed($actionName)
{
    return (new PermissionService)->isAllowed($actionName);
}

function auth_user($param)
{
    $value = auth()->user()->$param ?? null;
    if(!$value) { throw new AuthException('auth.token_invalid'); }
    return $value;
}

?>