@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Liste des tâches</h1>

    <a href="{{ route('tasks.create') }}" class="inline-block mb-6 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
        + Créer une nouvelle tâche
    </a>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded shadow-sm">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Titre</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Description</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Statut</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($tasks as $task)
                <tr>
                    <td class="px-6 py-4 text-sm text-gray-800">{{ $task->title }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $task->description }}</td>
                    <td class="px-6 py-4 text-sm">
                        @if($task->statut == 'a_faire')
                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded text-xs">A faire</span>
                        @elseif($task->statut == 'en_cours')
                            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded text-xs">En cours</span>
                        @else
                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded text-xs">Terminée</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm space-x-2">
                        <a href="{{ route('tasks.show', $task->id) }}" class="text-blue-600 hover:underline">Voir</a>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="text-yellow-600 hover:underline">Éditer</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE') 
                            <button class="text-red-600 hover:underline" onclick="return confirm('Supprimer cette tâche ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
