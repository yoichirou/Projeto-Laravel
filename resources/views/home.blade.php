@extends('layouts.fo')

@section('title', 'HomePage')

@section('content')

    <img src="{{ asset('images/Laravel.svg.png') }}" alt="">



    <h5>Olá {{ isset($courseName) ? $courseName : 'user' }}</h5>
    <h6>O contacto é o {{ $contactInfo['name'] }} - {{ $contactInfo['contact'] }}</h6>

    <h5>Informação CESAE</h5>
    <ul>
        <li>{{ $istec_info['name'] }}</li>
        <li>{{ $istec_info['address'] }}</li>
        <li>{{ $istec_info['email'] }}</li>
    </ul>

    <h5>Alunos da Turma</h5>
    <ul>
        @if (isset($students))

            @foreach ($students as $student)
                <li>{{ $student }}</li>
            @endforeach

        @endif
    </ul>

    <h5>Funcionalidades da nossa app</h5>

    <ul>
        <li><a href="{{ route('welcome') }}" >Welcome Page</a></li>
        <li><a href="{{ route('users.all') }}">Utilizadores</a></li>
        <li><a href="{{ route('users.add') }}">Adicionar utilizador</a></li>
        <li><a href="{{ route('tasks.all') }}">All Tasks</a></li>
        <li><a href="{{ route('tasks.add')}}">Adicionar Tarefa</a></li>
    -----------------------------------------------------------
        <li><a href="{{route('gifts.all')}}">Prendas de Natal</a></li>
    </ul>

@endsection
