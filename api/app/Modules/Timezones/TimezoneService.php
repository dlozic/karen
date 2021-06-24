<?php

namespace Modules\Timezones;

use Illuminate\Support\Collection;
use Modules\Core\AppService;
use Modules\Timezones\TimezoneRepository;

class TimezoneService extends AppService
{
    /* repositories */
    protected TimezoneRepository $timezoneRepository;

    public function __construct(TimezoneRepository $tr)
    {
        $this->timezoneRepository = $tr;
    }

    public function get(Collection $filters)
    {
        $tz = $this->timezoneRepository
            ->search($filters)
            ->paginate();

        return $tz;
    }
}
