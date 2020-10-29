@extends('admin.layouts.app')

@section('title', 'Admin User - Github')

@section('content')
<h1 class="text-center">
    Inserir Contato
</h1>
<hr>
<div class="col-8 m-auto">
<div class="text-center mt-3 mb-4">
        <a href="/users">
            <button class="btn btn-info">Voltar</button>
        </a>
    </div>
   
        <form name="formCad" id="formCad" method="" action="">   
        <select class="form-control mt-3 mb-4" name="id_pessoa" id="id_pessoa">            
            @foreach($pessoas as $pessoa)
                <option value="{{$pessoa->id}}">{{$pessoa->nome}}</option>
            @endforeach
        </select>
        <input class="form-control mt-3 mb-4" 
               type="text" 
               name="email" 
               id="email" 
               value="" 
               placeholder="E-mail">
        <input class="form-control mt-3 mb-4" 
               type="text" 
               name="telefone" 
               id="telefone" 
               value="" 
               placeholder="Telefone">
        <input class="form-control mt-3 mb-4" 
               type="text" 
               name="watssap" 
               id="watssap" 
               value="" 
               placeholder="Watssap">
        
        <input class="btn btn-primary mt-3 mb-4" 
               type="submit"
               onclick="EnviarPessoa()" 
               value="Enviar">
    </form>
</div>

<script>
    function EnviarPessoa(){        
        let id_pessoa = $("#id_pessoa").val();
        let email = $("#email").val();
        let telefone = $("#telefone").val();
        let watssap = $("#watssap").val();
        let _token   = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "{{ url('api/Contato') }}",
            type: "POST",
            data: {
                id_pessoa: id_pessoa,
                email: email,
                telefone: telefone,
                watssap: watssap,                    
                _token: _token
            },
            dataType: "json",
            success:function(resp){                
                alert(resp);
            },
            error:function(xhr, err){
                console.log(erro.toString());
            }
        });
    }

</script>
@endsection