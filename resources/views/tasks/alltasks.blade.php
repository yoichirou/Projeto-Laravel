@extends('layouts.fo')

@section('title', 'AllTasks')

@section('content')

@if (@session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>

@endif

<h5 class="py-3">Todas as tarefas</h5>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tarefa</th>
                <th scope="col">Estado</th>
                <th scope="col">Conclusão</th>
                <th scope="col">Pessoa Responsável</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
                @foreach ($alltasks as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->taskname}}</td>
                    <td>{{$item->status}}</td>
                    <td>{{$item->due_at}}</td>
                    <td>{{$item->username}}</td>
                    <td><a href="{{ route('tasks.delete', $item->id)}}" class="btn btn-danger">Apagar</a></td>
                    <td><a href="{{ route('tasks.edit', $item->id)}}" class="btn btn-primary">Ver/Editar</a></td>
                </tr>
                @endforeach
        </tbody>
    </table>

@endsection
