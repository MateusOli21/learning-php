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
                <div class="d-flex">
                    <a href="/series/{{ $serie->id }}/info" class="btn btn-info btn-sm mr-2">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                    <form method="POST" action="/series/delete/{{ $serie->id }}">
                        @csrf
                        <button class="btn btn-danger btn-sm">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
