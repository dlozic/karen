<?php

namespace Modules\Core\Acl;

use Modules\Core\AppModel;

class Action extends AppModel
{
    protected $table = 'acl_actions';

    protected $fillable = [
        'name'
    ];

    public $timestamps = false;

    protected static function booted()
    {
        static::created(function ($action) {
            $roleIds = collect(Role::pluck('id'));
            $actionId = $action->id;

            $roleIds->each(function($roleId) use ($actionId) {
                Permission::create([
                    'role_id' => $roleId,
                    'action_id' => $actionId,
                    'is_allowed' => env('SEED_PERMISSION_IS_ALLOWED', false)
                ]);
            });
        });
    }

    public function permissions()
    {
        return $this->belongsToMany(Role::class, 'acl_permissions');
    }
}