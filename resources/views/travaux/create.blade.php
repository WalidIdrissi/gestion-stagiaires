<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="{{ asset('css/action_style.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Ajouter un travaux</title>
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
<h1>Ajouter un travaux</h1>
<div class="form-container">
    <form action="{{ route('travaux.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="projet">Nom projet</label>
            <input type="text" name="projet" id="projet" class="form-control" placeholder="Nom projet">
            @error('projet')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="stagiaire_id">Stagiaire</label>
            <select name="stagiaire_id" id="stagiaire_id" class="form-control">
                <option value="">Sélectionnez un stagiaire</option>
                @foreach($stagiaires as $stagiaire)
                    <option value="{{ $stagiaire->id }}">{{ $stagiaire->nomComplet }}</option>
                @endforeach
            </select>
            @error('stagiaire_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="encadrant_id">Encadrant</label>
            <select name="encadrant_id" id="encadrant_id" class="form-control">
                <option value="">Sélectionnez un encadrant</option>
                @foreach($encadrants as $value)
                    <option value="{{ $value->id }}">{{ $value->nom }} {{ $value->prenom }}</option>
                @endforeach
            </select>
            @error('encadrant_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="5" cols="33" class="form-control" placeholder="Description"></textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="btn-container">
            <a href="{{ route('travaux.index') }}" class="btn btn-secondary">Retour</a>
            <button type="submit" class="btn btn-success">Ajouter</button>
        </div>
    </form>
</div>
</body>
</html>
