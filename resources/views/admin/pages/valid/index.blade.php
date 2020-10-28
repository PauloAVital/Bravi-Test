@extends('admin.layouts.app')

@section('title', 'String of Brackets')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            String of Brackets 
        </div>
        <div class="card-body">
            <h5 class="card-title">Validate bracket order</h5>
            <form class="form-inline" action="" method="GET">
                @csrf
                <div class="form-group mx-sm-10 mb-10">
                    <label for="Name" class="sr-only">bracket</label>
                    <input type="text" name="bracket" id="bracket" class="form-control" placeholder="[{()}](){}">               
                    <button type="submit" class="btn btn-primary mb-2" onclick="sendBracket()">Enviar</button>
                </div>
            </form>
        </div>
    </div>    
</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#bracket").keyup(function() {
            var valor = $("#bracket").val().replace(/[^({[})\]]+/g,'');
            valor = valor.replace(/( )+/g, '');
            $("#bracket").val(valor);
        });
        
    });

    function sendBracket(){
        $.ajax({
                type: 'GET',
                url: "validRequest",
                data: {bracket: $("#bracket").val()
                },
                success: function(data) {
                    alert(data);
                }
            });
    }
</script>

@endsection