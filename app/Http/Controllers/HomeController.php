<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;        
    }

    public function index(){
        return view('home.index');
    }
}
