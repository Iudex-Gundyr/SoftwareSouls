<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        try {
            // Agregar registros de depuración para verificar los datos del formulario
            \Log::info('Datos del formulario:', [
                'nombre' => $request->nombre,
                'correo' => $request->correo,
                'mensaje' => $request->mensaje
            ]);

            $data = [
                'nombre' => $request->nombre,
                'correo' => $request->correo,
                'mensaje' => $request->mensaje
            ];

            // Envía el correo electrónico solo a tu dirección de correo electrónico
            Mail::to('paginaweb@softwaresouls.cl')->send(new ContactFormMail($data));

            return response()->json(['message' => 'Correo enviado correctamente']);
        } catch (\Exception $e) {
            \Log::error('Error al enviar el correo: ' . $e->getMessage());
            return response()->json(['error' => 'Error al enviar el correo'], 500);
        }
    }

}
