<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewCreateRequest extends FormRequest
{
    
    function attributes(){
        return [
            'nombre'     => 'Nombre de la review',
            'tipo'     => 'tipo de la review',
            'review'     => 'descripcion de la review',
            'thumbnail'     => 'Portada de la review',
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
            'nombre'     => 'required|string|max:80|min:2',
            'tipo' => 'required|in:film,record,book',
            'review'     => 'required|string',
            'thumbnail'     => 'required',
        ];
    }
    
    function messages() {
        $required = 'El campo :attribute es obligatorio.';
        $string   = 'El campo :attribute tiene que ser una cadena de caracteres.';
        $max      = 'La longitud máxima del campo :attribute es :max';
        $min      = 'El valor mínimo del campo :attribute es :min';
        $tipo       = 'You need to choose on of this :attribute';
        
        return [
            'nombre.required'      => $required,
            'nombre.string'        => $string,
            'nombre.max'           => $max,
            'nombre.min'           => $min,
            'tipo.required'      => $required,
            'tipo.in'      =>       $tipo,
            'review.required'      => $required,
            'review.string'      =>       $string,
            'thumbnail.required'      => $required,
        ];
    }
}
