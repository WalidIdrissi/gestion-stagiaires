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
    <title>Liste des groupes</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    @include('includes.menu')

        <div style="margin: 25px">
            <h2>Les évaluations {{ App\Models\Evaluation::count() }}</h2><br>
            <div class="div-table-container">
            <a href="{{ route('evaluations.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Ajouter une évaluation</a>
            <input type="text" name="rechercher" id="rechercher" class="form-control" placeholder="Rechercher..."><br><br><br>
            @include('includes.message')
            <table class="table table-hover">
                <thead class="thead-blue">
                    <tr>
                        {{-- <th>ID</th> --}}
                        <th>Stagiaire</th>
                        <th>Encadrant</th>
                        <th>Note<sub> /10</sub></th>
                        <th>Date d'évaluation</th>
                        <th>Commentaire</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            <tbody>
                @foreach ($evaluations as $value)
                    <tr>
                        {{-- <td>{{ $value->id }}</td> --}}
                        <td>{{ $value->stagiaire->getNomCompletAttribute() }}</td>
                        <td>{{ $value->encadrant->nom }} {{ $value->encadrant->prenom }}</td>
                        <td>{{ $value->note_globale }}</td>
                        <td>{{ $value->date_evaluation }}</td>
                        <td>{{ $value->commentaire }}</td>
                        <td>
                            <span>
                                <form action="{{ route('evaluations.destroy', $value->id) }}" method="POST" onsubmit="return confirm('Vous voulez supprimer oui/non ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="showSuccessMessage()"><i class="fas fa-trash"></i></button>
                                </form>
                                &nbsp;
                                <a href="{{ route('evaluations.edit', $value->id) }}" class="btn btn-primary " style="height: 30px"><i class="fas fa-edit"></i></a>
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const input = document.getElementById("rechercher");
    const rows = document.querySelectorAll("tbody tr");

    input.addEventListener("input", function() {
        const searchTerm = input.value.toLowerCase();

        rows.forEach(function(row) {
            const Name = row.querySelector("td:nth-child(1)").textContent.toLowerCase();

            if (Name.includes(searchTerm)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });
});
</script>
</body>
</html>
