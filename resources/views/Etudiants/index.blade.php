<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Étudiants</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Styling the heading with animation */
        h1 {
            color: red;
            animation: fadeIn 2s ease-in-out;
        }

        /* Fade-in animation */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Hover effect for table rows */
        tr:hover {
            background-color: #f1f1f1;
            transition: background-color 0.3s ease;
        }

        /* Optional: Styling for action buttons */
        .action-btns a {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    @if(session()->has('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mt-5">
        <center>
            <h1>La liste des étudiants</h1>
        </center>

        <!-- Responsive table wrapper for mobile compatibility -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>CodeE</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Adresse</th>
                        <th>Date Naissance</th>
                        <th>Id Classe</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($etudiants as $etud)
                    <tr>
                        <td>{{ $etud->codeE }}</td>
                        <td>{{ $etud->nom }}</td>
                        <td>{{ $etud->prenom }}</td>
                        <td>{{ $etud->addresse }}</td>
                        <td>{{ $etud->dateNaissance }}</td>
                        <td>{{ $etud->idclasse }}</td>
                        <td class="action-btns">
                            <a href="{{ route('etudiants.show', $etud->codeE) }}" class="btn btn-info btn-sm">Details</a>
                            <a href="{{ route('etudiants.edit', $etud->codeE) }}" class="btn btn-warning btn-sm">Modifier</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
