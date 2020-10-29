@extends('layouts.app')

@section('content')
<style>
    .container img {
        max-width:200px;
        max-height:150px;
        width: auto;
        height: auto;
    }
    .card-titles {
        width: 13rem; 
        float: left; 
        margin-right: 1%
    }
    .divCaixa {
        border: 3px solid #d5d5d5;
        padding:20px 20px 20px 20px; 
        border-radius: 1px;
        width:95%;
        }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">String of Brackets</h5>
                    <p class="card-text">Module String of Brackets.</p>
                    <a href="/valid" class="btn btn-primary">Log in</a>
                </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Admin People</h5>
                    <p class="card-text">Insert, Update, Show, Delete.</p>
                    <a href="/users" class="btn btn-primary">Log in</a>
                </div>
                </div>
            </div>
        </div>
            
        </div>
    </div>
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                localhost:8000/api/Pessoa
                </button>
            </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
            <div class="text-center">
                <a  href="img/bravi-api-pessoa-get.png" targe="_blank"><img class="divCaixa" src="img/bravi-api-pessoa-get.png" class="rounded" alt="dashboard"></a>
                <a  href="img/bravi-api-pessoa-post.png" targe="_blank"><img class="divCaixa" src="img/bravi-api-pessoa-post.png" class="rounded" alt="dashboard"></a>
                <a  href="img/bravi-api-pessoa-delete.png" targe="_blank"><img class="divCaixa" src="img/bravi-api-pessoa-delete.png" class="rounded" alt="dashboard"></a>
                <a  href="img/bravi-api-pessoa-put.png" targe="_blank"><img class="divCaixa" src="img/bravi-api-pessoa-put.png" class="rounded" alt="dashboard"></a>
            </div>              
            </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                localhost:8000/api/Contato
                </button>
            </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
            <div class="text-center">
                <a  href="img/bravi-api-contato-get.png" targe="_blank"><img class="divCaixa" src="img/bravi-api-contato-get.png" class="rounded" alt="dashboard"></a>
                <a  href="img/bravi-api-contato-post.png" targe="_blank"><img class="divCaixa" src="img/bravi-api-contato-post.png" class="rounded" alt="dashboard"></a>
                <a  href="img/bravi-api-contato-put.png" targe="_blank"><img class="divCaixa" src="img/bravi-api-contato-put.png" class="rounded" alt="dashboard"></a>
                <a  href="img/bravi-api-contato-delete.png" targe="_blank"><img class="divCaixa" src="img/bravi-api-contato-delete.png" class="rounded" alt="dashboard"></a>
            </div>
            </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                localhost:8000/api/Contato/1/Pessoa
                localhost:8000/api/Pessoa/1/Contato
                </button>
            </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
            <div class="text-center">
                <a  href="img/bravi-api-rel-contato-pessoa-get.png" targe="_blank"><img class="divCaixa" src="img/bravi-api-rel-contato-pessoa-get.png" class="rounded" alt="dashboard"></a>
                <a  href="img/bravi-api-rel-pessoa-contato-get.png" targe="_blank"><img class="divCaixa" src="img/bravi-api-rel-pessoa-contato-get.png" class="rounded" alt="dashboard"></a>                
            </div>
            </div>
            </div>
        </div>
        </div>
</div>
@endsection