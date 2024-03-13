<?php

namespace Modules\Usuarios\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Usuarios\Entities\Usuario;
use Modules\Usuarios\Http\Requests\UserStoreRequest;
use Modules\Usuarios\Http\Requests\UserUpdateRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios::usuarios.index')->with(compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $roles = Role::orderBy('name','asc');
        $permisos = Permission::orderBy('id','asc');
        return view('usuarios::usuarios.create')->with(compact('roles','permisos'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(UserStoreRequest $request)
    {
        $usuario = Usuario::create($request->except('_token','password_confirmation','id','rol','permisos'));
        $usuario->assignRole($request->rol);
        $usuario->givePermissionTo($request->permisos);
        return redirect()
            ->route('dashboard.usuarios.index')
            ->with('alert_success', 'El usuario ha sido creado.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(Usuario $usuario)
    {
        return view('usuarios::usuarios.show')->with(compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(Usuario $usuario)
    {
        $roles = Role::orderBy('name','asc');
        $permisos = Permission::orderBy('id','asc');
        return view('usuarios::usuarios.edit')->with(compact('usuario','roles','permisos'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UserUpdateRequest $request, Usuario $usuario)
    {
        if (empty($request->password) ) {
            $data   = $request->except('_method','_token','id','password','password_confirmation','rol','permisos');
        } else {
            $data   = $request->except('_method','_token','id','password_confirmation','rol','permisos');
        }
        $usuario->update($data);
        $usuario->syncRoles($request->rol);
        $usuario->syncPermissions($request->permisos);
        return redirect()
            ->route('dashboard.usuarios.index')
            ->with('alert_success', 'El usuario ha sido actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();

        return redirect()
            ->back()
            ->with('alert_success', 'El usuario ha sido eliminado.');
    }

    public function usuariosList(Request $request){
        $usuario = Auth::user();
        $usuarios = Usuario::selectRaw("concat(usuarios.nombre, ' ', usuarios.apellido) as nombre")
        ->addSelect('usuarios.email')
        ->addSelect('usuarios.id')
        ->addSelect('usuarios.activo')
        ->addSelect('usuarios.logged_at');
        $usuarios = $usuarios->get();
        return DataTables::of($usuarios)
        ->addColumn('action', function($data) use($usuario){
            $button = '<a class="btn btn-primary btn-sm" href="'.route('dashboard.usuarios.show',$data->id).'"><i class="fas fa-eye"></i></a>';
            if($usuario->hasPermissionTo('Editar Usuarios') || $usuario->hasRole('Super Admin')){
                $button .= '<a class="btn btn-info btn-sm" href="'.route('dashboard.usuarios.edit',$data->id).'"><i class="fas fa-pencil-alt"></i></a>';
            }
            if($usuario->hasPermissionTo('Eliminar Usuarios') || $usuario->hasRole('Super Admin')){
                $button .= '<a class="btn btn-danger btn-sm" href="#"   data-toggle="modal" data-target="#lote-destroy-'.$data->id.'"><i class="fas fa-trash"></i></a>';
            }
            return $button;
        })
        ->addColumn('estado', function($data){
            $html = ($data->activo) ? '<span class="badge badge-success">Si</span>':'<span class="badge badge-danger">No</span>';
            return $html;
        })
        ->rawColumns(['action','estado'])
        ->make(true);
    }
}
