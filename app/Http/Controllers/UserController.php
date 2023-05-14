<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grupo;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    protected $user;
    protected $grupo;

    public function __construct(
        User $user,
        Grupo $grupo
    ) {
        $this->user = $user;
        $this->grupo = $grupo;
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
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

    public function toggleStatus(User $user){



    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
