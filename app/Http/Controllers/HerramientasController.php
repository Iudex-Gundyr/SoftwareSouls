<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Herramientas;
use Illuminate\Support\Facades\Storage;

class HerramientasController extends Controller{
    public function subirHerramienta(Request $request){
        $request->validate([
            'NombreHerramienta' => 'required|string|max:255',
            'DescripcionH' => 'required|string',
            'Fotografia' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ajusta según tus necesidades
        ]);

        $imagen = $request->file('Fotografia');
        $contenidoImagen = file_get_contents($imagen->getRealPath());

        try {
            // Crea la herramienta utilizando un array asociativo con los campos y valores
            $Herramienta = Herramientas::create([
                'NombreHerramienta' => $request->input('NombreHerramienta'),
                'DescripcionH' => $request->input('DescripcionH'),
                'Fotografia' => $contenidoImagen,
            ]);

            return redirect('/Herramientas')->with('status', 'Registro exitoso');
        } catch (\Exception $e) {
            return redirect('/Herramientas')->with('error', 'Error durante el registro: ' . $e->getMessage());
        }
    }
    public function listarHerramientas(Request $request){
        $Herramientas = Herramientas::all();
        return view('Administrador/CRUD/Herramientas/Herramientas', compact('Herramientas'));
    }
    public function eliminarHerramienta($id){

        $herramienta = Herramientas::find($id);
        if ($herramienta) {
            try {
                $herramienta->delete();
                return redirect()->back()->with('status', 'Herramientas eliminado exitosamente');
            } catch (\Throwable $th) {
                return redirect()->back()->with('status', 'La herramienta se esta utilizando en algún proyecto, quitela de todos los proyectos y vuelva a intentarlo');
            }

        } else {
            return redirect()->back()->with('error', 'Herramientas no encontrado');

        }
    }
    public function modificarHerramienta($id){
        $herramienta = Herramientas::find($id);
        return view('Administrador/CRUD/Herramientas/modificarHerramienta', compact('herramienta'));
    }
    public function actualizarHerramienta(Request $request, $id){
        $herramienta = Herramientas::find($id);

        $request->validate([
            'NombreHerramienta' => 'required|string|max:255',
            'DescripcionH' => 'required|string',
            'Fotografia' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Puedes quitar 'required'
        ]);

        // Verifica si se proporcionó una nueva imagen
        if ($request->hasFile('Fotografia')) {
            $imagen = $request->file('Fotografia');
            $contenidoImagen = file_get_contents($imagen->getRealPath());
            $herramienta->Fotografia = $contenidoImagen;
        }

        // Actualiza los demás campos
        $herramienta->NombreHerramienta = $request->input('NombreHerramienta');
        $herramienta->DescripcionH = $request->input('DescripcionH');

        // Guarda los cambios en la base de datos
        $herramienta->save();
        return redirect('/Herramientas')->with('status', 'herramienta actualizado exitosamente');
    }
}
