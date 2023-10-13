<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProveedor extends FormRequest
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
        return [
            'descripcion' => 'required|min:3|max:40|unique:proveedores',
            'cuit' => 'max:20|unique:proveedores',
            'razon_social' => 'max:30',
            'direccion' => 'max:40',
            'telefono' => 'max:20',
            'correo' => 'email|max:30|unique:proveedores',
            'activo' => 'required|boolean'
        ];
    }

    public function messages(): array
    {
        // Definir mensajes de error personalizados
        return [
            'descripcion.unique' => 'Ya existe otro proveedor registrado con ese nombre.',
            'cuit.unique' => 'Ya existe otro proveedor registrado con ese CUIT.',
        ];
    }
}
