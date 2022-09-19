<?php

namespace App\Providers;

use Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use App\View\Composers\ToolbarComposer;
use App\View\Composers\MenuComposer;
use App\Repositories\Employee\EmployeeRepository;

class ViewServiceProvider extends ServiceProvider
{
    /** @var EmployeeRepository */
    protected $employeeRepository;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->employeeRepository = new EmployeeRepository;

        View::composer('*', function($view) {

            if ( Auth::check() and !is_null(Auth::user()) ) {
                $locale = $this->employeeRepository->getLenguageDefault(Auth::user()->employee);
                App::setLocale($locale);
            }

            $base = (request()->ajax()) ? 'manager.layouts.content' : 'manager.layouts.main';
            $view->with('layout', $base);

            if (!request()->ajax()) {
                View::composer('manager.layouts.menu-toolbar',ToolbarComposer::class);
                View::composer('manager.layouts.menu-main',MenuComposer::class);
            }
        });
    }
}
