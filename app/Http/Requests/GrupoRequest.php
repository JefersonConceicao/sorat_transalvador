<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class GrupoRequest extends FormRequest
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
                    'gru_nom_grupo' => 'required',
                ];
            case 'update': 
                return [
                    'gru_nom_grupo' => 'required',
                ];
        }
    }

    public function messages(){
        return [
            'required' => 'Campo obrigatório'
        ];
    }
}
