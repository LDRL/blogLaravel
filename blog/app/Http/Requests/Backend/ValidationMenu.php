<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ValidationMenu extends FormRequest
{
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
            'nombre' => 'required|max:50',
            'url' => 'required|max:100',
            'icono' => 'nullable|max:50'
        ];
    }

    // public function messages(){
    //     return[
    //         'nombre.required' => 'El nombre es requerido',
    //         'url.required' => 'La url es requerido',
    //     ];
    // }
}
