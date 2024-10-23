<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechercher une Formation</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Animating the appearance of the table */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Fade-in animation on the table */
        .fade-in {
            animation: fadeIn 0.8s ease-in-out;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Additional padding for the container */
        .container {
            margin-top: 40px;
        }

        select.form-control {
            width: 300px;
            margin-bottom: 20px;
        }

        /* Table styling for better readability */
        table {
            margin-top: 20px;
        }

        /* Form layout styling */
        form {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Rechercher une Formation</h1>

        <!-- Search Form -->
        <form>
            <p>Choisir une Formation</p>
            <select name="idf" id="idFormation" class="form-control">
                @foreach($formations as $form)
                <option value="{{$form->idf}}">{{$form->idf}}</option>
                @endforeach
            </select>
        </form>

        <!-- Container for dynamically loaded data -->
        <div id="container"></div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Fetch and render data dynamically -->
    <script>
        let output = document.getElementById('container');
        let idf = document.getElementById('idFormation');

        idf.addEventListener('change', function () {
            let x = this.value;

            fetch(`/search/${x}`)
                .then(response => response.json())
                .then(data => {
                    let idf = data[0]['idf'];
                    let titre = data[0]['titre'];
                    let nombreHeure = data[0]['nbrHeure'];
                    let classes = data[0]['classes'];

                    let H = "";

                    H += "<h4>Details d'une formation</h4>";
                    H += "<p><strong>Id Formation:</strong> " + idf + "</p>";
                    H += "<p><strong>Titre:</strong> " + titre + "</p>";
                    H += "<p><strong>Nombre d'Heure:</strong> " + nombreHeure + "</p>";

                    if (classes.length !== 0) {
                        H += "<h4>Les classes pour cette formation</h4>";
                        H += "<p>Il y a " + classes.length + " classes</p>";
                        H += "<table class='table table-bordered table-hover fade-in'>";
                        H += "<thead class='thead-dark'><tr><th>#</th><th>Id</th><th>Libellé</th><th>Nombre Max</th><th>Inscrits</th></tr></thead>";
                        H += "<tbody>";

                        classes.forEach(function (c, index) {
                            H += "<tr>";
                            H += "<td>" + (index + 1) + "</td>";
                            H += "<td>" + c['idc'] + "</td>";
                            H += "<td>" + c['libelle'] + "</td>";
                            H += "<td>" + c['NombreMax'] + "</td>";
                            H += "<td>" + c['etudiants'].length + "</td>";
                            H += "</tr>";
                        });

                        H += "</tbody></table>";
                    } else {
                        H += "<p>Aucune classe pour la formation sélectionnée</p>";
                    }

                    // Insert the HTML into the container
                    output.innerHTML = H; 
                });
        });
    </script>
</body>
</html>
