<x-app-layout>
@extends('layout')

<div class="row" style="margin:20px;">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h2>Affectation des sujets</h2>
            </div>
            <div class="card">
                <div class="card-body" style="margin:20px;">
                    <div style="display: inline-block;" class="info-item">
                        <p style="font-size: 20px; color: black;"><strong>Nom:</strong> {{ Auth::user()->nom }}</p>
                        <p style="font-size: 20px; color: black;"><strong>Prénom:</strong> {{ Auth::user()->prenom }}</p>
                    </div>
                    <div style="display: inline-block;" class="info-item">
                        <p style="font-size: 20px; color: black;"><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if($choixs->isEmpty())
                            <p>Aucun sujet n'a été envoyé pour le moment.</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Titre</th>
                                        <th>Étudiant 1</th>
                                        <th>Spécialité Étudiant 1</th>
                                        <th>Binôme</th>
                                        <th>Spécialité Binôme</th>
                                        <th>Priorité</th>
                                        <th>Sujet Affecté</th>
                                        <th>Date de la Sélection</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($choixs as $choix)
                                        <tr>
                                            <td>{{ \App\Models\Sujet::find($choix->idSujet1)->titre }}</td>
                                            <td>{{ \App\Models\users::find($choix->idUser3)->nom }} {{ \App\Models\users::find($choix->idUser3)->prenom }}</td>
                                            <td>{{ \App\Models\users::find($choix->idUser3)->specialite }}</td>
                                            <td>
                                                @if ($choix->binome)
                                                    {{ \App\Models\users::find($choix->binome)->nom }} {{ \App\Models\users::find($choix->binome)->prenom }}
                                                @else
                                                    Aucun binôme
                                                @endif
                                            </td>
                                            <td>
                                                @if ($choix->binome)
                                                    {{ \App\Models\users::find($choix->binome)->specialite }}
                                                @else
                                                    Aucun binôme
                                                @endif
                                            </td>
                                            <td>{{ $choix->ordre }}</td>
                                            <td>
                                                <form action="{{ route('sujets.affecter', \App\Models\Sujet::find($choix->idSujet1)->idSujet) }}" method="POST">
                                                    @csrf
                                                    <div class="form-check form-switch">
                                                        <input type="checkbox" class="form-check-input" id="sujetAffecter{{ $choix->id }}" name="sujet_affecter" {{ \App\Models\Sujet::find($choix->idSujet1)->sujet_affecter ? 'checked' : '' }} >
                                                        <label class="form-check-label" for="sujetAffecter{{ $choix->id }}">{{ \App\Models\Sujet::find($choix->idSujet1)->sujet_affecter ? 'Affecté' : 'Non Affecté' }}</label>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>{{ $choix->date }}</td>
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
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const switches = document.querySelectorAll('.form-check-input');

        switches.forEach(switchElement => {
            switchElement.addEventListener('change', function() {
                const form = this.closest('form');
                const formData = new FormData(form);

                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    // Mettre à jour l'étiquette du switch si nécessaire
                    const switchLabel = form.querySelector('.form-check-label');
                    switchLabel.textContent = data.sujet_affecter ? 'Affecté' : 'Non Affecté';
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
            });
        });
    });
</script>
</x-app-layout>