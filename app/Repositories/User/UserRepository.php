<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserRepository extends BaseRepository
{
    /**
     * Associated Repository Model
     */
    const MODEL = User::class;

    /**
     * @param string $email
     *
     * @return User|null
     */
    public function getByEmailWithEmployee(string $email): ?User
    {
        try {

            $user = $this->query()->where('user_login', $email)
                ->where('user_status', ST_ACTIVE)
                ->whereHas('employee', function(Builder $query) {
                    $query->where('emp_status', ST_ACTIVE);
                })
                ->whereHas('profile', function(Builder $query) {
                    $query->where('pro_status',ST_ACTIVE);
                })
                ->firstOrFail();

        } catch (ModelNotFoundException $e) {

            return null;
        }

        return $user;
    }

    /**
     * @param int $idUser
     *
     * @return bool|User
     */
    public function findUserWithEmployeeById(int $idUser): bool|User
    {
        try {

            $user = $this->query()->where('user_id', $idUser)
                ->where('user_status', ST_ACTIVE)
                ->whereHas('employee', function(Builder $query) {
                    $query->where('emp_status', ST_ACTIVE);
                })
                ->firstOrFail();

        } catch (ModelNotFoundException $exception) {

            return null;
        }

        return $user;
    }
}
