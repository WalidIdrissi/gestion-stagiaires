
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
    <title>Tous les stagiaires</title>
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
        .table td.document-link {
            /* border-bottom: 2px solid #35C5DB; */
            padding: 10px;
        }
        .table td.document-link:hover {
            border-bottom:2px solid #dee2e6;
        }
    </style>
</head>
<body>
    @include('includes.menu')
    <div style="margin: 25px">
        <h2>Les stagiaires {{ App\Models\Stagiaire::count() }}</h2><br>
        <div class="div-table-container">
            <div class="div-tabl">
                {{-- <a href="{{ route('stagiaire.create')}}" class="btn btn-success">Ajouter stagiaire</a> --}}
                <input style="width: 200px;" type="text" name="rechercher" id="rechercher" class="form-control mx-auto" placeholder="Rechercher..."><br><br><br>
                <br>
                @include('includes.message')
                <table class="table table-hover">
                    <thead class="thead-blue">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Adresse</th>
                            <th scope="col">Ville</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Ecole</th>
                            <th scope="col">Demande stage</th>
                            <th scope="col">Attestation assurance</th>
                            <th scope="col">Photo</th>
                            <th scope="col">CV</th>
                            <th scope="col">Date debut</th>
                            <th scope="col">Date fin</th>
                            <th scope="col">Formateur</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stagiaires as $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->demande->nom }}</td>
                            <td>{{ $value->demande->prenom }}</td>
                            <td>{{ $value->demande->adresse }}</td>
                            <td>{{ $value->demande->ville }}</td>
                            <td>{{ $value->demande->email }}</td>
                            <td>{{ $value->demande->telephone }}</td>
                            <td>{{ $value->demande->ecole }}</td>
                            <td class="document-link">
                                @if($value->demande->demande_stage) <b><a href="{{ asset('uploads/demande_stage/' .$value->demande->demande_stage) }}" style="text-decoration: none;color:black;">Vois demande stage</a></b> @else <b style="text-decoration: none;color:red;">pas de fichier</b> @endif
                            </td>
                            <td class="document-link">
                                @if($value->demande->attestation_assurance) <b><a href="{{ asset('uploads/attestation_assurance/' .$value->demande->attestation_assurance) }}" style="text-decoration: none;color:black;">Vois attestation assurance</a></b> @else <b style="text-decoration: none;color:red;">pas de fichier</b> @endif
                            </td>
                            <td><img src="{{ asset('uploads/photo/' .$value->demande->photo) }}" alt="Photo de stagiaire" width="50px"></td>
                            <td class="document-link">
                                @if($value->demande->cv) <b><a href="{{ asset('uploads/cv/' .$value->demande->cv) }}" style="text-decoration: none;color:black;">Vois CV</a></b> @else <b style="text-decoration: none;color:red;">pas de fichier</b> @endif
                            </td>
                            <td>{{ $value->demande->date_debut }}</td>
                            <td>{{ $value->demande->date_fin }}</td>
                            <td>{{ $value->demande->formateur }}</td>
                            <td>
                                <span>
                                    <form action="{{ route('stagiaire.destroy', $value->id) }}" method="POST" onsubmit="return confirm('Vous voulez supprimer oui/non ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                    {{-- &nbsp;
                                    <a href="{{ route('stagiaire.edit', $value->id) }}" class="btn btn-primary" style="height: 30px"><i class="fas fa-edit"></i></a> --}}
                                    &nbsp;
                                    <a href="{{ route('stagiaire.show', $value->id) }}" class="btn btn-secondary" style="height: 30px"><i class="fas fa-id-card"></i></a>
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- pagenation --}}
            </div>
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

