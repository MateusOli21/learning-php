@extends('baseLayout')

@section('title')
    Séries
@endsection


@section('content')
    <a href="/series/create" class="btn btn-dark mb-2">Adicionar série</a>

    <ul class="list-group">
        @foreach($series as $serie)
            <li class="list-group-item">{{ $serie->name }}</li>
        @endforeach
    </ul>
@endsection
