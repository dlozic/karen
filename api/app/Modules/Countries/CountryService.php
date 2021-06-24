<?php

namespace Modules\Countries;

use Illuminate\Support\Collection;
use Modules\Core\AppService;

class CountryService extends AppService
{
    /* repositories */
    protected CountryRepository $countryRepository;

    public function __construct(CountryRepository $cr) {
        $this->countryRepository = $cr;
    }

    public function get(Collection $filters)
    {
        $countries = $this->countryRepository
            ->search($filters)
            ->paginate();

        return $countries;
    }
}
