<?php

namespace Modules\Core\AppLanguages;

use Modules\Core\AppModel;

class AppLanguage extends AppModel
{
    protected $table = 'app_languages';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'short_name',
        'native_name'
    ];
}