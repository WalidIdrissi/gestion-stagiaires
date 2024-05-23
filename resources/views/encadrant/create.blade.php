<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="{{ asset('css/action_style.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Ajouter un encadrant</title>
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
<h1>Ajouter un encadrant</h1>
<div class="form-container">
    <form action="{{ route('encadrant.store') }}" method="POST">
        @csrf
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
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="text" name="telephone" id="telephone" class="form-control" placeholder="Téléphone"><br>
            @error('telephone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="btn-container">
            <a href="{{ route('encadrant.index') }}" class="btn btn-secondary">Retour</a>
            <button type="submit" class="btn btn-success" onclick="showSuccessMessage()">Ajouter</button>
        </div>
    </form>
</div>
</body>
</html>
