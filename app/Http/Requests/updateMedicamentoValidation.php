<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateMedicamentoValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    { $messages = [
                'required' => 'The :attribute field is requaaaaired.',
            ];
        return [
            $validator = Validator::make($request->all(), [
                'nombre' => 'required|string',
                'cantidad' => 'required|string',
                'aplicacion' => 'required|string',
                'edad_aplicacion' => 'required|numeric',
                'fabricante' => 'required|string',
            ], $messages);
           
            if ($validator->fails())
            {
                $response = array('response' => $validator->$messages, 'success' => false);
                return $response;
            }
            else
            {
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es requerido.',
        ];
    }
}
