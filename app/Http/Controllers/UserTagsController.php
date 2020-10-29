<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\ControlePessoa;

class UserTagsController extends Controller
{    

    public function __construct(ControlePessoa $pessoa)
    {        
        $this->pessoa = $pessoa;        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        // Não utilizado optei por outra solução direto em Jquery deixei apenas para verificação
        $client = new Client();

        $response = $client->request('GET', 'http://bravi-nginx/api/Pessoa/');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();
        $retLocal = json_decode($body, true);
        //dd($retLocal);
        $user = $retLocal;
        return view('admin.pages.users.index', compact('user'));
    }
   
    public function create()
    {       
        return view('admin.pages.users.create');
    }

    public function createContato() {
        $pessoas = ControlePessoa::all();
        return view('admin.pages.contato.create', compact('pessoas'));
    }

}