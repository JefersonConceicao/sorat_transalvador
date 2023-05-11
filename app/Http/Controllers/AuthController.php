<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function authenticate(AuthRequest $request){

        $credentials = $request->only(['login', 'senha']);
    
        $user = $this->user->where([
            'usu_nom_login' => $credentials['login'],
            'usu_num_senha' => md5($credentials['senha'])
        ])
        ->first();

        if($user){
            Auth::login($user);
            return redirect()->route('home.index'); 
        }

        return redirect()
            ->back()
            ->withInput()
            ->withErrors([
                'credenciais_incorretas' => 'Login ou senha incorretos'
            ]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
