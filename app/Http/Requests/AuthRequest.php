<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class AuthRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
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
            case 'authenticate': 
                return [
                    'login' => 'required',
                    'senha' => 'required'
                ];
            case 'update': 
                return [

                ];
        }
    }

    public function messages(): array {
        return [
            'required' => 'Campo obrigatório'
        ];
    }   
}
