@extends('layouts.fo')

@section('title', 'Editar Prenda')

@section('content')
    {{-- {{dd($giftInfo)}} --}}
    <h6 class="mt-1 py-1 bg-danger bg-opacity-30 border border-danger rounded text-center">Detalhes da Prenda -> {{ $giftInfo->giftname }}</h6>

    <form method="POST" action="{{ route('gifts.update') }}">
        @method('PUT')
        @csrf
        <input type="hidden" name="id" value="{{ $giftInfo->id }}">
        <div class="mb-3">
            <label class="form-label p-1 bg-warning bg-opacity-30 border border-2 border-danger rounded text-center w-100">Nome da Prenda</label>
            <input required type="text" name="giftname" class="form-control" value="{{ $giftInfo->giftname }}">
        </div>
        @error('giftname')
            <p>Nome da prenda Inválida</p>
        @enderror
        <div class="mb-3">
            <label class="form-label p-1 bg-warning bg-opacity-30 border border-2 border-danger rounded text-center w-100">Valor previsto</label>
            <input required type="number" name="vp" class="form-control" value="{{ $giftInfo->predicted_value }}">
        </div>
        <div class="mb-3">
            <label class="form-label p-1 bg-warning bg-opacity-30 border border-2 border-danger rounded text-center w-100">Nome</label>
            <select class="form-select" name="name" id="">
                @foreach ($giftPersonInfo as $item)
                    <option {{$item->id == $giftInfo->user_id? 'selected' : ''}} value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        @error('name')
            <p>Nome Inválido</p>
        @enderror
        <div class="mb-3">
            <label class="form-label p-1 bg-warning bg-opacity-30 border border-2 border-danger rounded text-center w-100">Valor gasto</label>
            <input required type="text" name="vg" class="form-control" value="{{ $giftInfo->actual_value }}">
        </div>
        <button type="submit" class="btn btn-primary ">Editar</button>
        <a href="{{ route('gifts.all') }}" class="btn btn-primary">Voltar para a Lista</a>
    </form>



@endsection
