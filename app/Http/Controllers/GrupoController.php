<?php

namespace App\Http\Controllers;

use App\Http\Requests\GrupoRequest;
use App\Models\Grupo;
use App\Models\Menu;

use Illuminate\Http\Request;
use Exception;

class GrupoController extends Controller
{
    private $grupo;
    private $Menu;
    
    public function __construct(Grupo $grupo, Menu $menu)
    {
        $this->grupo = $grupo;
        $this->Menu = $menu;
    }

    public function index(Request $request)
    {
        session()->flashInput($request->input());

        $dados = $this->grupo->getGrupos($request->all())->get();

        return view('grupos.index', [
            'dados' => $dados
        ]);
    }

    public function create()
    {
        return view('grupos.create');
    }

    public function store(GrupoRequest $request)
    {
        try {
            $grupo = $this->grupo;

            $grupo->gru_nom_grupo = $request->gru_nom_grupo;
            $grupo->gru_url_padrao = $request->gru_url_padrao;
            $grupo->gru_id_csi = 1;

            if (!$grupo->save()) {
                throw new Exception;
            }

            return
                redirect()
                ->route('grupos.index')
                ->with(['success' => 'Cadastro realizado com sucesso!']);

        } catch (Exception $error) {

            return
                redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => $error->getMessage()
                ]);
        }
    }

    public function edit(Grupo $grupo)
    {
        return view('grupos.edit', ['grupo' => $grupo]);
    }

    public function update(Grupo $grupo, GrupoRequest $request)
    {
        try {
            $grupo->gru_nom_grupo = $request->gru_nom_grupo;
            $grupo->gru_url_padrao = $request->gru_url_padrao;

            if (!$grupo->save()) {
                throw new Exception;
            }

            return redirect()->route('grupos.index')->with(['success' => 'Registro atualizado com sucesso!']);

        } catch (Exception $error) {

            return redirect()->back()->withInput()->with([
                'error' => $error->getMessage()
            ]);
        }
    }

    public function destroy(Grupo $grupo){

        if($grupo->delete()){
            return redirect()->route('grupos.index')->with(['success' => 'Registro excluído com sucesso!']);
        }

        return redirect()->back()->with([
            'error' => 'Não foi possível excluír o registro, pois o mesmo pode está sendo utilizado'
        ]);
    } 

    public function viewAssociarMenus(Grupo $grupo, Request $request)
    {
        session()->flashInput($request->all());

        $menusDesassociados = $this->Menu->getMenusDesassociados($request->all());
        $idsMenusAssociados = $this->Menu->getIdsMenusAssociados($grupo->gru_id_gru);

        $optionsController = $this->Menu->getControllersRoute();

        return view('grupos.associar_menus', [
            'menusDesassociados' => $menusDesassociados,
            'idsMenusAssociados' => $idsMenusAssociados,
            'optionsController' => $optionsController,
            'grupo' => $grupo
        ]);
    }
    
    /**
     *
     * @param  mixed $grupo
     * @param  mixed $request
     * @return void
     */
    public function toggleAssociarMenuGrupo(Grupo $grupo, Request $request)
    {
        try{
            $menusByGrupo = $grupo->menus();

            intVal($request->associar) ? $menusByGrupo->attach([$request->idMenu]) : $menusByGrupo->detach([$request->idMenu]);

            return response()->json(['error' => false, 'msg' => 'Associação efetuada'], 200);
        }catch(\Exception $error){
            return response()->json(['error' => true, 'msg' => 'Ocorreu um erro interno tente novamente mais tarde'], 500);   
        }
    }
}
