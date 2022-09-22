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

    public function index()
    {
        $contact = new \stdClass();
        $contact->name = 'test';
        $contact->email = 'algo@algo.com';
        $contact->message = 'asdasd';
        $contact->country = 'asdasd';
        $contact->city = 'sfsdf';

        $html = new \App\Mail\Sustainability\Formcontact($contact);
        print_r($html->render());
        exit();
        try {

            \Mail::to(['jhonnygonzalezf@gmail.com'])->bcc(['jgonzalez@creasoftweb.com'])->send($html);

        } catch (\Exception $e) {

            \Log::error('No se ha enviado el reporte, error '.$e->getCode().' | '.$e->getMessage());
        }
    }

    public function __index()
    {
        //$user = $this->userRepository->getByEmailWithEmployee('jgonzalez@creasoftweb.com');
        $user = $this->userRepository->getAll();
        dd($user);
        #echo "Hola Mundo";
        #return true;
    }
}
