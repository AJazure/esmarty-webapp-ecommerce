<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
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
            'codigo_producto' => 'numeric|nullable|max:20',
            'nombre' => 'required|max:40|unique:productos',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock_disponible' => 'nullable|numeric|min:0',
            'stock_deseado' => 'nullable|numeric|min:0',
            'stock_minimo' => 'nullable|numeric|min:0',
            'activo' => 'required|boolean'
        ];
    
        if ($this->isMethod('post')) { // para el método store
            /* $rules['descripcion'] = 'required|min:3|max:40|unique:proveedores'; */
            $rules['nombre'] = 'required|max:40|unique:productos';
        } else if ($this->isMethod('put')) { // para el método update
            $productoId = $this->route('producto');
            $rules['nombre'] = [
                'required',
                'max:40',
                Rule::unique('productos')->ignore($productoId),
            ];
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
