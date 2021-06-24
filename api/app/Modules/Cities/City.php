<?php

namespace Modules\Cities;

use Modules\Core\AppModel;
use Modules\Countries\Country;

class City extends AppModel
{
    protected $table = 'app_cities';

    protected $fillable = [
        'name',
        'country_id'
    ];

    public function country() { return $this->belongsTo(Country::class); }
}
