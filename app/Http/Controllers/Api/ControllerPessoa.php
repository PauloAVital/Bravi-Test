<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ControlePessoa;

class ControllerPessoa extends Controller
{
    public function __construct(ControlePessoa $pessoa,
                                Request $Request)
    {
        $this->pessoa = $pessoa;
        $this->request = $Request;
    }

    public function index()
    {
        $data = ControlePessoa::all();
        return response()->json($data);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, $this->pessoa->rules());
        
        $dataForm =  $request->all();

        $data = $this->pessoa->create($dataForm);
        
        return response()->json($data, 200);
    }
    
    public function show($id)
    {
        if (!$data = $this->pessoa->find($id)) {
            return response()->json(['error'=> 'Nada Encontrado', 404]);
        } else {
            return response()->json($data);
        }
    }
    
    public function update(Request $request, $id)
    {
        if (!$data = $this->pessoa->find($id)){
            return response()->json(['error'=> 'Nada Encontrado', 404]);
        } else {
            $this->validate($request, $this->pessoa->rules());
        
            $dataForm =  $request->all();

            $data->update($dataForm);
            
            return response()->json($data);
        }
    }

    public function destroy($id)
    {
        if (!$data = $this->pessoa->find($id)){
            return response()->json(['error'=> 'Nada Encontrado', 404]);
        } else {
            $data->delete();

            return response()->json(['success'=> 'Deletado com Sucesso']);
        }
    }

    public function contato($id)
    {
        if(!$data = $this->pessoa->with('contato')->find($id)) {
            return response()->json(['error'=> 'Nada Encontrado', 404]);
        } else {
            return response()->json($data);
        }
    }
}
