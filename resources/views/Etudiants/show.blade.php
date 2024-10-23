<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Étudiants</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        h1 {
            background-color: rebeccapurple;
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
        }
        .section-title {
            margin-top: 20px;
            color: rebeccapurple;
            text-align: center;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <!-- Student Information Section -->
        <h1>Les Informations de l'Étudiant</h1>
        <div class="card">
            <div class="card-body">
                <h4>Code E : <span class="text-muted">{{ $etudiant->codeE }}</span></h4>
                <h4>Nom d'étudiant : <span class="text-muted">{{ $etudiant->nom }}</span></h4>
                <h4>Prénom d'étudiant : <span class="text-muted">{{ $etudiant->prenom }}</span></h4>
                <h4>Date de Naissance : <span class="text-muted">{{ $etudiant->dateNaissance }}</span></h4>
                <h4>Adresse : <span class="text-muted">{{ $etudiant->addresse }}</span></h4>
            </div>
        </div>

        <!-- Class Information Section -->
        <h2 class="section-title">Sa Classe</h2>
        <div class="card">
            <div class="card-body">
                <h4>Id : <span class="text-muted">{{ $classe->idc }}</span></h4>
                <h4>Libellé : <span class="text-muted">{{ $classe->libelle }}</span></h4>
                <h4>Nombre Maximum d'Étudiants : <span class="text-muted">{{ $classe->NombreMax }}</span></h4>
            </div>
        </div>

        <!-- Formation Information Section -->
        <h2 class="section-title">Sa Formation en Cours</h2>
        <div class="card">
            <div class="card-body">
                <h4>Id Formation : <span class="text-muted">{{ $formation->idf }}</span></h4>
                <h4>Titre de la Formation : <span class="text-muted">{{ $formation->titre }}</span></h4>
                <h4>Nombre d'Heures de Formation : <span class="text-muted">{{ $formation->nbrHeure }}</span></h4>
            </div>
        </div>

        <!-- Avis Section -->
        <h2 class="section-title">Les Avis</h2>
        @if(count($av) > 0)
            @foreach($av as $f)
                <div class="card">
                    <div class="card-body">
                        <h4>Id Formation : <span class="text-muted">{{ $f->idf }}</span></h4>
                        <h4>Points Donnés : <span class="text-muted">{{ $f->pivot->points }}</span></h4>
                    </div>
                </div>
            @endforeach
        @else
            <div class="alert alert-warning text-center">
                <p>Pas d'avis disponible.</p>
            </div>
        @endif
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
