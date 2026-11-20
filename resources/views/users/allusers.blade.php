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

    <form action="">
        <input type="text" name="search">
        <button class="btn btn-secondary" type="submit">Procurar</button>
    </form>


    <h6>Users carregados da base de dados</h6>

    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Nif</th>
                @if(Auth::user() && Auth::user()->email == 'admin@gmail.com')
                <th></th>
                @endif
                @auth
                <th></th>
                @endauth
            </tr>
        </thead>
        <tbody>
            @foreach ($usersFromDB as $userDB)
            <tr>
                <td><img class="photo-table rounded-circle border shadow-sm" src="{{ $userDB->photo ? asset('storage/' . $userDB->photo) : asset('images/nophoto.jpg') }}" alt=""></td>
                <th scope="row">{{$userDB->id}}</th>
                <td>{{$userDB->name}}</td>
                <td>{{$userDB->email}}</td>
                <td>{{$userDB->address}}</td>
                <td>{{$userDB->nif}}</td>
                @if(Auth::user() && Auth::user()->email == 'admin@gmail.com')
                <td><a href="{{ route('users.delete', $userDB->id)}}" class="btn btn-danger">Apagar</a></td>
                @endif
                @auth
                    <td><a href="{{ route('users.edit', $userDB->id)}}" class="btn btn-primary">Ver/Editar</a></td>
                @endauth
            </tr>
            @endforeach

        </tbody>
    </table>

@endsection
