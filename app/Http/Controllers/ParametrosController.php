<?php

namespace App\Http\Controllers;

use App\Models\Parametro;
use Illuminate\Http\Request;
use App\Http\Requests\ParametrosRequest;

class ParametrosController extends Controller
{
    private $parametro; 

    public function __construct(Parametro $parametro){
        $this->parametro = $parametro;
    }
 
    /**
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        session()->flashInput($request->all());
        $dados = $this->parametro->getParametros($request->all());

        return view('parametros.index', [
            'dados' => $dados
        ]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parametros.create');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParametrosRequest $request)
    {
        $saveParametro = $this->parametro->cadastrarParametros($request->all());

        if($saveParametro){
            return redirect()->route('parametros.index')->with([
                'success' => 'Cadastro realizado com sucesso!'
            ]);
        }

        return redirect()->back()->withInput()->with([
            'error' => 'Não foi possível cadastrar o parametro'
        ]);
    }

    /**

     * @param  \App\Models\Parametro  $parametro
     * @return \Illuminate\Http\Response
     */
    public function edit(Parametro $parametro)
    {
        return view('parametros.edit', ['dadosParametro' => $parametro ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parametro  $parametro
     * @return \Illuminate\Http\Response
     */
    public function update(Parametro $parametro, ParametrosRequest $request)
    {
        $updateParametro = $this->parametro->updateParametros($parametro, $request->all());

        if($updateParametro){
            return redirect()->route('parametros.index')->with([
                'success' => 'Registro atualizado com sucesso!'
            ]);
        }

        return redirect()->back()->withInput()->with([
            'error' => 'Não foi possível atualizar o parametro'
        ]);

    }

    /**
     * @param  \App\Models\Parametro  $parametro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parametro $parametro)
    {
        //
    }
}
