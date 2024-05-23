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
    <title>Liste des rapporte</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    @include('includes.menu')
    <div style="margin: 25px">
        <h2>Les rapporte {{ App\Models\Rapporte::count() }}</h2><br>
        <div class="div-table-container">
            <a href="{{ route('rapporte.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Ajouter un rapporte</a>
            <input style="width: 200px;" type="text" name="rechercher" id="rechercher" class="form-control mx-auto" placeholder="Rechercher..."><br><br><br>
            @include('includes.message')
            <table class="table table-hover">
                <thead class="thead-blue">
                    <tr>
                        {{-- <th scope="col">ID</th> --}}
                        <th scope="col">Stagiaire</th>
                        <th scope="col">Date</th>
                        <th scope="col">Contenu</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rapportes as $value)
                    <tr>
                        {{-- <td>{{ $value->id }}</td> --}}
                        <td>{{ $value->stagiaire->nom_complet }}</td>
                        <td>{{ $value->date }}</td>
                        <td>{{ $value->contenu }} <br>
                            @if($value->fichiercontenu)<b><a href="{{asset('uploads/fichiercontenu/'.$value->fichiercontenu)}}"style="text-decoration:none;color:black;">Vois le fichier</a></b>@else @endif
                        </td>
                        <td>
                            <span>
                                <form action="{{ route('rapporte.destroy', $value->id) }}" method="POST" onsubmit="return confirm('Vous voulez supprimer oui/non ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                                &nbsp;
                                <a href="{{ route('rapporte.edit', $value->id) }}" class="btn btn-primary" style="height: 30px"><i class="fas fa-edit"></i></a>
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
