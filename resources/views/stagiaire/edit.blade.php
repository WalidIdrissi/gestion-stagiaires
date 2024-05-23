<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="{{ asset('css/action_style.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Modifier le stagiaire</title>
    <style>
        h1 {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 40px;
        }
        body{
            background-color: #bbecf3;
        }
        .form-container {
            margin: 0 auto;
            max-width: 950px;
            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2);
            margin-bottom: 2%;
        }
    </style>
</head>
<body>
    <h1>Modifier le stagiaire</h1>
    <div class="form-container">
        <form action="{{ route('stagiaire.update', $stagiaire->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" value="{{ $demande->nom }}">
                @error('nom')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" class="form-control" value="{{ $demande->prenom }}">
                @error('prenom')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" id="adresse" class="form-control" value="{{ $demande->adresse }}">
                @error('adresse')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="ville">Ville</label>
                <input type="text" name="ville" id="ville" class="form-control" value="{{ $demande->ville }}">
                @error('ville')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $demande->email }}">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" name="telephone" id="telephone" class="form-control" value="{{ $demande->telephone }}">
                @error('telephone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="ecole">École</label>
                <input type="text" name="ecole" id="ecole" class="form-control" value="{{ $demande->ecole }}">
                @error('ecole')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="date_debut">Date de début</label>
                <input type="date" name="date_debut" id="date_debut" class="form-control" value="{{ $demande->date_debut }}">
                @error('date_debut')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="date_fin">Date de fin</label>
                <input type="date" name="date_fin" id="date_fin" class="form-control" value="{{ $demande->date_fin }}">
                @error('date_fin')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="formateur">Formateur</label>
                <input type="text" name="formateur" id="formateur" class="form-control" value="{{ $demande->formateur }}">
                @error('formateur')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="demande_stage">Demande de Stage</label>
                <input type="file" name="demande_stage" id="demande_stage" class="form-control">
                @error('demande_stage')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="attestation_assurance">Attestation Assurance</label>
                <input type="file" name="attestation_assurance" id="attestation_assurance" class="form-control">
                @error('attestation_assurance')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" name="photo" id="photo" class="form-control">
                @error('photo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="cv">CV</label>
                <input type="file" name="cv" id="cv" class="form-control">
                @error('cv')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            </div>
            </div>
            <div class="btn-container">
                <a href="{{ route('stagiaire.index') }}" class="btn btn-secondary">Retour</a>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </form>
    </div>
</body>
</html>
