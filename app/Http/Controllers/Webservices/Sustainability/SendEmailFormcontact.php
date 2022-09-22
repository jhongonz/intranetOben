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
            'country'=>'required',
            'city'=>'required',
            'message'=>'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['status'=>STATUS_FAIL,'msg'=>'Faltan datos requeridos','error'=>$validator->errors()]);
        }

        $contact = new \stdClass();
        $contact->name = $request->nombre;
        $contact->email = $request->email;
        $contact->country = $request->country;
        $contact->city = $request->city;
        $contact->message = $request->message;

        $html = new \App\Mail\Sustainability\Formcontact($contact);
        try {

            \Mail::to(['sostenibilidad@obengroup.com', 'mylenejansen@obengroup.com', 'maritamendoza@obengroup.com'])->send($html);

            return response()->json(['status'=>WS_STATUS_OK,'msg'=>'Correo enviado con exito']);

        } catch (\Exception $e) {

            return response()->json(['status'=>WS_STATUS_FAIL,'msg'=>'No se ha podido enviar el correo']);

            \Log::error('No se ha enviado el reporte, error '.$e->getCode().' | '.$e->getMessage());
        }
    }
}
