<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="{{ asset('css/action_style.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Modifier le groupe</title>
    <style>
        h1 {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 40px;
        }
        body{
            background-color: #bbecf3;
        }
    </style>
</head>
<body>
<h1>Modifier le groupe</h1>
<div class="form-container">
    <form action="{{ route('encadrant.update', $encadrant->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ $encadrant->nom }}">
            @error('nom')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" class="form-control" value="{{ $encadrant->prenom }}">
            @error('prenom')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $encadrant->email }}">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="text" name="telephone" id="telephone" class="form-control" value="{{ $encadrant->telephone }}"><br>
            @error('telephone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="btn-container">
            <a href="{{ route('encadrant.index') }}" class="btn btn-secondary">Retour</a>
            <button type="submit" class="btn btn-primary" onclick="showSuccessMessage()">Modifier</button>
        </div>
    </form>
</div>
</body>
</html>
