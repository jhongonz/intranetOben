<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    public function __construct() {

    }

    /**
     * Index Profile
     * @return mixed
     */
    public function index(): string|JsonResponse
    {
        $view = view('manager.profile.index')
            ->with('as','asd')
            ->render();

        if (request()->ajax()) {
			return response()->json(['status'=>STATUS_OK,'html'=>$view]);
		} else {
			return $view;
		}
    }
}
