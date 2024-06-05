<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\FotosProyecto;

class FotosController extends Controller
{
    public function subirImagen(Request $request, $id_publicacion){
        $request->validate([
            'fotografia' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ajusta según tus necesidades
        ]);

        $imagen = $request->file('fotografia');
        $contenidoImagen = file_get_contents($imagen->getRealPath());

        // Crea un nuevo registro en la tabla fotosproyecto
        FotosProyecto::create([
            'fotografia' => $contenidoImagen,
            'ID_Publicacion' => $id_publicacion,
        ]);
        return redirect()->route('ModificarProyecto', ['id' => $id_publicacion])->with('status', 'Adjuntado exitosamente');
    }
    public function eliminarFoto($id){
        try {

            FotosProyecto::destroy($id);

            return redirect()->back()->with('status', 'Foto eliminada exitosamente');
        } catch (\Exception $e) {
            // Captura cualquier excepción y muestra un mensaje de error
            return redirect()->back()->with('error', 'Error al eliminar la foto: ' . $e->getMessage());
        }
    }
}
