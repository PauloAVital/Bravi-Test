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
                    <input type="text" name="name" class="form-control" placeholder="[{()}](){}">
                    @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    <button type="submit" class="btn btn-primary mb-2">Buscar</button>
                </div>
                
            </form>
        </div>
        
    </div>    
</div>

@endsection