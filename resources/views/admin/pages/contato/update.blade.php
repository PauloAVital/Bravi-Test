@extends('admin.layouts.app')

@section('title', 'Admin User - Github')

@section('content')
<h1 class="text-center">
    Atualizar Contato
</h1>
<hr>
<div class="col-8 m-auto">
<div class="text-center mt-3 mb-4">
        <a href="/users">
            <button class="btn btn-info">Voltar</button>
        </a>
    </div>
   
        <form name="formCad" id="formCad" method="" action="/updateContato">   
        
        <input class="form-control mt-3 mb-4" 
               type="text" 
               name="email" 
               id="email" 
               value="{{$data->email  ?? ''}}" 
               placeholder="E-mail">
        <input class="form-control mt-3 mb-4" 
               type="hidden"    
               name="id" 
               id="id" 
               value="{{$data->id  ?? ''}}" 
               placeholder="Nome">
        <input class="form-control mt-3 mb-4" 
               type="hidden"    
               name="id_pessoa" 
               id="id_pessoa" 
               value="{{$data->id_pessoa  ?? ''}}" 
               placeholder="Nome">
        <input class="form-control mt-3 mb-4" 
               type="text" 
               name="telefone" 
               id="telefone" 
               value="{{$data->telefone  ?? ''}}" 
               placeholder="Telefone">
        <input class="form-control mt-3 mb-4" 
               type="text" 
               name="watssap" 
               id="watssap" 
               value="{{$data->watssap  ?? ''}}" 
               placeholder="Watssap">
        
        <input class="btn btn-primary mt-3 mb-4" 
               type="submit"
               onclick="EnviarPessoa()" 
               value="Enviar">
    </form>
</div>


@endsection