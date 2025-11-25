@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier la tâche</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ $task->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="statut" class="form-label">Statut</label>
            <select name="statut" class="form-select">
                <option value="a_faire" {{ $task->statut == 'a_faire' ? 'selected' : '' }}>A faire</option>
                <option value="en_cours" {{ $task->statut == 'en_cours' ? 'selected' : '' }}>En cours</option>
                <option value="termine" {{ $task->statut == 'termine' ? 'selected' : '' }}>Terminée</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
