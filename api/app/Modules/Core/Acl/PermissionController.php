<?php

namespace Modules\Core\Acl;

use Modules\Core\AppController;

class PermissionController extends AppController
{
    /* services */
    protected PermissionService $permissionService;

    public function __construct(PermissionService $ps) {
        $this->permissionService = $ps;
    }

    /* list permissions logged in user can consume */
    public function index()
    {
        $actions = $this->permissionService->getAllowedActions();
        return success($actions);
    }

}
