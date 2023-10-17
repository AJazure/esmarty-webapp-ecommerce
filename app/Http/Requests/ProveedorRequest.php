<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Proveedor;

class ProveedorRequest extends FormRequest
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
            'razon_social' => 'min:3|max:30',
            'direccion' => 'min:3|max:40',
            'telefono' => 'min:3|max:20',
            'activo' => 'required|boolean'
        ];
    
        if ($this->isMethod('post')) { // para el método store
            $rules['descripcion'] = 'required|min:3|max:40|unique:proveedores';
            $rules['correo'] = 'nullable|email|max:30|unique:proveedores';
            $rules['cuit'] = 'max:20|unique:proveedores';
        } else if ($this->isMethod('put')) { // para el método update
            $rules['descripcion'] = 'required|min:3|max:40';
            $rules['correo'] = 'nullable|email|max:30';
            $rules['cuit'] = 'max:20';
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
