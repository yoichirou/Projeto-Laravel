@extends('layouts.fo')

@section('title', 'Login')

@section('content')

    @if (session('status'))
    <div class="alert alert-success mt-1" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <h1>Login</h1>

    <form method="POST" action="{{route('login')}}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input required type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        @error('email')
            <p>Email Inválido</p>
        @enderror
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input required type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        @error('password')
            <p>Password Inválida</p>
        @enderror
        <a class="underline p-0 d-block" href="{{route('password.request')}}">Recuperar password</a>
        <button type="submit" class="btn btn-primary mt-1">Login</button>

    </form>
@endsection
