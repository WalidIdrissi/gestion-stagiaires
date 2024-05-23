<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="{{ asset('css/action_style.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Ajouter une demande de stage</title>
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
<h1>Ajouter une demande de stage</h1>
<div class="form-container">
    <form action="{{ route('demande.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="col-md-6">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom">
            @error('nom')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Prénom">
            @error('prenom')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" id="adresse" class="form-control" placeholder="Adresse">
            @error('adresse')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="ville">Ville</label>
            <input type="text" name="ville" id="ville" class="form-control" placeholder="Ville">
            @error('ville')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="text" name="telephone" id="telephone" class="form-control" placeholder="Téléphone">
            @error('telephone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="ecole">École</label>
            <input type="text" name="ecole" id="ecole" class="form-control" placeholder="École">
            @error('ecole')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        </div>
        <div class="col-md-6">
        <div class="form-group">
            <label for="date_debut">Date de début</label>
            <input type="date" name="date_debut" id="date_debut" class="form-control">
            @error('date_debut')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="date_fin">Date de fin</label>
            <input type="date" name="date_fin" id="date_fin" class="form-control">
            @error('date_fin')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="formateur">Formateur</label>
            <input type="text" name="formateur" id="formateur" class="form-control" placeholder="Formateur">
            @error('formateur')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="demande_stage">Demande de Stage</label>
            <input type="file" name="demande_stage" id="demande_stage" class="form-control">
        </div>

        <div class="form-group">
            <label for="attestation_assurance">Attestation Assurance</label>
            <input type="file" name="attestation_assurance" id="attestation_assurance" class="form-control">
        </div>

        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo" class="form-control">
        </div>

        <div class="form-group">
            <label for="cv">CV</label>
            <input type="file" name="cv" id="cv" class="form-control">
        </div>

        </div>
        </div>

        <div class="btn-container">
            <a href="javascript:history.back()" class="btn btn-secondary">Retour</a>
            <button type="submit" class="btn btn-success">Ajouter</button>
        </div>

    </form>
</div>
</body>
</html>
