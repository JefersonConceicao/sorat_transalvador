<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function index()
    {
        return view('menu.index');
    }
}
