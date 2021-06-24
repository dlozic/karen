<?php

namespace Modules\Core\Acl;

use Modules\Core\AppModel;

class Permission extends AppModel
{
    protected $table = 'acl_permissions';

    protected $fillable = [
        'action_id',
        'role_id',
        'is_allowed'
    ];

    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;

    public static function isAllowed($roleId, $actionId)
    {
        $query = self::query();

        $isAllowed = $query->where('role_id', $roleId)
            ->where('action_id', $actionId)
            ->pluck('is_allowed')
            ->first();

        return $isAllowed === true;
    }

    public function role() { return $this->belongsTo(Role::class); }
    public function action() { return $this->belongsTo(Action::class); }
}