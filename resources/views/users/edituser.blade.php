@extends('layouts.fo')

@section('title', 'Editar')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="mb-0">Detalhes do user {{ $userInfo->name }}</h6>
        <img src="{{ $userInfo->photo ? asset('storage/' . $userInfo->photo) : asset('images/nophoto.jpg') }}"
            alt="Foto de {{ $userInfo->name }}" class="rounded-circle border shadow-sm"
            style="width: 120px; height: 120px; object-fit: cover;">
    </div>

    <form method="POST" action="{{ route('users.update') }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" name="id" value="{{ $userInfo->id }}">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input required type="text" name="name" class="form-control" value="{{ $userInfo->name }}">
        </div>
        @error('name')
            <p>Nome Inválido</p>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input required type="email" name="email" class="form-control" value="{{ $userInfo->email }}" disabled>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        @error('email')
            <p>Email Inválido</p>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Morada</label>
            <input required type="text" name="address" class="form-control" value="{{ $userInfo->address }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nif</label>
            <input required type="text" name="nif" class="form-control" value="{{ $userInfo->nif }}">
        </div>
        <div class="mb-3">
            <label for="">Foto</label>
            <input class="form-control" name="photo" type="file" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary ">Submit</button>
    </form>

@endsection
