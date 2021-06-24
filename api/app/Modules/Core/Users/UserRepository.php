<?php

namespace Modules\Core\Users;

use Modules\Core\AppRepository;

class UserRepository extends AppRepository
{
    public function __construct()
    {
        $this->query = User::query();
    }

    public function search($params)
    {
        $this->query = UserSearch::apply($params, $this->query);
        return $this;
    }
}