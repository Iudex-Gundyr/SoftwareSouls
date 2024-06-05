<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\Item;
use App\Models\Proyecto;
use App\Models\fotosproyecto;
use App\Models\HerramientaProyecto;
use App\Models\Herramientas;

class SoftwareSoulsController extends Controller{
    public function cargarSoftwareSouls()
    {
    return view('Principal.SoftwareSouls');
    }

    public function obtenerProyectos(Request $request){
        $filtro = $request->filtro;
    
        if (trim($filtro) == '') {
            // Si no hay filtro, devuelve los primeros 5 proyectos ordenados por ID_Publicacion descendente
            $proyectos = Proyecto::orderBy('ID_Publicacion', 'desc')
                                 ->take(5)
                                 ->get(['NombreP', 'DescripcionP', 'ID_Publicacion']);
        } else {
            // Si hay filtro, realiza la búsqueda y ordena los resultados
            $proyectos = Proyecto::where('NombreP', 'LIKE', '%' . $filtro . '%')
                                 ->orWhere('DescripcionP', 'LIKE', '%' . $filtro . '%')
                                 ->orderBy('ID_Publicacion', 'desc')
                                 ->get(['NombreP', 'DescripcionP', 'ID_Publicacion']);
        }
    
        // Recortar la DescripcionP a un máximo de 50 caracteres
        foreach ($proyectos as $proyecto) {
            $proyecto->DescripcionP = strlen($proyecto->DescripcionP) > 250 ? substr($proyecto->DescripcionP, 0, 250) . '...' : $proyecto->DescripcionP;
        }
    
        return $proyectos->toArray();
    }
    public function proyecto($id){
        $proyecto = Proyecto::with('fotosproyecto', 'herramientaPublicaciones.Herramientas')->find($id);

        return view('Principal.Proyecto', ['proyecto' => $proyecto]);
    }
};
