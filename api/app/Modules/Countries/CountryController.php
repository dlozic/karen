<?php

namespace Modules\Countries;

use Illuminate\Http\Request;
use Modules\Core\AppController;
use Modules\Countries\CountryService;

class CountryController extends AppController
{
    /* services */
    protected CountryService $countryService;

    public function __construct(CountryService $cs)
    {
        $this->countryService = $cs;
    }

    public function index(Request $request)
    {
        $filters = collect($request->all());
        $countries = $this->countryService->get($filters);
        return success($countries);
    }

}
