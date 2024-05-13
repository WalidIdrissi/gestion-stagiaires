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
<title>Ajouter un encadrant</title>
<h1>Ajouter un encadrant</h1>

<div>
    <form action="{{ route('encadrant.store') }}" method="POST">
        @csrf
        <input type="text" name="nom" id="nom" class="form-control" placeholder="nom"><br>
        @error('nom')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" name="prenom" id="prenom" class="form-control" placeholder="prenom"><br>
        @error('prenom')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="email" name="email" id="email" class="form-control" placeholder="email"><br>
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" name="telephone" id="telephone" class="form-control" placeholder="telephone"><br>
        @error('telephone')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <a href="javascript:history.back()" class="btn btn-secondary">Retour</a>
        <button type="submit" class="btn btn-success" onclick="showSuccessMessage()">Ajouter</button>
    </form>
</div>

