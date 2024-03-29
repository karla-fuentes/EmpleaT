<?php

namespace Modules\Usuarios\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{

    public function __construct()
    {
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre'                => 'required',
            'apellido'                => 'required',
            'email'                 => 'required|email|unique:usuarios,email',
            'password'              => [
                'required',
                'confirmed',
                'min:8',
            ],
            'password_confirmation' => [
                'required',
                'same:password',
            ],
            'activo'                => 'nullable',
            'rol'                   => 'nullable',
        ];
    }

}
