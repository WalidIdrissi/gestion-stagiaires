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
<title>Modifier le rapporte</title>
<h1>Modifier le rapporte</h1>
<br>
<div class="div1">
<form action="{{ route('rapporte.update', $rapporte->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <select name="stagiaire_id" id="stagiaire_id" class="form-control" placeholder="stagiaire_id" >
            <option value="">Sélectionnez un stagiaire</option>
            @foreach($stagiaires as $stagiaire)
                <option value="{{ $stagiaire->id }}" @if($rapporte->stagiaire_id == $stagiaire->id) selected @endif>{{ $stagiaire->nomComplet }}</option>
            @endforeach
        </select><br>
        @error('stagiaire_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <textarea id="contenu" name="contenu" rows="5" cols="33" class="form-control" placeholder="contenu">{{ $rapporte->contenu }}</textarea><br>
        @error('contenu')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="file" name="fichiercontenu" id="fichiercontenu" class="form-control"><br>
        <a href="javascript:history.back()" class="btn btn-secondary">Retour</a>
        <button type="submit" class="btn btn-primary">Modifier</button>
</div>
</form>
</div>

