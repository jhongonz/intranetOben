<?php

namespace App\Http\Controllers\Webservices\Sustainability;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SendEmailFormcontact extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $validator = \Validator::make($request->all(),[
            'nombre'=>'required',
            'email'=>'required|email:rfc',
            'telefono'=>'telefono',
            'country'=>'country',
            'city'=>'city'
        ]);

        if ($validator->fails()) {
            return response()->json(['status'=>STATUS_FAIL,'msg'=>'Faltan datos requeridos','error'=>$validator->errors()]);
        }

        $contact = new \stdClass();
        $contact->name = $request->nombre;
        $contact->email = $request->email;
        $contact->telefono = $request->telefono;
        $contact->country = $request->country;
        $contact->city = $request->city;

        $html = new \App\Mail\Sustainability\Formcontact($contact);

        try {

            \Mail::to(['jhonnygonzalezf@gmail.com'])->bcc(['jgonzalez@creasoftweb.com'])->send($html);

        } catch (\Exception $e) {

            \Log::error('No se ha enviado el reporte, error '.$e->getCode().' | '.$e->getMessage());
        }
    }
}
