<?php

namespace Modules\Contacts;

use Modules\Contacts\Groups\ContactGroup;
use Modules\Core\AppModel;

class Contact extends AppModel
{
    protected $fillable = [
        'first_name',
        'last_name',
        'created_by_id',
        'owner_id'
    ];

    public $with = ['groups'];

    public function groups()
    {
        return $this->belongsToMany(
            ContactGroup::class,
            'contact_memberships',
            'contact_id',
            'group_id'
        );
    }
}
