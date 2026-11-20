@extends('layouts.fo')

@section('title', 'Recuperar Password')

@section('content')

    <h1>Recuperar Password</h1>

    <form method="POST" action="{{route('password.email')}}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input required type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        @error('email')
            <p>Email Inválido</p>
        @enderror
        <button class="btn btn-primary" type="submit">Recuperar Email</button>
    </form>

@endsection
