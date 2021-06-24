<?php

namespace Modules\Timezones;

use Modules\Core\AppRepository;

class TimezoneRepository extends AppRepository
{
    public function __construct()
    {
        $this->query = Timezone::query();
    }

    public function search($params)
    {
        $this->query = TimezoneSearch::apply($params, $this->query);
        return $this;
    }
}