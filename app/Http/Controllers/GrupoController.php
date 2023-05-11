<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;

class GrupoController extends Controller
{
    private $grupo;

    public function __construct(Grupo $grupo){
        $this->grupo = $grupo;
    }

    public function index(){
        return view('grupos.index', [
            'dados' =>  $this->grupo->all()
        ]);
    }
}
