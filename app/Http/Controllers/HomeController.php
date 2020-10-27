<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use DataTables;
use App\User;

class HomeController extends Controller
{
    private $objuser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->objuser = new User();
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {        
        return view('home');
    }

    public function valid()
    {              
        $users = $this->objuser->all();        
        return view('admin.pages.valid.index', compact('users'));
    }

}
