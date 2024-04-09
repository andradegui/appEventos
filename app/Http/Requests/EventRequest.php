<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'title' => 'required|min:5',
            'description' => 'required',
            'body' => 'required',
            'start_event' => 'required',
            
        ];
    }

    public function messages()
    {
        return [
          
            'title.required' => 'O campo nome do evento é obrigatório',
            'required' => 'Este campo é obrigatório',
            'min' => 'Este campo não atinge o mínimo de caracteres permitidos. Tamanho mínimo permitido é :min',
            
        ];
    }

    
}
