<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    h1{
        text-align: center
    }
    div{
        display: flex;
        justify-content: center;
    }
</style>
<title>Modifier le groupe</title>
<h1>Modifier le groupe</h1>
<br>
<div>
<form action="{{ route('encadrant.update', $encadrant->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="nom" id="nom" class="form-control" value="{{ $encadrant->nom }}"><br>
    @error('nom')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" name="prenom" id="prenom" class="form-control" value="{{ $encadrant->prenom }}"><br>
    @error('prenom')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="email" name="email" id="email" class="form-control" value="{{ $encadrant->email }}"><br>
    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" name="telephone" id="telephone" class="form-control" value="{{ $encadrant->telephone }}"><br>
    @error('telephone')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <a href="javascript:history.back()" class="btn btn-secondary">Retour</a>
    <button type="submit" class="btn btn-primary" onclick="showSuccessMessage()">Modifier</button>
</form>
</div>

