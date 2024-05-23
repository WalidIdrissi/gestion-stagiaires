<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3264/3264289.png">
    <title>Les demandes des stage</title>
    <style>
        body {
            background-color: #f8f9fa;
            background-color: skyblue;
            margin: 50px;
        }

        .image {
            border-radius: 10px;
            padding: 10px;
            text-align: center;
        }
        .image img {
            border-radius: 10px;
            width: 300px;
        }
        .info {
            margin-top: 20px;
            padding: 20px;
            border-radius: 10px;
            background-color: white;
        }
        .info h5 {
            text-align: center;
            margin-bottom: 20px;
        }
        .info p {
            margin-bottom: 10px;
        }
        .info .right-aligned {
            text-align: right;
        }
        .footer {
            padding: 5px;
            background-color: #f1f1f1;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            text-align: center;
        }

        .footer a {
            margin: 2px;
            text-decoration: none;
        }

        .additional-info {
            display: flex;
            justify-content: space-between;
        }

        .additional-info .right {
            text-align: right;
        }
        .additional-info {
            display: flex;
            justify-content: space-between;
        }

        .left, .right {
            flex-basis: 48%;
        }

        .vertical-line {
            width: 1px;
            background-color: #ccc;
            margin: 0 10px;
        }

    </style>
</head>
<body>
    <br>
    <a href="{{ route('demande.index') }}" class="btn btn-secondary" style="margin-left: 350px">Retour</a>
    <div class="content">
        <div class="image">
            <img src="{{ asset('uploads/photo/' .$demande->photo) }}" alt="Photo de stagiaire">
        </div>
        <div class="info">
            <h5>{{ $demande->nom }} {{ $demande->prenom }}</h5>
            <div class="additional-info">
                <div class="left">
                    <p><strong>Adresse:</strong> {{ $demande->adresse }}</p>
                    <p><strong>Ville:</strong> {{ $demande->ville }}</p>
                    <p><strong>Email:</strong> {{ $demande->email }}</p>
                    <p><strong>Téléphone:</strong> {{ $demande->telephone }}</p>
                </div><div class="vertical-line"></div>
                <div class="right">
                    <p><strong>École:</strong> {{ $demande->ecole }}</p>
                    <p><strong>Date de début:</strong> {{ $demande->date_debut }}</p>
                    <p><strong>Date de fin:</strong> {{ $demande->date_fin }}</p>
                    <p><strong>Formateur:</strong> {{ $demande->formateur }}</p>
                </div>
            </div><br>
            <div class="footer">
                @if($demande->demande_stage)
                    <a href="{{ asset('uploads/demande_stage/' .$demande->demande_stage) }}" class="btn btn-link">Voir demande stage</a><br>
                @else
                    <span class="text-danger">Pas de fichier demande stage</span>
                @endif
                @if($demande->attestation_assurance)
                    <a href="{{ asset('uploads/attestation_assurance/' .$demande->attestation_assurance) }}" class="btn btn-link">Voir attestation assurance</a><br>
                @else
                    <span class="text-danger">Pas de fichier attestation assurance</span>
                @endif
                @if($demande->cv)
                    <a href="{{ asset('uploads/cv/' .$demande->cv) }}" class="btn btn-link">Voir CV</a>
                @else
                    <span class="text-danger">Pas de fichier CV</span>
                @endif
            </div>
            <form action="{{ route('demande.validate', $demande->id) }}" method="POST" id="validationForm_{{ $demande->id }}" style="text-align: center; margin-top: 10px;">
                @csrf
                @if($demande->statut !== 'valide')
                    <select name="status" data-original-value="en_cours" onchange="checkConfirmation('{{ $demande->id }}', this.value)">
                        <option value="en_cours" {{ $demande->statut == 'en_cours' ? 'selected' : '' }}>En cours</option>
                        <option value="valider" {{ $demande->statut == 'valider' ? 'selected' : '' }}>Valider</option>
                        <option value="annuler" {{ $demande->statut == 'annuler' ? 'selected' : '' }}>Annuler</option>
                    </select>
                @else
                    <span>{{ $demande->statut }}</span>
                @endif
            </form>
            <form action="{{ route('demande.destroy', $demande->id) }}" method="POST" id="deleteForm_{{ $demande->id }}" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
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
