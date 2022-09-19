<?php

namespace App\Repositories\Module;

use App\Repositories\BaseRepository;
use App\Models\Privilege;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Collection;

class PrivilegesRepository extends BaseRepository
{
    /**
     * Associated Repository Model
     */
    const MODEL = Privilege::class;
}
