<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Formation</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Animating the headers */
        h1 {
            background-color: rebeccapurple;
            color: white;
            padding: 15px;
            text-align: center;
            animation: fadeInDown 1s ease-in-out;
        }

        /* Animating the table rows */
        table tbody tr {
            animation: slideIn 0.8s ease-in-out;
        }

        /* Fade-in animation */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Slide-in animation */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-100%);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Additional styling */
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 30px;
        }

        /* Table styling for better readability */
        table {
            margin-top: 20px;
            width: 100%;
        }

        .form-group {
            margin-bottom: 20px;
        }

        button {
            margin-top: 10px;
        }

        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Rechercher une Formation</h1>
        
        <!-- Search Form -->
        <form action="{{route('search.search')}}" method="post" class="form-inline">
            @csrf
            <div class="form-group">
                <label for="idf" class="mr-2">Choisir une Formation</label>
                <select name="idf" id="idf" class="form-control">
                    @foreach($formations as $form)
                    <option value="{{$form->idf}}">{{$form->idf}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary ml-3">Search</button>
        </form>

        <!-- If formation item is set -->
        @if(isset($item))
        
        <!-- Formation Details Table -->
        <table class="table table-bordered table-striped table-hover mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>Id Formation</th>
                    <th>Titre de Formation</th>
                    <th>Nombre d'Heures</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$item->idf}}</td>
                    <td>{{$item->titre}}</td>
                    <td>{{$item->nbrHeure}}</td>
                </tr>
            </tbody>
        </table>

        <!-- Classes Section -->
        @if(count($classes) > 0)
            <p>Le nombre Total de classe de cette formation : {{count($classes)}}</p>

            <h1>Classes</h1>

            <!-- Classes Table -->
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Libellé</th>
                        <th>Nombre Max</th>
                        <th>Nombre Inscrits</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($classes as $cls)
                    <tr>
                        <td>{{$cls->idc}}</td>
                        <td>{{$cls->libelle}}</td>
                        <td>{{$cls->NombreMax}}</td>
                        <td>{{count($cls->etudiants)}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-warning">Pas de classe pour cette formation.</div>
        @endif

        <!-- Avis Section -->
        <h1>Les Avis</h1>
        @if(count($avis) > 0)
            @foreach($avis as $f)
            <div class="alert alert-info">
                <h4>Code E: {{$f->codeE}}</h4>
                <h4>Les points données : {{$f->pivot->points}}</h4>
            </div>
            @endforeach
        @else
            <div class="alert alert-warning">Pas d'avis pour cette formation.</div>
        @endif

        @endif
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
