<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Http\Requests\GrupoRequest;
use Exception;

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

    public function create(){
        return view('grupos.create');
    }

    public function store(GrupoRequest $request){
        try{

            $grupo = $this->grupo;

            $grupo->gru_nom_grupo = $request->gru_nom_grupo;
            $grupo->gru_url_padrao = $request->gru_url_padrao;
            $grupo->gru_id_csi = 1;

            if(!$grupo->save()){
                throw new Exception;
            }

            return redirect()->route('grupos.index')->with(['success' => 'Cadastro realizado com sucesso!']);

        }catch(Exception $error){
        
            return 
                redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => $error->getMessage()
                ]);
        }
    }
}
