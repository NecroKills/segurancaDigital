<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SistemaAtualizarRequest extends FormRequest
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
     *request da pagina atualizar
     * @return array
     */
    public function rules()
    {    
      $req = SistemaAtualizarRequest::all();
        if ($req['email'] == null) {
          return [
            'justificativa' => 'required|max:500',
            'status'     => 'required',
          ];
        }else {
          return [
            'justificativa' => 'required|max:500',
            'status'     => 'required',
            'email'     => 'max:100|email|unique:sistemas,email'

          ];
        }
    }

    public function messages()
    {
      return [
        'justificativa.required' => 'O campo Justificativa é obrigatório.',
        'status.required'     => 'O campo Status é obrigatório.',
        'justificativa.max:50' => 'O campo Justificativa tem limite de 500 caracteres.',
        'email.email'        => 'E-mail inválido.',
          'email.max:100'        => 'O campo E-mail tem limite de 100 caracteres.',
          'email.unique'        => 'E-mail já cadastrado.'
        ];
    }
}
