<?php

namespace App\Repositories\Module;

use App\Repositories\BaseRepository;
use App\Models\Module;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Collection;

class ModuleRepository extends BaseRepository
{
    /**
     * Associated Repository Model
     */
    const MODEL = Module::class;

    /** @return Collection|null */
    public function getFathers(): ?Collection
    {
        return $this->query()->whereNull('mod__mod_id')
            ->where('mod_status', ST_ACTIVE)
            ->orderBy('mod_position','ASC')
            ->get(['mod_id','mod_status','mod_route','mod_name','mod_icon_menu']);
    }

    /**
     * @param int $module
     * @param int|null $profile
     *
     *  @return Collection|null
     */
    public function getChildren(int $module, ?int $profile): ?Collection
    {
        $result = $this->query()->where('mod__mod_id', $module)
            ->where('mod_status',ST_ACTIVE);

            if ($profile > 0) {
                $result->whereHas('profiles', function (Builder $query) use ($profile) {
                    $query->where('pro_id', $profile);
                });
            }

        return $result->select(['mod_id','mod_status','mod_route','mod_name','mod_icon_menu'])
            ->get();
    }
}
