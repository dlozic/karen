<?php

namespace Modules\Core\Users;

use Illuminate\Database\Eloquent\Builder;

class UserSearch
{
    public static function apply($search, Builder $query)
    {

        /* search by date from */
        if($search->has('created_from'))
        {
            $query->whereDate('created_at', '>=', $search->get('created_from'));
        }

        /* search by date to */
        if($search->has('created_to'))
        {
            $query->whereDate('created_at', '<=', $search->get('created_to'));
        }

        /* search by first or last name */
        if($search->has('first_name'))
        {
            $fn = $search->get('first_name');
            $query->where('first_name', 'like', "%{$fn}%");
        }

        if($search->has('last_name'))
        {
            $ln = $search->get('last_name');
            $query->where('last_name', 'like', "%{$ln}%");
        }

        return $query;
    }
}