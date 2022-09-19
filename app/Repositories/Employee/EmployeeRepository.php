<?php

namespace App\Repositories\Employee;

use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use App\Models\Employee;
use App\Models\EmployeeLenguage;
use App\Models\Lenguage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EmployeeRepository extends BaseRepository
{
    /**
     * Associated Repository Model
     */
    const MODEL = Employee::class;

    /**
     * @param Employee $employee
     * @param Request $request;
     *
     * @return EmployeeLenguage $lenguage
     */
    public function getLenguage(Employee $employee, Request $request): EmployeeLenguage
    {
        $lenguage = EmployeeLenguage::firstOrCreate(
            [
                'mlen__emp_id' => $employee->emp_id,
                'mlen__len_id' => $request->idLeng
            ]
        );

        return $lenguage;
    }

    /**
     * @param Employee $employee
     * @param int $default
     *
     * @return void
     */
    public function changeLenguages(Employee $employee, int $default): void
    {
        $employee->lenguages()->update(['mlen_default'=>$default,'mlen_updated_at'=>\Carbon\Carbon::now('America/Lima')]);
    }

    /**
     * @param Employee $employee
     * @param EmployeeLenguage $lenguage
     * @param int $default
     *
     * @return void
     */
    public function changeLenguage(Employee $employee, EmployeeLenguage $lenguage, int $default): void
    {
        $employee->lenguages()->wherePivot('mlen_id', $lenguage->mlen_id)->update(['mlen_default'=>$default,'mlen_updated_at'=>\Carbon\Carbon::now('America/Lima')]);
    }

    /**
     * @param Employee $employee
     *
     * @return string
     */
    public function getLenguageDefault(Employee $employee): string
    {
        $lenguage = $employee->lenguages()
            ->wherePivot('mlen_default', DB_TRUE)
            ->first();

        return $lenguage->len_code ?? 'es';
    }

    /**
     * @param Employee $employee
     * @param string $code
     *
     * @return Lenguage
     */
    public function getLenguageDefaultRepository(Employee $employee, string $code): Lenguage
    {
        return $employee->lenguages()
            ->where('app_lenguages.len_status', ST_ACTIVE)
            ->where('app_lenguages.len_code', $code)
            ->first();
    }
}
