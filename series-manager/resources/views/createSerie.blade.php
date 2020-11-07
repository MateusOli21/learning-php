@extends('baseLayout')

@section('title')
    Adicionar nova série
@endsection

@section('content')
    <form method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nome da série</label>
            <input type="text" class="form-control" name="name"/>
        </div>

        <button class="btn btn-primary">Adicionar</button>

    </form>
@endsection
