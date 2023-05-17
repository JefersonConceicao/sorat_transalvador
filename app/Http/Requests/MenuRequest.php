<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class MenuRequest extends FormRequest
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
    public function rules(): array
    {   
        $currentRoute = explode('.', Route::currentRouteName());

        switch(end($currentRoute)){
            case 'store': 
                return [
                    'men_nom_menu' => 'required',
                    'controller_id' => 'required',
                    'nome_action' => 'required'
                ];
            case 'update': 
                return [
                    'gru_nom_grupo' => 'required',
                ];
        }
    }

    public function messages(): array
    {   
        return [
            'required' => 'Campo obrigatório'
        ];
    }
}
