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
                    'men_nom_controller' => 'sometimes|required',
                    'nome_action' => 'sometimes|required'
                ];
            case 'update': 
                return [
                    'men_nom_menu' => 'required',
                    'men_nom_controller' => 'sometimes|required',
                    'nome_action' => 'required'
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
