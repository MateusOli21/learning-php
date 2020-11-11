@extends('baseLayout')

@section('title')
    Adicionar nova série
@endsection

@section('content')
    <form method="POST">
        @csrf
        <div class="row">
            <div class="col col-6">
                <label for="name">Nome da série</label>
                <input type="text" class="form-control" name="name"/>
            </div>

            <div class="col col-3">
                <label for="number_seasons">N° de temporadas</label>
                <input type="number" class="form-control" name="number_seasons"/>
            </div>

            <div class="col col-3">
                <label for="number_episodes">Episódios por temporada</label>
                <input type="number" class="form-control" name="number_episodes"/>
            </div>
        </div>

        <button class="btn btn-primary mt-4">Adicionar</button>

    </form>
@endsection
