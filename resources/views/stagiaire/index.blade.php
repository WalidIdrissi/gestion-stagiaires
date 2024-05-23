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
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    @include('includes.menu')
    <div style="margin: 25px">
        <h2>Les stagiaires {{ App\Models\Stagiaire::count() }}</h2><br>
        <div class="div-table-container">
            <div class="div-tabl">
                <input style="width: 200px;" type="text" name="rechercher" id="rechercher" class="form-control mx-auto" placeholder="Rechercher..."><br><br><br>
                <br>
                @include('includes.message')
                <div class="card-container">
                @foreach($stagiaires as $value)
                <div class="content">
                    <div class="image">
                        <img src="{{ asset('uploads/photo/' .$value->demande->photo) }}" alt="Photo de stagiaire">
                    </div>
                    <div class="info">
                        <h5>{{ $value->demande->nom }} {{ $value->demande->prenom }}</h5>
                        <div class="additional-info">
                            <div class="left">
                                <p><strong>Adresse:</strong> {{ $value->demande->adresse }}</p>
                                <p><strong>Ville:</strong> {{ $value->demande->ville }}</p>
                                <p><strong>Email:</strong> {{ $value->demande->email }}</p>
                                <p><strong>Téléphone:</strong> {{ $value->demande->telephone }}</p>
                            </div><div class="vertical-line"></div>
                            <div class="right">
                                <p><strong>École:</strong> {{ $value->demande->ecole }}</p>
                                <p><strong>Date de début:</strong> {{ $value->demande->date_debut }}</p>
                                <p><strong>Date de fin:</strong> {{ $value->demande->date_fin }}</p>
                                <p><strong>Formateur:</strong> {{ $value->demande->formateur }}</p>
                            </div>
                        </div><br>
                        <div class="footer">
                            @if($value->demande->demande_stage)
                                <a href="{{ asset('uploads/demande_stage/' .$value->demande->demande_stage) }}">Voir demande stage</a><br>
                            @else
                                <span class="text-danger">Pas de fichier demande stage</span>
                            @endif
                            @if($value->demande->attestation_assurance)
                                <a href="{{ asset('uploads/attestation_assurance/' .$value->demande->attestation_assurance) }}">Voir attestation assurance</a><br>
                            @else
                                <span class="text-danger">Pas de fichier attestation assurance</span>
                            @endif
                            @if($value->demande->cv)
                                <a href="{{ asset('uploads/cv/' .$value->demande->cv) }}">Voir CV</a>
                            @else
                                <span class="text-danger">Pas de fichier CV</span>
                            @endif
                        </div>
                        <br>
                        <div class="action d-flex">
                            <a href="{{ route('stagiaire.edit', $value->id) }}" class="btn btn-primary" style="height: 30px"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('stagiaire.show', $value->id) }}" class="btn btn-secondary" style="height: 38px"><i class="fas fa-id-card"></i> Attestation de stage</a>
                            <form action="{{ route('stagiaire.destroy', $value->id) }}" method="POST" onsubmit="return confirm('Vous voulez supprimer oui/non ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const input = document.getElementById("rechercher");
        const cards = document.querySelectorAll(".content");

        input.addEventListener("input", function() {
            const searchTerm = input.value.toLowerCase();

            cards.forEach(function(card) {
                const cardText = card.querySelector(".info").textContent.toLowerCase();

                if (cardText.includes(searchTerm)) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        });
    });
</script>


