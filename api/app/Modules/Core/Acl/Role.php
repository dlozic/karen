<?php

namespace Modules\Core\Acl;

use Modules\Core\AppModel;

class Role extends AppModel
{
    protected $table = 'acl_roles';
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    protected $appends = [
        'translated_name'
    ];

    public function getTranslatedNameAttribute()
    {
        $trans = __("auth.roles.{$this->name}");
        return $trans;
    }
}