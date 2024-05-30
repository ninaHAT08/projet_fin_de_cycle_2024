<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification d'Affectation de Sujet</title>
</head>
<body>
    <div>
        @if ($user->etat && $user->sujet)
            <h2>Congratulations!</h2>
            <p>Vous avez été affecté à un sujet:</p>
            <p><strong>Titre du Sujet:</strong> {{ $user->sujet->titre }}</p>
            @if ($user->sujet && $user->sujet->user)
    <p><strong>Proposé par:</strong> {{ $user->sujet->user1->nom }} {{ $user->sujet1->user1->prenom }}</p>
@else
    <p>Proposé par: Utilisateur non défini</p>
@endif
            
            <p><strong>État d'affectation:</strong> Affecté</p>
        @else
            <p>Vous n'avez pas encore été affecté à un sujet.</p>
        @endif
    </div>
</body>
</html>