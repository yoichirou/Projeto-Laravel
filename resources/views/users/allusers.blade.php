@extends('layouts.fo')

@section('title', 'Utilizadores')

@section('content')

    <h1>Aqui vamos carregar todos os utilizadores</h1>

    <h6>Users sem estarem carregados da base de dados</h6>
    <ul>
        @foreach ($usersWDB as $user)
            <li>{{ $user['name'] }} --> {{ $user['email'] }}</li>
        @endforeach

    </ul>


    @if (@session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>

    @endif

    <h6>Users carregados da base de dados</h6>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Nif</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usersFromDB as $userDB)
            <tr>
                <th scope="row">{{$userDB->id}}</th>
                <td>{{$userDB->name}}</td>
                <td>{{$userDB->email}}</td>
                <td>{{$userDB->address}}</td>
                <td>{{$userDB->nif}}</td>
                <td><a href="{{ route('users.delete', $userDB->id)}}" class="btn btn-danger">Apagar</a></td>
                <td><a href="{{ route('users.edit', $userDB->id)}}" class="btn btn-primary">Ver/Editar</a></td>
            </tr>
            @endforeach

        </tbody>
    </table>

@endsection
