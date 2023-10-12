<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMarca extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //RECUERDA PONER ESTO EN TRUE!!!
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [//Aqui van las validaciones: 
            'descripcion' => 'required|min:3|unique:marcas',
            'activo' => 'required|boolean'
        ];
    }
}

// Comando para crear este request: php artisan make:request UpdateMarca
// Luego en el controlador al request, instanciarlo como una clase de UpdateMarca