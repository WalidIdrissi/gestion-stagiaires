<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3264/3264289.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Les demandes de stage</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 10px;
            overflow: hidden;
            word-wrap: break-word;
        }
        .card-title, .card-text {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100%;
        }
        .card-date{
            background-color: #f1f1f1;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            margin-bottom: 4px;
        }
    </style>
</head>
<body>
    @include('includes.menu')
    <div style="margin: 25px">
        @php
            $todayDemandes = App\Models\Demande::whereDate('created_at', today())->count();
        @endphp
        <h2>Les demandes de stage {{ App\Models\Demande::count() }}</h2><br>
        <h3>d'aujourd'hui {{ $todayDemandes }}</h3><br>
        <div class="div-table-container">
            <a href="{{ route('demande.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Ajouter une demande de stage</a>
            <input style="width: 200px;" type="text" name="rechercher" id="rechercher" class="form-control mx-auto" placeholder="Rechercher..."><br><br>
            @include('includes.message')

            <div class="card-container">
                @foreach($demandes as $value)

                <div class="card mt-5">
                    <div class="card-date">
                        <small>Demandé le: {{ \Carbon\Carbon::parse($value->created_at)->format('d/m/Y') }}</small>
                    </div>
                    <a href="{{ route('demande.show', $value->id) }}" class="image">
                        <img src="{{ asset('uploads/photo/' .$value->photo) }}" alt="Photo de stagiaire" class="card-img-top img">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $value->nom }} {{ $value->prenom }}</h5>
                        <p class="card-text"><strong>Email:</strong> {{ $value->email }}</p>
                        <p class="card-text"><strong>Téléphone:</strong> {{ $value->telephone }}</p>
                        <p class="card-text"><strong>Date de début:</strong> {{ $value->date_debut }}</p>
                        <p class="card-text"><strong>Date de fin:</strong> {{ $value->date_fin }}</p>
                    </div>
                    <div class="card-footer">
                        @if($value->cv)
                            <a href="{{ asset('uploads/cv/' .$value->cv) }}">Voir CV</a>
                        @else
                            <span class="text-danger">Pas de fichier CV</span>
                        @endif
                        <form action="{{ route('demande.validate', $value->id) }}" method="POST" id="validationForm_{{ $value->id }}" style="text-align: center; margin-top: 10px;">
                            @csrf
                            @if($value->statut !== 'valide')
                                <select name="status" data-original-value="en_cours" onchange="checkConfirmation('{{ $value->id }}', this.value)">
                                    <option value="en_cours" {{ $value->statut == 'en_cours' ? 'selected' : '' }}>En cours</option>
                                    <option value="valider" {{ $value->statut == 'valider' ? 'selected' : '' }}>Valider</option>
                                    <option value="annuler" {{ $value->statut == 'annuler' ? 'selected' : '' }}>Annuler</option>
                                </select>
                            @else
                                <span>{{ $value->statut }}</span>
                            @endif
                        </form>
                        <form action="{{ route('demande.destroy', $value->id) }}" method="POST" id="deleteForm_{{ $value->id }}" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const input = document.getElementById("rechercher");
            const cards = document.querySelectorAll(".card");

            input.addEventListener("input", function() {
                const searchTerm = input.value.toLowerCase();

                cards.forEach(function(card) {
                    const cardHeader = card.querySelector(".card-body").textContent.toLowerCase();

                    if (cardHeader.includes(searchTerm)) {
                        card.style.display = "block";
                    } else {
                        card.style.display = "none";
                    }
                });
            });
        });

        function checkConfirmation(id, selectedValue) {
            var selectElement = document.querySelector(`#validationForm_${id} select[name='status']`);
            var originalValue = selectElement.getAttribute('data-original-value');

            if (selectedValue === 'valider') {
                if (confirm('Voulez-vous valider oui/non ?')) {
                    document.getElementById('validationForm_' + id).submit();
                } else {
                    selectElement.value = originalValue;
                }
            } else if (selectedValue === 'annuler') {
                if (confirm('Voulez-vous annuler oui/non ?')) {
                    document.getElementById('deleteForm_' + id).submit();
                } else {
                    selectElement.value = originalValue;
                }
            }
        }
    </script>
</body>
</html>
