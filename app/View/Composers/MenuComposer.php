<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Repositories\Module\ModuleRepository;

class MenuComposer
{
    /** @var ModuleRepository */
    private $moduleRepository;

    public function __construct(ModuleRepository $moduleRepository) {
        $this->moduleRepository = $moduleRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view): void
    {
        $user = session('user');
        $profile = $user->profile;

        $fathers = $this->moduleRepository->getFathers();

        $menu = array();
        $options = array();
        $independets = array();
        foreach($fathers as $father) {

            if (is_null($father->mod_route)) {

                $expand = false;

                $children = $this->moduleRepository->getChildren();

            } else {

                $regUnique = new \stdClass();
                $regUnique->id = $father->mod_id;
                $regUnique->name = $father->mod_name;
                $regUnique->route = $father->mod_route;
                $regUnique->iconMenu = $father->mod_icon_menu;
                $regUnique->children = [];
                $regUnique->expand = false;

                $independets[] = $regUnique;
            }
        }

        $menu = array_merge($options,$independets);

		$view->with('menu',$menu);
    }
}
