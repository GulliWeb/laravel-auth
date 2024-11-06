@extends('layouts.app')

@section('title', 'Crea Nuovo Progetto')

@section('content')
<div class="container">
    <h1 class="text-light">Crea un Nuovo Progetto</h1>

    <form action="{{ route('admin.projects.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label text-light">Titolo</label>
            <input type="text" name="title" id="title" class="form-control text-white" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label text-light">Descrizione</label>
            <textarea name="description" id="description" class="form-control text-white" rows="5"></textarea>
        </div>

        <div class="mb-3">
            <label for="url" class="form-label text-light">URL</label>
            <input type="url" name="url" id="url" class="form-control text-white">
        </div>

        <button type="submit" class="btn btn-primary">Salva Progetto</button>
    </form>
</div>
@endsection
