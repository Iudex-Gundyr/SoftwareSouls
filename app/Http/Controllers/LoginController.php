<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

    public function StartSession(Request $request, Redirector $redirect){
        $credentials = $request->validate(['email'=>['required','email','string'] , 'password' =>['required','string']]);
        $user = User::where('Correo', $request->email)->first();
        $remember = request()->filled('remember');
        if ($user && $user->Clave === md5($request->password)) {
            Auth::login($user, $remember);
            $request->session()->regenerate();

            return $redirect->intended('/Proyectos')->with('status', 'Sesión iniciada correctamente');
        }
        throw ValidationException::withMessages(['Credenciales incorrectas']);

    }
    public function logout(Request $request, Redirector $redirect){

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return $redirect->intended('/login')->with('status', 'Cerraste Sesión');
    }
    public function registrar(Request $request, Redirector $redirect){
        $request->validate([
            'Nombre' => ['required', 'string', 'max:255'],
            'Correo' => ['required', 'string', 'email', 'max:255', 'unique:usuario'],
            'Clave' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        try {
            User::create([
                'Nombre' => $request->Nombre,
                'Correo' => $request->Correo,
                'Clave' => md5($request->Clave),
            ]);
            return redirect('/Usuarios')->with('status', 'Registro exitoso');
        } catch (\Exception $e) {
            //return redirect('/Usuarios')->with('error', 'Error durante el registro: ' . $e->getMessage());
            throw $e; // Propaga la excepción para visualizar el mensaje de error completo
        }

    }
    public function listarusuarios(){
        $users = User::all();

        return view('Administrador/CRUD/Usuario/Usuario', compact('users'));
    }
    public function eliminarUsuario($id){
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->route('Usuarios')->with('status', 'Usuario eliminado exitosamente');
        } else {
            return redirect()->route('Usuarios')->with('error', 'Usuario no encontrado');
        }
    }
    public function mostrarFormularioModificar($id) {
        if (request()->isMethod('post')) {
            return redirect()->route('actualizar-usuario', ['id' => $id]);
        }

        $usuario = User::find($id);

        return view('Administrador.CRUD.Usuario.ModificarUsuario', compact('usuario'));
    }
    public function actualizarUsuario(Request $request, $id){
        $usuario = User::find($id);

        if (!$usuario) {
            return redirect()->route('Usuarios')->with('error', 'Usuario no encontrado');
        }

        // Validación de campos
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'Correo' => 'required|string|email|max:255',
            'Clave' => 'nullable|string|min:8|confirmed', // Verifica que 'Clave_confirmation' coincida
        ]);

        // Verifica si se proporcionó una nueva contraseña antes de actualizar
        if ($request->filled('Clave')) {
            $usuario->update([
                'Nombre' => $request->input('Nombre'),
                'Correo' => $request->input('Correo'),
                'Clave' => md5($request->input('Clave')),
            ]);
        } else {
            // Si no se proporciona una nueva contraseña, actualiza sin cambiar la contraseña
            $usuario->update([
                'Nombre' => $request->input('Nombre'),
                'Correo' => $request->input('Correo'),
            ]);
        }

        return redirect()->route('Usuarios')->with('status', 'Usuario actualizado exitosamente');
    }
}
