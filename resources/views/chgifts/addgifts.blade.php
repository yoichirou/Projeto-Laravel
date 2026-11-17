@extends('layouts.fo')

@section('title', 'Adicionar Prendas')

@section('content')

 <h1 class="mt-1 py-1 bg-danger bg-opacity-30 border border-danger rounded text-center">Adicionar Prendas</h1>

    <form method="POST" action="{{route('gifts.store')}}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label p-1 bg-warning bg-opacity-30 border border-2 border-danger rounded text-center w-100">Prenda</label>
            <input required type="text" name="prenda" class="form-control">
        </div>
        @error('prenda')
            <p>Prenda Inválida</p>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label p-1 bg-warning bg-opacity-30 border border-2 border-danger rounded text-center w-100">Valor Previsto</label>
            <input required type="number" name="vp" class="form-control">

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label p-1 bg-warning bg-opacity-30 border border-2 border-danger rounded text-center w-100">Nome da Pessoa</label>
            <select class="form-select" name="id">
            <option value="">--Please choose an option--</option>
            @foreach ($giftPersonInfo as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label p-1 bg-warning bg-opacity-30 border border-2 border-danger rounded text-center w-100">Valor Gasto</label>
            <input required type="Number" name="vg" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Adicionar Prenda</button>
        <a class="btn btn-primary" href="{{route('gifts.all')}}">Voltar</a>
    </form>

@endsection
