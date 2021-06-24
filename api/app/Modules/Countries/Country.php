<?php

namespace Modules\Countries;

use Modules\Core\AppModel;

class Country extends AppModel
{
    protected $table = 'app_countries';

    protected $fillable = [
        'name',
        'native_name'
    ];

    public $timestamps = false;

}