<?php

namespace App\Http\Requests\contratosclientes;

use Illuminate\Foundation\Http\FormRequest;

class contratoclientestore extends FormRequest
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
            // esto retorna al formulario 
           'direccion'=>'required','cdaorecinto'=>'required',
           'sector'=>'required','tipodevivienda'=>'required',
              'contacto'=>'required',
              'cclicontratotipocliente_id'=>'required',
              'canton_id'=>'required','cliente_id'=>'required',
              'tarifa'=>'required',
              'contratocodigo'=>'required',
              'documentocodigo'=>'required',
             
              'anchodebanda'=>'required',
              'comportacion'=>'required',
              'modalidadequipo'=>'required',
               
          ];
    }
}
