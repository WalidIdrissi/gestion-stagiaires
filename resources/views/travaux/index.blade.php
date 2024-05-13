
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3264/3264289.png">
    <title>Liste des travaux</title>
    <style>
        .div-table-container {
            width: 90%; /* Largeur maximale du conteneur */
            overflow-x: auto; /* Ajoute une barre de défilement horizontale si nécessaire */
            white-space: nowrap;
            background-color:#35C5DB;
            margin: auto;
            width: 90%;
            padding: 40px;
            border-radius: 5px;
            position: relative;
            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    @include('includes.menu')
    <div style="margin: 25px">
        <h2>Les travaux {{ App\Models\Travaux::count() }}</h2><br>
        <div class="div-table-container">
            <a href="{{ route('travaux.create') }}" class="btn btn-success">Ajouter un travaux</a>
            <input style="width: 200px;" type="text" name="rechercher" id="rechercher" class="form-control mx-auto" placeholder="Rechercher..."><br><br><br>
            @include('includes.message')
            <table class="table table-hover">
                <thead class="thead-blue">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Projet</th>
                        <th scope="col">Stagiaires</th>
                        <th scope="col">Encadrant</th>
                        <th scope="col">Date debut</th>
                        <th scope="col">Date fin</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($travaux as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->projet }}</td>
                        <td>{{ $value->stagiaire->demande->nom }} {{ $value->stagiaire->demande->prenom }}</td>
                        <td>{{ $value->encadrant->nom }} {{ $value->encadrant->prenom }}</td>
                        <td>{{ $value->stagiaire->demande->date_debut }}</td>
                        <td>{{ $value->stagiaire->demande->date_fin }}</td>
                        <td>{{ $value->description }}</td>
                        <td>
                            <span>
                                <form action="{{ route('travaux.destroy', $value->id) }}" method="POST" onsubmit="return confirm('Vous voulez supprimer oui/non ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                                &nbsp;
                                <a href="{{ route('travaux.edit', $value->id) }}" class="btn btn-primary" style="height: 30px"><i class="fas fa-edit"></i></a>
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const input = document.getElementById("rechercher");
        const rows = document.querySelectorAll("tbody tr");

        input.addEventListener("input", function() {
            const searchTerm = input.value.toLowerCase();

            rows.forEach(function(row) {
                const Name = row.querySelector("td:nth-child(2)").textContent.toLowerCase();

                if (Name.includes(searchTerm)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    });
</script>
