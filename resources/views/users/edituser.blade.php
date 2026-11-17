@extends('layouts.fo')

@section('title', 'Editar')

@section('content')

    <h6>Detalhes do user {{$userInfo->name}}</h6>

    <form method="POST" action="{{route('users.update')}}">
        @method('PUT')
        @csrf
        <input type="hidden" name="id" value="{{$userInfo->id}}">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input required type="text" name="name" class="form-control" value="{{$userInfo->name}}">
        </div>
        @error('name')
            <p>Nome Inválido</p>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input required type="email" name="email" class="form-control" value="{{$userInfo->email}}" disabled>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        @error('email')
            <p>Email Inválido</p>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Morada</label>
            <input required type="text" name="address" class="form-control" value="{{$userInfo->address}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nif</label>
            <input required type="text" name="nif" class="form-control" value="{{$userInfo->nif}}">
        </div>
        <button type="submit" class="btn btn-primary ">Submit</button>
    </form>

@endsection
