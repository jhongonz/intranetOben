<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Factories\UserFactory;
use App\Repositories\User\UserRepository;

class Sandbox extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function index ()
    {
        //$user = $this->userRepository->getByEmailWithEmployee('jgonzalez@creasoftweb.com');
        $user = $this->userRepository->getAll();
        dd($user);
        #echo "Hola Mundo";
        #return true;
    }
}
