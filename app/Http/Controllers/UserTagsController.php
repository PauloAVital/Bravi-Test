<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserTagsController extends Controller
{
    private $objuser;    

    public function __construct()
    {
        $this->objuser = new User();        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $user = $this->objuser->all()->sortByDesc('id');                
        return view('admin.pages.users.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->objuser->all();
        return view('admin.pages.users.create', compact('users'));
    }

}