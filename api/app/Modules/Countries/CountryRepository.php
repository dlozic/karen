<?php

namespace Modules\Countries;

use Modules\Core\AppRepository;
use Modules\Countries\Country;
use Modules\Countries\CountrySearch;

class CountryRepository extends AppRepository
{
    public function __construct()
    {
        $this->query = Country::query();
    }

    public function search($params)
    {
        $this->query = CountrySearch::apply($params, $this->query);
        return $this;
    }
}