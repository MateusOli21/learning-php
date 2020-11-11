@extends('baseLayout')

@section('title')
    Temporadas de {{ $serie->name }}
@endsection


@section('content')
    <ul class="list-group">
        @foreach($seasons as $season)
        <li class="list-group-item">
            Temporada {{ $season->number}}
        </li>
        @endforeach
    </ul>
@endsection
