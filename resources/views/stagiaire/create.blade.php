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
<title>Ajouter stagiaire</title>
<h1>Ajouter stagiaire</h1>
<br>
<div class="div1">

<form action="{{ route('stagiaire.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-module">
        <select name="demande_id" id="demande_id" class="form-control" placeholder="demande_id">
            <option value="">Sélectionnez une demande</option>
            @foreach($demandes as $value)
                <option value="{{ $value->id }}">{{ $value->nom }} {{ $value->prenom }}</option>
            @endforeach
        </select><br>
        @error('demande_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div><br>
    <a href="javascript:history.back()" class="btn btn-secondary">Retour</a>
    <button type="submit" class="btn btn-success">Ajouter</button>
</form>
</div>

