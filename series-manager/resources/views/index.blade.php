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
                align-items-center
                py-3">
                <span id="name-serie-{{ $serie->id }}">{{ $serie->name }}</span>

                <div class="input-group w-50"
                    id="container-serie-{{ $serie->id }}"
                    hidden>
                    <input
                        type="text"
                        class="form-control"
                        id="input-serie-{{ $serie->id }}"
                        value="{{ $serie->name }}"/>

                    <div class="input-group-append">
                        @csrf
                        <button
                            class="btn btn-primary"
                            onclick="editSerie({{ $serie->id }})">
                            <i class="fas fa-check"></i>
                        </button>
                    </div>
                </div>

                <div class="d-flex">
                    <button class="btn btn-info btn-sm mr-2"
                    onclick="toggleInput({{ $serie->id }})">
                        <i class="fas fa-edit"></i>
                    </button>
                    <a href="/series/{{ $serie->id }}/seasons"
                        class="btn btn-info btn-sm mr-2">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                    <form method="POST" action="/series/{{ $serie->id }}/delete">
                        @csrf
                        <button class="btn btn-danger btn-sm">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

    <script>
        function toggleInput(id) {
            const selectedName = document.getElementById(`name-serie-${id}`);
            const selectedInput = document.getElementById(`container-serie-${id}`);

            if (selectedName.hasAttribute("hidden")) {
                selectedName.removeAttribute("hidden");
                selectedInput.hidden = true;
            } else {
                selectedInput.removeAttribute("hidden");
                selectedName.hidden = true;
            }
        }

        function editSerie(id){
            let formData = new FormData();

            const name = document.getElementById('input-serie-{{ $serie->id }}').value;
            formData.append('name', name);

            const token = document.querySelector('input[name="_token"]').value;
            formData.append('_token', token);

            const url = `/series/${id}/edit`;

            fetch(url, {
                body: formData,
                method: 'POST'
            }).then(() => {
                toggleInput(id);
                document.getElementById(`name-serie-${id}`).textContent = name
            })
        }
    </script>

@endsection
