@extends('admin.layouts.app')

@section('title', 'Admin User - Github')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<div class="col-8 m-auto">
    @csrf
    <div class="text-center mt-3 mb-4">
        <a href="{{url('users/create')}}">
            <button class="btn btn-success">Cadastrar</button>
        </a>
    </div>
    <table class="table text-center">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>id_user</th>
                <th>nome</th>
                <th>language</th>
                <th>url</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $users)           
            <tr>
                <th scope="row">{{$users->id}}</th>
                <td>{{$users->id}}</td>
                <td>{{$users->name}}</td>
                <td>{{$users->email}}</td>
                <td>{{$users->password}}</td>
                <td  width="200">
                    <a href="{{ url("$users->id") }}"> <button class="btn btn-light fa far fa-eye"></button> </a>
                    <a href="{{ url("$users->id/edit") }}"> <button class="btn btn-primary fa fas fa-edit"></button> </a>
                    <a href="{{url("$users->id")}}" class="js-del">
                        <button class="btn btn-danger fa fas fa-eraser"></button>
                    </a>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
</div>
@endsection