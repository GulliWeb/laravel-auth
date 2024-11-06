@extends('layouts.app')

@section('title', 'Gestione Progetti')

@section('content')
<div class="container">
    <!-- Sezione per messaggi di errore e successo -->
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12 text-center my-4">
            <h1 class="text-light">Gestione dei Progetti</h1>
            <p class="text-light">Qui puoi visualizzare, modificare e eliminare i tuoi progetti.</p>
        </div>
        <div class="col-md-12">
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary mb-3">Crea Nuovo Progetto</a>
        </div>
        <div class="col-md-12">
            <div class="card mb-4 bg-dark text-light">
                <div class="card-header">Elenco Progetti</div>
                <div class="card-body">
                    @if($projects->isEmpty())
                        <p>Non ci sono progetti disponibili.</p>
                    @else
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Titolo</th>
                                    <th>Azioni</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <td>{{ $project->id }}</td>
                                        <td>{{ $project->title }}</td>
                                        <td>
                                            <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-info btn-sm">Visualizza</a>
                                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning btn-sm">Modifica</a>
                                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Elimina</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
