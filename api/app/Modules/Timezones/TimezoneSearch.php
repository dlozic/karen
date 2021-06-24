<?php

namespace Modules\Timezones;

use Illuminate\Database\Eloquent\Builder;

class TimezoneSearch
{
    public static function apply($search, Builder $query)
    {
        /* search by name */
        if($search->has('name'))
        {
            $name = $search->get('name');
            $query->where('name', 'like', "%{$name}%");
        }

        return $query;
    }
}