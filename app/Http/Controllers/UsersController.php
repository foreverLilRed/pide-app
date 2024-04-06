<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Grupo;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(15);

        return view('crud.lista', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $grupos = Grupo::all();
        return view('crud.editar', compact('user','grupos'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->dni = $request->input('dni');
        $user->password = $request->input('password');
        $user->estado = $request->input('estado');
        $user->group_id = $request->input('grupo');
        $user->level = $request->input('level');

        $user->save();

        return redirect()->route('listar');
        
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('listar')->with('success', 'Usuario eliminado exitosamente');
    }

    public function add(){
        return view('crud.agregar');
    }

    public function store(Request $request)
    {

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->dni = $request->input('dni');
        $user->estado = $request->input('estado');
        $user->password = bcrypt($request->input('password'));
        $user->level = $request->input('nivel');

        $user->save();

        return redirect()->route('listar')->with('success', 'Usuario agregado exitosamente.');
    }

    public function busqueda($nombre)
    {

        $users = User::where('name', 'LIKE', '%' . $nombre . '%')
                    ->orWhere('email', 'LIKE', '%' . $nombre . '%')
                    ->get();
        return response()->json(['users' => $users]);
    }


    public function UsuariosJSON(){
        $todosUsuarios = User::whereNull('group_id')->get();
        return response()->json(['todosUsuarios' => $todosUsuarios]);
    }

    public function dataJSON(){
        $todosUsuarios = User::all();
        return response()->json(['todosUsuarios' => $todosUsuarios]);
    }

    public function BusquedaJSON($busqueda){
        $usuariosFiltrados = User::where('name', 'like', '%' . $busqueda . '%')->get();

        return response()->json(['usuariosFiltrados' => $usuariosFiltrados]);

    }

}
