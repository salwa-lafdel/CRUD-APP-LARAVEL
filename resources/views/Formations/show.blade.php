<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails d'une formation</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Basic Styling */
        h1 {
            background-color: gray;
            color: white;
            padding: 10px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 20px 0;
        }

        ul li {
            padding: 8px 0;
            font-size: 1.1rem;
        }

        /* Animations */
        .fade-in {
            opacity: 0;
            animation: fadeIn 1.5s ease forwards;
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        /* Hover effects for rows */
        table tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Custom Table Styling */
        .table th {
            background-color: rebeccapurple;
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>

<div class="container my-5 fade-in">
    <!-- Formation Details -->
    <h1>Détails d'une formation</h1>
    <ul>
        <li><strong>Id Formation :</strong> {{$formation->idf}}</li>
        <li><strong>Titre de Formation :</strong> {{$formation->titre}}</li>
        <li><strong>La Masse Horaire :</strong> {{$formation->nbrHeure}}</li>
    </ul>

    <!-- Classes List -->
    <h1>La liste des classes</h1>
    <p><strong>Le nombre total de classes de cette formation :</strong> {{count($classes)}}</p>
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Id</th>
                    <th>Libellé</th>
                    <th>Nombre Max</th>
                    <th>Nombre Inscrits</th>
                </tr>
            </thead>
            <tbody>
            @php $x = 1; @endphp
            @foreach($classes as $cls)
                <tr>
                    <td>{{$x}}</td>
                    <td>{{$cls->idc}}</td>
                    <td>{{$cls->libelle}}</td>
                    <td>{{$cls->NombreMax}}</td>
                    <td>{{count($cls->etudiants)}}</td>
                </tr>
                @php $x++; @endphp
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- Avis Section -->
    <h1>Les Avis</h1>
    @if(count($avis) > 0)
        @foreach($avis as $f)
            <h4><strong>Code E:</strong> {{$f->codeE}}</h4>
            <h4><strong>Les points donnés:</strong> {{$f->pivot->points}}</h4>
        @endforeach
    @else
        <p class="text-muted">Pas d'avis</p>
    @endif
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
