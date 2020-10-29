@extends('admin.layouts.app')

@section('title', 'Admin User - Github')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<div class="col-8 m-auto">
    @csrf
    <div class="text-center mt-3 mb-4">
        <a href="{{url('users/create')}}">
            <button class="btn btn-success">Cadastrar Pessoa</button>
        </a>
        <a href="{{url('contatoCreate')}}">
            <button class="btn btn-info">Cadastrar Contato</button>
        </a>
    </div>
    
    <table class="table text-center">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>                
                <th>nome</th>
                <th>endereco</th>                
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="rest">
            
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
   // var curl = "http://bravi-nginx/api/Pessoa/";
   // var surl = "http://localhost:8000/api/Pessoa/";
    $("#rest").html("");
    let html = "";
    let subhtml = "";    

    $(document).ready(function(){
        $.ajax({
            url: "{{ url('api/Pessoa') }}",
            type: "GET",
            dataType: "json",
            success:function(resp){                
                $.each(resp, function(index, value){
                    montarTabela(value);
                });
            },
            error:function(xhr, err){
                console.log(erro.toString());
            }
        });       
    });
/*{{url('PessoaUpdate/"+valueEnv.id+"')}}*/
    function montarTabela(valueEnv) {
        var surl = "";
        html += "<tr>";
        html += "<td>"+valueEnv.id+"</td>";
        html += "<td>"+valueEnv.nome+"</td>";
        html += "<td>"+valueEnv.endereco+"</td>";
        html += "<td  width='200'>";
        html += "   <a href='#' onclick='esconderLinha("+valueEnv.id+")'> <button class='btn btn-light fa fa-plus'></button> </a>";
        html += "   <a href='#' onclick='PessoaUpdate("+valueEnv.id+")'> <button class='btn btn-primary fa fas fa-edit'></button> </a>";
        html += "   <a href='#' onclick='DeletarPessoa("+valueEnv.id+")'> <button class='btn btn-danger fa fas fa-eraser'></button> </a>";
        html += "</td>";
        html += "</tr>";
        html += "<tr id='"+valueEnv.id+"' style='display: none'>";
        html += "   <td></td>";
        html += "   <td colspan='2'>";
        html += "       <table class='table table-bordered'>";
        html += "           <thead><tr>";
        html += "           <th> E-mail </th>";
        html += "           <th> Telefone </th>";
        html += "           <th> Watssap </th>";
        html += "           <th> Action </th>";
        html += "           </tr></thead>";
        html += "           <tbody id='SubRest"+valueEnv.id+"'>";
        
        var surl = "http://localhost:8000/api/ContatoPessoa/"+valueEnv.id;
        
        $.ajax({
            url: surl,
            type: "GET",
            dataType: "json",
            success:function(resp){
                $("#SubRest"+valueEnv.id).html("");
                $.each(resp, function(index, value){                                    
                   subhtml += "<tr>";
                   subhtml += "  <td>"+value.email+"</td>";
                   subhtml += "  <td>"+value.telefone+"</td>";
                   subhtml += "  <td>"+value.watssap+"</td>";
                   subhtml += "<td  width='200'>";                   
                   subhtml += "   <a href='#' onclick='ContatoUpdate("+value.id+")'> <button class='btn btn-primary fa fas fa-edit'></button> </a>";
                   subhtml += "   <a href='#' onclick='DeletarContato("+value.id+")'> <button class='btn btn-danger fa fas fa-eraser'></button> </a>";
                   subhtml += "</td>";
                   subhtml += "</tr>";
                });
                $("#SubRest"+valueEnv.id).html(subhtml);
                subhtml = "";
            },
            error:function(xhr, err){
                console.log(erro.toString());
            }
        });
                
        html += "           </tbody>";
        html += "       </table>";
        html += "   </td>";
        html += "</tr>";


        $("#rest").html(html);
        
    }

    function esconderLinha(idDaLinha) {
        $("#" + idDaLinha).toggle();
    }

    function DeletarPessoa(id) {

        var url = "http://localhost:8000/api/Pessoa/"+id;

        if(confirm('Deseja realmente excluir a Pessoa')) {

            $.ajax({
                url: url,
                type: "DELETE",
                dataType: "json",
                success:function(resp){                
                    alert('Excluido com Sucesso');
                    location.reload();
                },
                error:function(xhr, err){
                    console.log(erro.toString());
                }
            });
        }
    }

    function DeletarContato(id) {        
        var url = "http://localhost:8000/api/Contato/"+id;

        if(confirm('Deseja realmente excluir o Contato')) {

            $.ajax({
                url: url,
                type: "DELETE",
                dataType: "json",
                success:function(resp){                
                    alert('Excluido com Sucesso');
                    location.reload();
                },
                error:function(xhr, err){
                    console.log(erro.toString());
                }
            });
        }
    }

    function PessoaUpdate(id){
        var url = "http://localhost:8000/PessoaUpdate/"+id;
        $(location).attr('href', url);
    }

    function ContatoUpdate(id){
        var url = "http://localhost:8000/ContatoUpdate/"+id;
        $(location).attr('href', url);
    }

    
</script>

@endsection