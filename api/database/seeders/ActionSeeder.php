<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Core\Acl\Action;
use Modules\Core\Acl\PermissionService;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actionsInFile = require(database_path('actions/index.php'));
        $actionsInDatabase = Action::pluck('name');

        /* only new actions, never touch history */
        $diff = $actionsInFile->diff($actionsInDatabase);

        $diff->each(function($actionName) {
            (new PermissionService)->createAction($actionName);
        });
    }
}
