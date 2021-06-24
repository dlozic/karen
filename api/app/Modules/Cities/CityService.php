<?php

namespace Modules\Cities;

use Illuminate\Support\Collection;
use Modules\Core\AppService;

class CityService extends AppService
{
    /* repositories */
    protected CityRepository $cityRepository;

    public function __construct(CityRepository $cr)
    {
        $this->cityRepository = $cr;
    }

    public function get(Collection $filters)
    {
        $cities = $this->cityRepository
            ->search($filters)
            ->paginate();

        return $cities;
    }
}
