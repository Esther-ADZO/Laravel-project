

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Informations Utilisateur</h1>

    <p><strong>Nom :</strong> {{ $user->name }}</p>
    <p><strong>Email :</strong> {{ $user->email }}</p>
    <p><strong>Rôle :</strong> {{ $user->role }}</p>
    <p><strong>Mot de passe :</strong> {{ $user->password }}</p>
    <p><strong>Créée le :</strong> {{ $user->created_at->format('d/m/Y H:i') }}</p>

    <a href="{{ route('users.index') }}" class="btn btn-secondary">Retour à la liste</a>
</div>
@endsection

