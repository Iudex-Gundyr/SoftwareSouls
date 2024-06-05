<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Models\Proyecto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\Herramientas;
use App\Models\HerramientaProyecto;
use Illuminate\Support\Facades\Storage;
class ProyectoController extends Controller
{
    public function crearProyecto(Request $request){
        $request->validate([
            'NombreP' => 'required|string|max:255',
            'DescripcionP' => 'required|string',
            'Enlace_P' => 'required|string',
        ]);

        // Guarda la imagen en el directorio de almacenamiento y obtén su ruta
        // Crea un nuevo proyecto y guarda la ruta de la imagen en la base de datos
        $proyecto = new Proyecto;
        $proyecto->NombreP = $request->NombreP;
        $proyecto->DescripcionP = $request->DescripcionP;
        $proyecto->Enlace_P = $request->Enlace_P;
         // Guarda la ruta de la imagen en la base de datos
        $proyecto->save();

        // Redirecciona a la página de proyectos con un mensaje de éxito
        return redirect('/Proyectos')->with('status', 'Registro exitoso');
    }
    public function listarProyectos(){
        $proyectos = Proyecto::all();

        return view('Administrador/CRUD/Proyectos/Proyectos', compact('proyectos'));
    }
    public function mostrarFormularioModificar($id){
        if (request()->isMethod('post')) {
            return redirect()->route('ModificarProyecto', ['id' => $id]);
        }
    
        // Obtiene el proyecto por ID o falla si no existe.
        $proyecto = Proyecto::findOrFail($id);
    
        // Obtiene las fotografías asociadas con el proyecto.
        $fotografias = $proyecto->fotosproyecto;
    
        // Obtiene solo las HerramientaProyecto asociadas con este proyecto específico.
        $herramientas = $proyecto->herramientaPublicaciones;
    
        // Obtiene todas las Herramientas disponibles, si es necesario.
        $tools = Herramientas::all();
    
        // Devuelve la vista con las variables compactadas.
        return view('Administrador.CRUD.Proyectos.ModificarProyecto', compact('proyecto', 'fotografias', 'herramientas', 'tools'));
    }
    public function actualizarProyecto(Request $request, $id){
        $proyecto = Proyecto::find($id);

        if (!$proyecto) {
            // Manejo si el proyecto no se encuentra
            abort(404);
        }

        // Define reglas de validación para campos obligatorios
        $rules = [
            'NombreP' => 'required|string|max:255',
            'DescripcionP' => 'required|string',
            'Enlace_P' => 'required|string',
        ];

        // Si se proporcionó una nueva imagen, agrega reglas de validación para 'portada'
        if ($request->hasFile('portada')) {
            $rules['portada'] = 'image|mimes:jpeg,png,jpg,gif|max:2048';
        }
        // Valida los datos del formulario
        $request->validate($rules);

        // Actualiza los datos del proyecto con los nuevos valores del formulario
        $proyecto->update([
            'NombreP' => $request->NombreP,
            'DescripcionP' => $request->DescripcionP,
            'Enlace_P' => $request->Enlace_P,
        ]);


        return redirect()->back()->with('status', 'Proyecto actualizado exitosamente');
    }
    public function eliminarProyecto($id){
        $proyecto = Proyecto::find($id);

        if ($proyecto) {
            try {
                $proyecto->delete();
                return redirect()->route('Proyectos')->with('status', 'Proyecto eliminado exitosamente');
            } catch (\Throwable $th) {
                return redirect()->route('Proyectos')->with('status', 'El proyecto tiene elementos asociados, eliminelos eh intentelo nuevamente');
            }

        } else {
            return redirect()->route('Proyectos')->with('error', 'Proyecto no encontrado');
        }
    }
}
