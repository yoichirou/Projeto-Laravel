@extends('layouts.fo')

@section('title', 'Adicionar Tarefas')

@section('content')

    <h1>Adicionar Tarefas</h1>

    <form method="POST" action="{{route('tasks.store')}}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome da Tarefa</label>
            <input required type="text" name="task" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your task with anyone else.</div>
        </div>
        @error('task')
            <p>Tarefa Inválida</p>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Descrição</label>
            <input required type="text" name="desc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your task with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pessoa Responsável</label>
            <select id="disabledSelect" class="form-select" name="id">
            @foreach ($taskPersonInfo as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach

            </select>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
