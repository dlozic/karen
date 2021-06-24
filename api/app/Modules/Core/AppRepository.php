<?php

namespace Modules\Core;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Modules\Core\Exceptions\FailedDeleteException;
use Modules\Core\Exceptions\NotFoundException;

abstract class AppRepository
{
    protected $query = null;

    public function getQuery() { return $this->query; }

    public function paginate()
    {
        return $this->query->paginate();
    }

    public function get()
    {
        return $this->query->get();
    }

    public function save()
    {
        return $this->query->save();
    }

    public function findOrFail($id)
    {
        try {
            return $this->query->findOrFail($id);
        } catch (ModelNotFoundException $ex){
            throw new NotFoundException();
        }
    }

    public function orderBy($column, $direction = 'asc')
    {
        return $this->query->orderBy($column, $direction);
    }

    public function create($data)
    {
        return $this->query->create($data);
    }

    public function update($id, $formData = [])
    {
        return $this->findOrFail($id)
            ->fill($formData);
    }

    public function destroy($id)
    {
        if(!$this->findOrFail($id)->delete()) { throw new FailedDeleteException(); }
        return true;
    }
}
