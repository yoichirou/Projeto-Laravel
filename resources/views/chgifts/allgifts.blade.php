@extends('layouts.fo')

@section('title', 'Christmas Gifts')

@section('content')

    @if (@session('message'))
        <div class="alert alert-success mt-2">
            {{ session('message') }}
        </div>
    @endif

    <h6 class="mt-1 py-1 bg-danger bg-opacity-30 border border-danger rounded text-center">Prendas de Natal</h6>

    <a href="{{ route('gifts.add') }}" class="btn btn-danger w-100 mb-1">Adicionar Prenda</a>
    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome da Prenda</th>
                    <th scope="col">Valor previsto</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Valor gasto</th>
                    <th>Diferença</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Chgifts as $item)
                    <tr>
                        <th scope="row"  class="text-center">{{ $item->id }}</th>
                        <td >{{ $item->giftname }}</td>
                        <td class="text-center">{{ $item->predicted_value }}</td>
                        <td class="text-center">{{ $item->username }}</td>
                        <td class="text-center">{{ $item->actual_value }}</td>
                        <td class="text-center align-middle">
                            <span class="{{ $item->predicted_value - $item->actual_value >= 0 ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }} badge rounded-pill fs-6">
                                {{ $item->predicted_value - $item->actual_value }}
                            </span>
                        </td>
                        <td class="text-center"><a href="{{ route('gifts.delete', $item->id) }}" class="btn btn-danger">Apagar</a></td>
                        <td class="text-center"><a href="{{ route('gifts.edit', $item->id) }}" class="btn btn-primary">Editar</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
