<?php

namespace Modules\Contacts;

use Illuminate\Database\Eloquent\Builder;

class ContactSearch
{
    public static function apply($search, Builder $query)
    {
        /* search by group */
        if($search->has('groups'))
        {
            $groups = $search->get('groups');
            $query->whereHas('groups', function($subquery) use ($groups) {
                $subquery->whereIn('id', $groups);
            });
        }

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

        /* search by creator */
        if($search->has('created_by_id'))
        {
            $query->where('created_by_id', $search->get('created_by_id'));
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

        /* search by owner */
        if($search->has('owner_id'))
        {
            $query->where('owner_id', $search->get('owner_id'));
        }

        return $query;
    }
}