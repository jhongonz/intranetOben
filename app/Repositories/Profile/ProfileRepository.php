<?php

namespace App\Repositories\Profile;

use App\Repositories\BaseRepository;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProfileRepository extends BaseRepository
{
    /**
     * Associated Repository Model
     */
    const MODEL = Profile::class;

    /** @var atring */
    const STATUS_FIELD = 'pro_status';
}
