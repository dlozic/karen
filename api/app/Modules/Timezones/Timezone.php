<?php

namespace Modules\Timezones;

use Modules\Core\AppModel;

class Timezone extends AppModel
{
    protected $table = 'app_timezones';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description'
    ];
}
