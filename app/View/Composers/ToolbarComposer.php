<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Repositories\Lenguage\LenguageRepository;
use App\Repositories\Employee\EmployeeRepository;

class ToolbarComposer
{
    /** @var EmployeeRepository */
    private $employeeRepository;

    /** @var LenguageRepository */
    private $lenguageRepository;

    public function __construct(
        EmployeeRepository $employeeRepository,
        LenguageRepository $lenguageRepository
    ) {
        $this->employeeRepository = $employeeRepository;
        $this->lenguageRepository = $lenguageRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view): void
    {
        $employee = session('user')->employee;

        $lenguage = $this->employeeRepository->getLenguageDefault($employee);

        $lenguageRepository = $this->employeeRepository->getLenguageDefaultRepository($employee, $lenguage);
        $lenguagesRepository = $this->lenguageRepository->getAll($lenguage);

        $view->with('name', $employee->emp_name.' '.$employee->emp_lastname);
        $view->with('email', $employee->emp_email);
        $view->with('lenguage', $lenguageRepository);
        $view->with('lenguages', $lenguagesRepository);
    }
}
