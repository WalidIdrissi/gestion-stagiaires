<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    h1{
        text-align: center
    }
    .div1{
        display: flex;
        justify-content: center;
    }
</style>
<title>Modifier le stagiaire</title>
<h1>Modifier le stagiaire</h1>
<br>
<div class="div1">
<form action="{{ route('stagiaire.update', $stagiaire->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-stagiaire">
        <select name="demande_id" id="demande_id" class="form-control" placeholder="demande_id" value="{{ $stagiaire->demande->id }}">
            @foreach($demandes as $demande)
                <option value="{{ $demande->id }}">{{ $demande->nom }} {{ $demande->prenom }}</option>
            @endforeach
        </select><br>

    @error('demande_id')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div><br>
    <a href="javascript:history.back()" class="btn btn-secondary">Retour</a>
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>
</div>

