<?php
namespace App\Http\Controllers;
use Mail; 
use App\Mail\Contacto; 
use Illuminate\Http\Request;
use App\Rules\ValidRecaptcha;


class ContactoController extends Controller
{
    /**
    * Validamos y enviamos los datos a la clase Contacto
    **/
    public function enviar(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|string|email|max:255',
            'message' => 'required',
            'g-recaptcha-response' => ['required', new ValidRecaptcha]
        ]);

        $forminput = [
            'nombre'  => $request->input('name'),
            'email'   => $request->input('email'),
            'asunto'  => $request->input('subject'),
            'mensaje' => $request->input('message')
        ];

        $envio = Mail::to('info@codego-soluciones.com')->send(new Contacto($forminput));

        if(!$envio)
            return response()->json(['status' => '1', 'text' => 'Mensaje enviado exitósamente']);
        else
            return response()->json(['status' => '0', 'text' => 'Ocurrió un error enviando el mensaje']);
       
    }
}