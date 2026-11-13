<?php

namespace App\Http\Requests;

use App\Models\Aprendiz;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateAprendizRequest extends FormRequest
{
    public function authorize(): bool
    {
        // La autorización por roles se implementará
        // en una actividad posterior.
        return true;
    }

    public function rules(): array
    {
        // Obtenemos el aprendiz de la ruta cuando
        // estamos realizando una actualización.
        $aprendiz = $this->route('aprendiz');

        // Definimos las reglas de unicidad.
        $documentoUnico = Rule::unique(
            'aprendices',
            'documento'
        );

        $correoUnico = Rule::unique(
            'aprendices',
            'correo'
        );

        // Si estamos editando un registro, ignoramos
        // su propio ID en las validaciones UNIQUE.
        if ($aprendiz instanceof Aprendiz) {
            $documentoUnico->ignore($aprendiz->getKey());

            $correoUnico->ignore($aprendiz->getKey());
        }

        return [

            'nombre' => [
                'required',
                'string',
                'max:120',
            ],

            'documento' => [
                'required',
                'string',
                'max:40',
                $documentoUnico,
            ],

            'correo' => [
                'required',
                'string',
                'email',
                'max:120',
                $correoUnico,
            ],

            'ficha_id' => [
                'nullable',
                'integer',
                'min:1',
            ],

        ];
    }

    public function messages(): array
    {
        return [

            'nombre.required' =>
                'El nombre es obligatorio.',

            'nombre.string' =>
                'El nombre debe ser texto.',

            'nombre.max' =>
                'El nombre no puede superar 120 caracteres.',

            'documento.required' =>
                'El documento es obligatorio.',

            'documento.string' =>
                'El documento debe ser texto.',

            'documento.max' =>
                'El documento no puede superar 40 caracteres.',

            'documento.unique' =>
                'El documento ya existe.',

            'correo.required' =>
                'El correo es obligatorio.',

            'correo.string' =>
                'El correo debe ser texto.',

            'correo.email' =>
                'El correo electrónico no es válido.',

            'correo.max' =>
                'El correo no puede superar 120 caracteres.',

            'correo.unique' =>
                'El correo ya existe.',

            'ficha_id.integer' =>
                'La ficha debe ser un número entero.',

            'ficha_id.min' =>
                'La ficha debe ser mayor que cero.',

        ];
    }
}