<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class UserRequest extends FormRequest
{
    /**
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
        $currentRoute = explode('.', Route::currentRouteName());

        switch(end($currentRoute)){
            case 'store': 
                return [
                    'usu_nom_usuario' => 'required',
                    'usu_nom_login' => 'required',
                    'grupo_id' => 'required',
                    'ativo' => 'required',
                ];
            case 'update': 
                return [
                    'usu_nom_login' => 'required',
                ];
        }
    }

    public function messages(){
        return [
            'required' => 'Campo obrigatório'
        ];
    }
}
