<?php

namespace Modules\Configuraciones\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Configuraciones\Entities\Dropdown;
use Yajra\DataTables\DataTables;

class DropdownsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('configuraciones::dropdowns.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('configuraciones::dropdowns.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'value'         => 'required',
            'key'           => 'nullable',
            'description'   => 'nullable',
        ],[
            'value.required' => 'El Nombre es requerido'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('alert_error', $validator->messages()->first())->withInput();
        }

        Dropdown::create($request->except('_token'));
        return redirect()
            ->back()
            ->with('alert_success', 'El Dropdown ha sido creado.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(Dropdown $dropdown)
    {
        return view('configuraciones::dropdowns.show')->with(compact('dropdown'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(Dropdown $dropdown)
    {
        return view('configuraciones::dropdowns.edit')->with(compact('dropdown'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, Dropdown $dropdown)
    {
        $validator = Validator::make($request->all(), [
            'value'         => 'required',
            'key'           => 'nullable',
            'description'   => 'nullable',
        ],[
            'value.required' => 'El Nombre es requerido'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('alert_error', $validator->messages()->first())->withInput();
        }
        $dropdown->update($request->except('_token','_method'));
        return redirect()
            ->back()
            ->with('alert_success', 'El Dropdown ha sido editado.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(Dropdown $dropdown)
    {
        $dropdown->delete();
        return redirect()
            ->back()
            ->with('alert_success', 'El Dropdown ha sido eliminado.');
    }

    public function dropdownsList(Request $request){
        $usuario = Auth::user();
        $dropdowns = Dropdown::select('dropdowns.*')->whereNull('parent_id');
        $dropdowns = $dropdowns->get();
        return DataTables::of($dropdowns)
        ->addColumn('action', function($dropdown) use($usuario){
            $button = '<a class="btn btn-primary btn-sm" href="'.route('admin.dropdowns.show',$dropdown->id).'"><i class="fas fa-eye"></i></a>';
            if($usuario->hasPermissionTo('Editar Dropdowns') || $usuario->hasRole('Super Admin')){
                $button .= '<a class="btn btn-info btn-sm"  href=\'javascript:editarDropdown('.$dropdown->id.',"'.$dropdown->value.'","'.$dropdown->description.'")\'><i class="fas fa-pencil-alt"></i></a>';
            }
            if($usuario->hasPermissionTo('Eliminar Dropdowns') || $usuario->hasRole('Super Admin')){
                $button .= '<a class="btn btn-danger btn-sm" href=\'javascript:borrarDropdown('.$dropdown->id.',"'.$dropdown->value.'")\' ><i class="fas fa-trash"></i></a>';
            }
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function getChilds(Request $request)
    {
        $parent = Dropdown::find($request->parent_id);
        if($parent == null){
            return response()->json(['error' => true, 'data' => array() ],404);
        }
        $hijos = array();
        foreach ($parent->hijos()->get() as $key => $hijo) {
            $hijos[] = array('key' => $hijo->id, 'value' => $hijo->value, 'selected' => (($request->selected == $hijo->id)?true:false));
        }
        return response()->json(['error' => false, 'data' => $hijos ],200);
    }
}
