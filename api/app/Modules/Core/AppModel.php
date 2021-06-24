<?php

namespace Modules\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Venturecraft\Revisionable\RevisionableTrait;

class AppModel extends Model
{
    use HasFactory;
    use RevisionableTrait;

    protected static function newFactory()
    {
        $caller = (new \ReflectionClass(get_called_class()))->getShortName();
        $factoryClass = 'Database\\Factories\\' . $caller . 'Factory';
        return (new $factoryClass);
    }
}