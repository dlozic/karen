<?php

namespace Modules\Countries;

use Illuminate\Database\Eloquent\Builder;

class CountrySearch
{
    public static function apply($search, Builder $query)
    {

        /* search by name or native name */
        if($search->has('name'))
        {
            $name = $search->get('name');
            $query->where('name', 'like', "%{$name}%");
        }

        if($search->has('native_name'))
        {
            $name = $search->get('native_name');
            $query->where('native_name', 'like', "%{$name}%");
        }

        return $query;
    }
}