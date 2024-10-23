<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Formations</title>
    <style>
        /* Basic page styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #d32f2f;
            font-size: 2rem;
        }

        /* Centering the content */
        .container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: black;
            color: white;
        }

        td {
            background-color: #fce4ec;
        }

        /* Styling table borders */
        table, th, td {
            border: 1px solid #d81b60;
        }

        /* Styling links (action buttons) */
        a {
            text-decoration: none;
            color: white;
            background-color: gray;
            padding: 8px 12px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #ad1457;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            table, th, td {
                font-size: 0.9rem;
            }

            h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <center><h1>La liste des Formations</h1></center>
        <table>
            <thead>
                <tr>
                    <th>Id Formation</th>
                    <th>Titre</th>
                    <th>Nombre d'heures</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($formations as $form)
                <tr>
                    <td>{{$form->idf}}</td>
                    <td>{{$form->titre}}</td>
                    <td>{{$form->nbrHeure}}</td>
                    <td>
                        <a href="{{route('formations.show', $form->idf)}}">Détails</a>
                        <a href="{{route('formations.destroy', $form->idf)}}">Supprimer</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
