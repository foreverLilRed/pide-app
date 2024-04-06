<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\Permiso;
use App\Models\registro;
use App\Models\User;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class GruposController extends Controller
{
    public function index(){
        $grupos = Grupo::all();
        return view('grupos',compact('grupos'));
    }

    public function destroy($id)
    {
        $grupo = Grupo::findOrFail($id);
        $grupo->delete();

        return redirect()->route('grupos')->with('success', 'Grupo eliminado exitosamente');
    }

    public function buscar(Request $request)
    {
        $valor = $request->input('valor');

        $datos = Grupo::where('id', $valor)->get();

        return response()->json($datos);
    }

    public function store(Request $request)
    {

        $grupo = Grupo::create([
            'nombre' => $request->input('nombre'),
        ]);

        $permisosMarcados = $request->input('permisos', []);

        foreach ($permisosMarcados as $permiso) {
            Permiso::create([
                'group_id' => $grupo->id,
                'servicio' => $permiso,
            ]);
        }

        return redirect()->route('grupos');
    }

    public function obtenerUsuariosYPermisos($id)
    {
        $grupo = Grupo::find($id);

        if ($grupo) {
            $usuarios = $grupo->usuarios;
            $permisos = $grupo->permisos;
            return response()->json(['usuarios' => $usuarios, 'permisos' => $permisos]);
        } else {
            return response()->json(['error' => 'Grupo no encontrado'], 404);
        }
    }

    public function editar(Request $request){
        $valorSeleccionado = $request->input('valorSeleccionado');
        
        $permisosSeleccionados = json_decode($request->input('permisosSeleccionados'),true);
        $permisos = Permiso::where('group_id', $valorSeleccionado);
        $permisos->delete();

        //Aca se agregan los permisos
        foreach($permisosSeleccionados as $permiso){
            $new_permiso = new Permiso();
            $new_permiso->group_id = $valorSeleccionado;
            $new_permiso->servicio = $permiso;
            $new_permiso->save();
        }

        $miembrosSeleccionados = json_decode($request->input('miembrosSeleccionados'), true);

        $miembrosActuales = User::where('group_id', $valorSeleccionado)->pluck('id')->toArray();

        $usuariosEliminados = array_diff($miembrosActuales, $miembrosSeleccionados);
        User::whereIn('id', $usuariosEliminados)->update(['group_id' => null]);

        foreach($miembrosSeleccionados as $miembro){
            $usuario = User::findOrFail($miembro);

            $usuario->group_id = $valorSeleccionado;

            $usuario->save();
        }

        return redirect()->route('grupos');

    }

    public function estadisticas(){
        $chart_options = [
            'chart_title' => 'Consultas Totales por Usuario',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\registro',
            'group_by_field' => 'usuario',
            'chart_type' => 'bar',
        ];
        $chart = new LaravelChart($chart_options);
        
        $chart_options2 = [
            'chart_title' => 'Consultas por Servicio',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\registro',
            'group_by_field' => 'servicio',
            'chart_type' => 'bar',
        ];
        $chart2 = new LaravelChart($chart_options2);

        $chart_options3 = [
            'chart_title' => 'Consultas de hoy',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\registro',
            'group_by_field' => 'servicio',
            'chart_type' => 'bar',
            'filter_field' => 'created_at',
            'filter_days' => 2,
            'continuous_time' => true, 
        ];
        $chart3 = new LaravelChart($chart_options3);

        return view('estadisticas', compact('chart','chart2','chart3'));
    }
}
