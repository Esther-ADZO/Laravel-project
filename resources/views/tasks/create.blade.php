@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6"> Créer une tâche</h1>

    <form action="{{ route('tasks.store') }}" method="POST" class="bg-white p-6 rounded shadow-sm space-y-6">
        @csrf

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Titre</label>
            <input type="text" name="title" id="title" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
            <textarea name="description" id="description" rows="4"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>

        <div>
            <label for="statut" class="block text-sm font-medium text-gray-700 mb-1">Statut</label>
            <select name="statut" id="statut"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="a_faire">À faire</option>
                <option value="en_cours">En cours</option>
                <option value="termine">Terminée</option>
            </select>
        </div>

       <div class="flex space-x-3 justify-end">
    <button type="submit"
        class="px-4 py-2 bg-gray-200 text-gray-800 text-sm font-medium rounded-md shadow-sm hover:bg-gray-300 transition">
        Enregistrer
    </button>

    <button type="reset"
        class="px-4 py-2 bg-gray-200 text-gray-800 text-sm font-medium rounded-md shadow-sm hover:bg-gray-300 transition">
        Annuler
    </button>

    <a href="{{ route('tasks.index') }}"
        class="px-4 py-2 bg-gray-100 text-gray-600 text-sm font-medium rounded-md shadow-sm hover:bg-gray-200 transition">
        Retour
    </a>
</div>

    </form>
</div>
@endsection
