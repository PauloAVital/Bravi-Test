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

    public function validRequest(Request $request){
        $qtd = strlen($request->bracket);
        $bracket1 = [];  // (
        $bracket2 = [];  // )
        $bracket3 = [];  // {
        $bracket4 = [];  // }
        $bracket5 = [];  // [
        $bracket6 = [];  // ]

        for ($i = 0; $i < $qtd; ) {
            
            if ($request->bracket[$i] == '(') {
                array_push($bracket1, $request->bracket[$i]);
            }
            if ($request->bracket[$i] == ')') {
                array_push($bracket2, $request->bracket[$i]);
            }
            if ($request->bracket[$i] == '{') {
                array_push($bracket3, $request->bracket[$i]);
            }
            if ($request->bracket[$i] == '}') {
                array_push($bracket4, $request->bracket[$i]);
            }
            if ($request->bracket[$i] == '[') {
                array_push($bracket5, $request->bracket[$i]);
            }
            if ($request->bracket[$i] == ']') {
                array_push($bracket6, $request->bracket[$i]);
            }
                     
            $i++;
        }

        $result1 = (count($bracket1) == count($bracket2)) ? true : false;
        $result2 = (count($bracket3) == count($bracket4)) ? true : false;
        $result3 = (count($bracket5) == count($bracket6)) ? true : false;

        if (($result1) &&
            ($result2) &&
            ($result3)) {
            return response()->json('valid', 200);
        } else {
            return response()->json('error', 200);
        }
    }
}
