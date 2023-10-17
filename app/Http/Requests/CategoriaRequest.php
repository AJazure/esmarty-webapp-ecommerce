<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {

        $rules = [
            'descripcion' => 'required|min:3|max:20|unique:marcas',
            'activo' => 'required|boolean'
        ];

        if ($this->isMethod('post')) { //para el método store
        } else if ($this->isMethod('put')) { //para el método update
        }
        return $rules;
    }
    public function messages(): array
    {
        // Definir mensajes de error personalizados
        return [
            
        ];
    }
}
