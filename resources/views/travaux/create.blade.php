<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    h1{
        text-align: center
    }
    .div1{
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<h1>Ajouter un travaux</h1>
<br>
<div class="div1">
<form action="{{ route('travaux.store') }}" method="POST">
    @csrf
    <div class="form-module">
        <input type="text" name="projet" id="projet" class="form-control" placeholder="Nom projet"><br>
        @error('projet')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <select name="stagiaire_id" id="stagiaire_id" class="form-control" placeholder="Stagiaire">
            <option value="">Sélectionnez un stagiaire</option>
            @foreach($stagiaires as $stagiaire)
                <option value="{{ $stagiaire->id }}">{{ $stagiaire->nomComplet }}</option>
            @endforeach
        </select><br>
        @error('stagiaire_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <select name="encadrant_id" id="encadrant_id" class="form-control" placeholder="encadrant_id">
            <option value="">Sélectionnez un encadrant</option>
            @foreach($encadrants as $value)
                <option value="{{ $value->id }}">{{ $value->nom }} {{ $value->prenom }}</option>
            @endforeach
        </select><br>
        @error('encadrant_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <textarea id="description" name="description" rows="5" cols="33" class="form-control" placeholder="description"></textarea>
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div><br>
    <a href="javascript:history.back()" class="btn btn-secondary">Retour</a>
    <button type="submit" class="btn btn-success">Ajouter</button>
</form>
</div>

