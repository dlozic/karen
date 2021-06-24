<?php

namespace Modules\Cities;

use Illuminate\Http\Request;
use Modules\Core\AppController;

class CityController extends AppController
{
    /* services */
    protected CityService $cityService;

    public function __construct(CityService $cs)
    {
        $this->cityService = $cs;
    }

    public function index(Request $request)
    {
        $filters = collect($request->all());
        $cities = $this->cityService->get($filters);
        return success($cities);
    }

}
