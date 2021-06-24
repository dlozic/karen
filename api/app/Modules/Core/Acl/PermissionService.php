<?php

namespace Modules\Core\Acl;

use Modules\Core\AppService;
use Modules\Core\Exceptions\PermissionException;

class PermissionService extends AppService
{
    /* gets a list of action strings, throws exception if no permission */
    public function continueIf($actions)
    {
        if(is_string($actions)) { $actions = [$actions]; }
        $actions = collect($actions);

        $actions->each(function($actionName) {
            if(!$this->isAllowed($actionName)) {
                throw new PermissionException();
            }
        });

        return true;
    }

    public function isAllowed($actionName)
    {
        $roleId = auth_user('role_id');
        $actionId = $this->getActionId($actionName);

        $isAllowed = Permission::isAllowed($roleId, $actionId);
        return $isAllowed;
    }

    public function createAction($name) {
        return Action::create(compact('name'));
    }

    private function getActionId($actionName)
    {
        $action = Action::whereName($actionName)->first();
        if(!$action) { throw new PermissionException(); }
        return $action->id;
    }

    public function getAllowedActions()
    {
        $roleId = auth()->user()->role_id;

        $result = Action::whereHas('permissions',
            fn($subquery) =>
                $subquery->where('role_id', $roleId)
                    ->where('is_allowed', true)
        )->get();

        return $result->toArray();
    }
}