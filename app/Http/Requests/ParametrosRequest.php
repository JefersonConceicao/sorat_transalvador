<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class ParametrosRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        $currentRoute = explode('.', Route::currentRouteName());

        switch(end($currentRoute)){
            case 'store': 
                return [
                    'par_nom_parametro' => 'required',
                    'par_des_retorno' => 'required'
                ];
            case 'update':
                return [
                    'par_nom_parametro' => 'required',
                    'par_des_retorno' => 'required'
                ]; 
        }
    }

    public function messages():array{
        return [
            'required' => 'Campo obrigatório'
        ];
    }
}
