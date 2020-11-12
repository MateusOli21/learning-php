@extends('baseLayout')

@section('title')
    Temporadas de {{ $serie->name }}
@endsection


@section('content')
    <ul class="list-group">
        @foreach($seasons as $season)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="/seasons/{{ $season->id }}/info">
                Temporada {{ $season->number}}
            </a>
            <span class="badge badge-secondary">
                {{ $season->listWatchedEpisodes()->count() }} / {{ $season->episodes->count() }}
            </span>
        </li>
        @endforeach
    </ul>
@endsection
