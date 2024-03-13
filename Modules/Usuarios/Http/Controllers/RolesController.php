<?php

namespace Modules\Usuarios\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('usuarios::roles.index')->with(compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('usuarios::roles.create');
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
        Role::insert($request->except('_token','id')+['guard_name' => 'acceso']);
        return redirect()
            ->route('dashboard.roles.index')
            ->with('alert_success', 'El rol ha sido creado.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(Role $rol)
    {
        return view('usuarios::roles.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(Role $rol)
    {
        return view('usuarios::roles.edit')->with(compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, Role $rol)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data   = $request->except('_method','_token','id');
        $rol->update($data);
        return redirect()
            ->route('dashboard.roles.index')
            ->with('alert_success', 'El rol ha sido actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(Role $rol)
    {
        $rol->delete();

        return redirect()
            ->back()
            ->with('alert_success', 'El rol ha sido eliminado.');
    }
}
