<?php

namespace Modules\Usuarios\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'email'                 => 'required|email|unique:usuarios,email,' . $this->id,
            'password'              => [
                'nullable',
                'confirmed',
                'min:8',
            ],
            'password_confirmation' => [
                'nullable',
                'same:password',
            ],
            'activo'                => 'nullable',
            'rol'                   => 'nullable',
        ];
    }

}
