<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
{
    function attributes(){
        return [
            'name'     => 'Nombre del usuario',
            'email'     => 'Email del usuario',
        ];
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'     => 'required|string|max:80|min:2',
            'email' => 'required|email',
        ];
    }
    
    function messages() {
        $required = 'El campo :attribute es obligatorio.';
        $string   = 'El campo :attribute tiene que ser una cadena de caracteres.';
        $max      = 'La longitud máxima del campo :attribute es :max';
        $min      = 'El valor mínimo del campo :attribute es :min';
        $email       = 'Pon una sintaxis de correo válida';
        $unique     = 'Ese correo ya esta registrado';
        
        return [
            'name.required'      => $required,
            'name.string'        => $string,
            'name.max'           => $max,
            'name.min'           => $min,
            'email.required'      => $required,
            'email.email'      =>       $email,
        ];
    }
}
