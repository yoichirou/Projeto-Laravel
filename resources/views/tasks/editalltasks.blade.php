@extends('layouts.fo')

@section('title', 'Editar Tarefas')

@section('content')

<h6>Detalhes da task {{$taskInfo->taskname}}</h6>

<table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tarefa</th>
                <th scope="col">Estado</th>
                <th scope="col">Conclusão</th>
                <th scope="col">Pessoa Responsável</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{$taskInfo->id}}</th>
                <td>{{$taskInfo->taskname}}</td>
                <td>{{$taskInfo->status}}</td>
                <td>{{$taskInfo->due_at}}</td>
                <td>{{$taskInfo->username}}</td>
                <td><a href="" class="btn btn-danger">Editar</a></td>
            </tr>


        </tbody>
    </table>



@endsection
