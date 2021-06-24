<?php

namespace Modules\Cities;

use Modules\Core\AppRepository;

class CityRepository extends AppRepository
{
    public function __construct()
    {
        $this->query = City::query();
    }

    public function search($params)
    {
        $this->query = CitySearch::apply($params, $this->query);
        return $this;
    }
}