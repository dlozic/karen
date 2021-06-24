<?php

namespace Modules\Cities;

use Illuminate\Database\Eloquent\Builder;

class CitySearch
{
    public static function apply($search, Builder $query)
    {
        /* search by name */
        if($search->has('name'))
        {
            $name = $search->get('name');
            $query->where('name', 'like', "%{$name}%");
        }

        /* search by country_id */
        if($search->has('country_id'))
        {
            $countryId = $search->get('country_id');
            $query->where('country_id', "%{$countryId}%");
        }

        return $query;
    }
}