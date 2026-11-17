@extends('layouts.fo')

@section('title', 'Não encontrada')

@section('content')

    <h1>Esta rota não existe</h1>

    <a class="btn btn-primary" href="{{route('home')}}">Voltar para Homepage</a>

@endsection
