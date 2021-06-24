<?php

namespace Modules\Timezones;

use Illuminate\Http\Request;
use Modules\Core\AppController;

class TimezoneController extends AppController
{
    /* services */
    protected TimezoneService $timezoneService;

    public function __construct(TimezoneService $ts)
    {
        $this->timezoneService = $ts;
    }

    public function index(Request $request)
    {
        $filters = collect($request->all());
        $tz = $this->timezoneService->get($filters);
        return success($tz);
    }

}
