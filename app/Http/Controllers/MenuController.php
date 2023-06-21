<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;
use App\Models\Menu;

class MenuController extends Controller
{
    private $menu;

    public function __construct(Menu $menu){
        $this->menu = $menu;
    }
    
    /**
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dados = $this->menu->getMenus($request->all());

        return view('menu.index', [
            'dados' => $dados
        ]);
    }
        
    /**
     * create
     *
     * @return void
     */
    public function create()
    {   
        $controllers = $this->menu->getControllersRoute();
        $optionsMenuPai = $this->menu->getOptionsMenu();

        return view('menu.create', [
            'controllers' => $controllers,
            'optionsMenuPai' => $optionsMenuPai
        ]);
    }
    
    public function store(MenuRequest $request)
    {
        $saveMenu = $this->menu->cadastrarMenu($request->all());

        if($saveMenu){
            return 
            redirect()
            ->route('menu.index')
            ->with(['success' => 'Registro cadastrado com sucesso']);
        }

        return 
            redirect()
            ->back()
            ->withInput()
            ->withErrors([
                'error' => 'Não foi possível cadastrar o menu, tente novamente ou abra um chamado.'
            ]);
    }

    /**
     * edit
     *
     * @param  mixed $menu
     * @return void
     */
    public function edit(Menu $menu)
    {
        return view('menu.edit', [
            'dadosMenu' => $menu,
            'controllers' => $this->menu->getControllersRoute(),
            'optionsMenuPai' => $this->menu->getOptionsMenu(['men_id_men', '!=', $menu->men_id_men]) 
        ]);
    }
    
    /**
     * update
     *
     * @param  mixed $menu
     * @return void
     */
    public function update(Menu $menu, MenuRequest $request)
    {
        $updatedMenu = $this->menu->updateMenu($menu, $request->all());
        dd($updatedMenu);
    }
    
    /**
     * destroy
     *
     * @param  mixed $menu
     * @return void
     */
    public function destroy(Menu $menu){


    }
}
