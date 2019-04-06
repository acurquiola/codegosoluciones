<?php

namespace App\Http\Controllers;

use App\Correo;
use Illuminate\Http\Request;
use App\Http\Requests\CorreoRequest;

class CorreoController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CorreoRequest $request)
    {
        $correo = Correo::create(['email' => $request->email]);

        return response()->json(['status' => '1', 'text' => 'Email registrado exitósamente']);
    }

    
}
