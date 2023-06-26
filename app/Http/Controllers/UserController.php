<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grupo;
USE App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    protected $user;
    protected $grupo;
    protected $menu;

    public function __construct(
        User $user,
        Grupo $grupo,
        Menu $menu
    ) {
        $this->user = $user;
        $this->grupo = $grupo;
        $this->menu = $menu;
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        session()->flashInput($request->input());

        $dados = $this->user->getUsuarios($request->all());
        $optionsGrupos = $this->grupo::optionsGrupos();

        return view('users.index', [
            'dados' => $dados,
            'optionsGrupos' => $optionsGrupos
        ]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $optionsGrupos = $this->grupo::optionsGrupos();

        return view('users.create', [
            'optionsGrupos' => $optionsGrupos
        ]);
    }

    /**
     * @param  \Illuminate\Http\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $novoUsuario = $this->user->cadastrarUsuario($request->all());

        if ($novoUsuario) {
            return redirect()->route('user.index')->with([
                'success' => 'Cadastro realizado com sucesso!'
            ]);
        }
        
        return redirect()->back()->withInput()->with([
            'error' => 'Não foi possível cadastrar o usuário'
        ]);
    }

    /**
     * @param User App\Models\User;
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
            'optionsGrupos' => $this->grupo::optionsGrupos()
        ]);
    }
    
    /**
     * update
     *
     * @param  mixed $user
     * @param  mixed $request
     * @return void
     */
    public function update(User $user, UserRequest $request)
    {
        $usuarioAtualizado = $this->user->updateUsuario($user, $request->all());

        if ($usuarioAtualizado) {
            return redirect()->route('user.index')->with([
                'success' => 'Usuário atualizado com sucesso!'
            ]);
        }
        return redirect()->back()->withInput()->with([
            'error' => 'Não foi possível atualizar o usuário'
        ]);
    }
    
    /**
     * toggleStatus
     *
     * @param  mixed $user
     * @param  mixed $request
     * @return void
     */
    public function toggleStatus(User $user, Request $request){

        $responseUpdateStatus = $user->toggleStatusUsuario($user, $request->all());
    
        return response()->json([
            'ok' => $responseUpdateStatus,  
        ], 200);
    }
    
    /**
     * renderAssociarMenuUsuario
     *
     * @param  mixed $user
     * @param  mixed $request
     * @return void
     */
    public function renderAssociarMenuUsuario(User $user, Request $request)
    {   
        session()->flashInput($request->all());

        $optionsController = $this->menu->getControllersRoute();
        $menusDesassociados = $this->menu->getMenusDesassociados($request->all());
        $idsMenusAssociadosUsuario = $this->menu->getIdsMenusAssociadosUsuario($user->usu_id_usu);

        return view('users.associar_menus', [
            'optionsGrupos' => $this->grupo->optionsGrupos(),
            'optionsController' => $optionsController,
            'menusDesassociados' => $menusDesassociados,
            'idsMenusAssociadosUsuario' => $idsMenusAssociadosUsuario,
            'user' => $user
        ]);
    }

    public function toggleAssociacaoMenuUsuario(User $user, Request $request)
    {
        $menusUsuario = $user->menu;
        dd($menusUsuario);

    }
}
