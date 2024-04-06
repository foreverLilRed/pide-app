<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Permiso;

class Pnp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $group_id = auth()->user()->group_id;
        $permisoReniec = Permiso::where('group_id', $group_id)
                            ->where('servicio', 'pnp')
                            ->first();

        // Verifica si el usuario tiene el permiso específico
        if ($permisoReniec) {
            return $next($request);
        }else {
            return redirect()->back()->with("mensaje", "No puedes acceder al módulo seleccionado");
        }
    }
}
