@extends('baseLayout')

@section('title')
    Séries
@endsection


@section('content')
    <a href="/series/create" class="btn btn-dark mb-2">Adicionar série</a>

    <ul class="list-group">
        @foreach($series as $serie)
            <li class="list-group-item
                d-flex
                justify-content-between
                align-items-center">
                {{ $serie->name }}
                <form method="POST" action="/series/delete/{{ $serie->id }}">
                    @csrf
                    <button class="btn btn-danger">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
