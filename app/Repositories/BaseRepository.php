<?php

namespace App\Repositories;

class BaseRepository
{
    /** @return mixed */
    public function getAll()
    {
        return $this->query()->get();
    }

    /** @return int */
    public function getCount()
    {
        return $this->query()->count();
    }

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function find(int $id)
    {
        return $this->query()->find($id);
    }

    /** @return mixed */
    public function query()
    {
        return call_user_func(static::MODEL.'::query');
    }
}
