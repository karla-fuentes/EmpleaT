<?php

namespace Modules\Usuarios\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Permission as Permiso;

class PermisosController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $permisos = Permiso::all();
        return view('usuarios::permisos.index')->with(compact('permisos'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('usuarios::permisos.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Permiso::insert($request->except('_token','id')+['guard_name' => 'acceso']);
        return redirect()
            ->route('dashboard.permisos.index')
            ->with('alert_success', 'El permiso ha sido creado.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(Permiso $permiso)
    {
        return view('usuarios::permisos.show')->with(compact('permiso'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(Permiso $permiso)
    {
        return view('usuarios::permisos.edit')->with(compact('permiso'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, Permiso $permiso)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data   = $request->except('_method','_token','id');
        $permiso->update($data);
        return redirect()
            ->route('dashboard.permisos.index')
            ->with('alert_success', 'El permiso ha sido actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(Permiso $permiso)
    {
        $permiso->delete();

        return redirect()
            ->back()
            ->with('alert_success', 'El permiso ha sido eliminado.');
    }
}
