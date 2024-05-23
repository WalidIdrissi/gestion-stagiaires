<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="{{ asset('css/action_style.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Ajouter une évaluation de stage</title>
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
<h1>Ajouter une évaluation de stage</h1>
<div class="form-container">
    <form action="{{ route('evaluations.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="stagiaire_id">Stagiaire</label>
            <select name="stagiaire_id" id="stagiaire_id" class="form-control">
                <option value="">Sélectionnez un stagiaire</option>
                @foreach ($stagiaires as $stagiaire)
                    <option value="{{ $stagiaire->id }}">{{ $stagiaire->getNomCompletAttribute() }}</option>
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
                @foreach ($encadrants as $encadrant)
                    <option value="{{ $encadrant->id }}">{{ $encadrant->nom }} {{ $encadrant->prenom }}</option>
                @endforeach
            </select>
            @error('encadrant_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="note_globale">Note<sub> /10</sub></label>
            <input type="number" name="note_globale" id="note_globale" class="form-control" step="0.01">
            @error('note_globale')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="date_evaluation">Date d'évaluation</label>
            <input type="date" name="date_evaluation" id="date_evaluation" class="form-control">
            @error('date_evaluation')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="commentaire">commentaire</label>
            <textarea id="commentaire" name="commentaire" rows="5" cols="33" class="form-control" placeholder="commentaire"></textarea>
            @error('commentaire')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="btn-container">
            <a href="{{ route('evaluations.index') }}" class="btn btn-secondary">Retour</a>
            <button type="submit" class="btn btn-success" onclick="showSuccessMessage()">Ajouter</button>
        </div>
    </form>
</div>
</body>
</html>
