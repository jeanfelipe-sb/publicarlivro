<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class AlterarSenhaClienteRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'password' => 'required|min:6|confirmed',
        ];
    }

    public function messages() {
        return [
            'password.required' => 'O campo senha é de preenchimento obrigatório!',
            'password.min' => 'O campo senha é necessário minido de 6 caracteres ',
            'password.confirmed' => 'As senhas não conferem',
        ];
    }

}
