<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use Illuminate\Support\Facades\Route;

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
        $dados = $this->menu->getMenus();
        
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
        
        return view('menu.create', [
            'controllers' => $controllers
        ]);
    }
    
    public function store(MenuRequest $request)
    {
        $saveMenu = $this->menu->cadastrarMenu($request->all());


    }

    /**
     * edit
     *
     * @param  mixed $menu
     * @return void
     */
    public function edit(Menu $menu)
    {
        return view('menu.index');
    }
    
    /**
     * update
     *
     * @param  mixed $menu
     * @return void
     */
    public function update(Menu $menu, Request $request)
    {
        return view('menu.index');
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
