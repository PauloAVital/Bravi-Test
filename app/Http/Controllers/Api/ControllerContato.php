<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ControleContato;

class ControllerContato extends Controller
{
    public function __construct(ControleContato $contato,
                                Request $Request)
    {
        $this->contato = $contato;
        $this->request = $Request;
    }

    public function index()
    {
        $data = ControleContato::all();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->contato->rules());
        
        $dataForm =  $request->all();

        $data = $this->contato->create($dataForm);
        
        return response()->json($data, 200);
    }

    public function show($id)
    {
        if (!$data = $this->contato->find($id)) {
            return response()->json(['error'=> 'Nada Encontrado', 404]);
        } else {
            return response()->json($data);
        }
    }

    public function update(Request $request, $id)
    {
        if (!$data = $this->contato->find($id)){
            return response()->json(['error'=> 'Nada Encontrado', 404]);
        } else {
            $this->validate($request, $this->contato->rules());
        
            $dataForm =  $request->all();

            $data->update($dataForm);
            
            return response()->json($data);
        }
    }

    public function destroy($id)
    {        
        if (!$data = $this->contato->find($id)){
            return response()->json(['error'=> 'Nada Encontrado', 404]);
        } else {
            $data->delete();

            return response()->json(['success'=> 'Deletado com Sucesso']);
        }
    }

    public function pessoa($id)
    {
        if(!$data = $this->contato->with('pessoa')->find($id)) {
            return response()->json(['error'=> 'Nada Encontrado', 404]);
        } else {
            return response()->json($data);
        }
    }

    public function ContatoPessoa($id)
    {
        if (!$data = $this->contato::where('id_pessoa', $id)->get(['id','id_pessoa','email','telefone','watssap'])) {
            return response()->json(['error'=> 'Nada Encontrado', 404]);
        } else {
            return response()->json($data);
        }
    }

    public function ContatoUpdate($id){
        if (!$data = $this->contato->find($id)){
            return view('admin.pages.contato.update', compact('data'));//, 
        } else {
            return view('admin.pages.contato.update', compact('data'));
        }
    }

    public function updateContato(Request $request)
    {                        
        if (!$data = $this->contato->find($request->id)){
            return response()->json(['error'=> 'Nada Encontrado', 404]);
        } else {
            $this->validate($request, $this->contato->rules());
        
            $dataForm =  $request->all();

            $data->update($dataForm);
            $contato = response()->json($data);
            return view('admin.pages.users.index', compact('contato'));
        }
    }
}
