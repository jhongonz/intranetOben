<?php

namespace App\Repositories\Lenguage;

use App\Repositories\BaseRepository;
use App\Models\Lenguage;
use Illuminate\Database\Eloquent\Collection;

class LenguageRepository extends BaseRepository
{
    /**
     * Associated Repository Model
     */
    const MODEL = Lenguage::class;

    /** @return Collection|null */
    public function getAll(?string $code = null): ?Collection
    {
        $result = $this->query()->where('len_status','>',ST_DELETE);

        if (!is_null($code)) {
            $result->where('len_code','<>', $code);
        }

        return $result->get();
    }
}
