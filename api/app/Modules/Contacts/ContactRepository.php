<?php

namespace Modules\Contacts;

use Modules\Core\AppRepository;

class ContactRepository extends AppRepository
{
    public function __construct()
    {
        $this->query = Contact::query();
    }

    public function createdBy($userId)
    {
        return $this->query->where('created_by_id', $userId);
    }

    public function search($params)
    {
        $this->query = ContactSearch::apply($params, $this->query);
        return $this;
    }
}