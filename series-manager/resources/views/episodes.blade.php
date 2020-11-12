@extends('baseLayout')

@section('title')
    Episódios da temporada {{ $season->id }}
@endsection

@section('content')
    <form action="/seasons/{{ $season->id }}/episodes/watch" method="POST">
        <div class="d-flex justify-content-between">
            <button class="btn btn-primary mb-2">Salvar episódios assistidos</button>
            <a href="/series/{{ $season->id }}/seasons">Voltar para série</a>
        </div>

        @csrf
        <ul class="list-group">
            @foreach($episodes as $episode)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>Episódio {{ $episode->number }}</span>
                <div class="d-flex align-items-center">
                    <span class="mr-2">Assistido: </span>
                    <input
                        type="checkbox"
                        name="episodes[]"
                        value="{{ $episode->id }}"
                        {{ $episode->watched ? 'checked' : '' }}
                        />
                </div>
            </li>
            @endforeach
        </ul>
    </form>
@endsection
