@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails de la tâche</h1>

    <p><strong>Titre :</strong> {{ $task->title }}</p>
    <p><strong>Description :</strong> {{ $task->description }}</p>
    <p><strong>Statut :</strong> {{ $task->statut }}</p>
    <p><strong>Créée le :</strong> {{ $task->created_at->format('d/m/Y H:i') }}</p>

    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Retour à la liste</a>
</div>
@endsection