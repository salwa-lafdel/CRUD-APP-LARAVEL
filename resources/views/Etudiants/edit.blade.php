<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changer la Classe de l'Étudiant</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <!-- Section for showing the old class -->
        <h1 class="text-danger mb-4">L'ancienne classe est :</h1>
        <ul class="list-group mb-4">
            <li class="list-group-item"><strong>Id:</strong> {{ $classe->idc }}</li>
            <li class="list-group-item"><strong>Libellé:</strong> {{ $classe->libelle }}</li>
            <li class="list-group-item"><strong>Nombre Max:</strong> {{ $classe->NombreMax }}</li>
        </ul>

        <!-- Form for selecting the new class -->
        <h2 class="mb-4">Choisir une nouvelle classe</h2>

        <form action="{{ route('etudiants.update', $etudiantFind->codeE) }}" method="post">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="idc" class="form-label">Nouvelle Classe</label>
                <select name="idc" id="idc" class="form-select">
                    @foreach($idfind as $id)
                        <option value="{{ $id->idc }}">{{ $id->idc }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Sauvegarder</button>
        </form>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
