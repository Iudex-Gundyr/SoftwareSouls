<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\HerramientaProyecto;

class HerramientaProyectoController extends Controller
{
    public function subirHerramientaProyecto(Request $request, $id_publicacion){
        $request->validate([
            'herramienta' => 'required',
        ]);
        HerramientaProyecto::create([
            'ID_Herramientas' => $request->herramienta,
            'ID_Publicacion' => $id_publicacion,
        ]);

        return redirect()->route('ModificarProyecto', ['id' => $id_publicacion])->with('status', 'Adjuntado exitosamente');
    }
    public function eliminarHerramientaPublicacion($id){
        HerramientaProyecto::destroy($id);

        return redirect()->back()->with('status', 'Herramienta eliminada exitosamente');

    }
}
