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
                    <h5 class="card-title">Admin User</h5>
                    <p class="card-text">Insert, Update, Show, Delete.</p>
                    <a href="/users" class="btn btn-primary">Log in</a>
                </div>
                </div>
            </div>
        </div>
            
        </div>
    </div>
</div>
@endsection