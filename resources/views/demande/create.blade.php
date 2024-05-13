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
<title>Ajouter une demande de stage</title>
<h1>Ajouter une demande de stage</h1>
<br>
<div class="div1">

<form action="{{ route('demande.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-module">
        <input type="text" name="nom" id="nom" class="form-control" placeholder="nom"><br>
        @error('nom')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" name="prenom" id="prenom" class="form-control" placeholder="prenom"><br>
        @error('prenom')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" name="adresse" id="adresse" class="form-control" placeholder="adresse"><br>
        @error('adresse')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" name="ville" id="ville" class="form-control" placeholder="ville"><br>
        @error('ville')
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
        <input type="text" name="ecole" id="ecole" class="form-control" placeholder="ecole"><br>
        @error('ecole')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="demande_stage">demande_stage</label>
        <input type="file" name="demande_stage" id="demande_stage" class="form-control" placeholder="demande_stage"><br>
        <label for="attestation_assurance">attestation_assurance</label>
        <input type="file" name="attestation_assurance" id="attestation_assurance" class="form-control" placeholder="attestation_assurance"><br>
        <label for="photo">photo</label>
        <input type="file" name="photo" id="photo" class="form-control" placeholder="photo"><br>
        <label for="cv">cv</label>
        <input type="file" name="cv" id="cv" class="form-control" placeholder="cv"><br>
        <label for="date_debut">date debut</label>
        <input type="date" name="date_debut" id="date_debut" class="form-control" placeholder="date_debut"><br>
        @error('date_debut')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="date_fin">date fin</label>
        <input type="date" name="date_fin" id="date_fin" class="form-control" placeholder="date_fin"><br>
        @error('date_fin')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" name="formateur" id="formateur" class="form-control" placeholder="formateur"><br>
        @error('formateur')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        {{-- <label for="status">Statut</label><br>
        <input type="text" name="status" id="status" class="form-control" value="en_cours" readonly> --}}


    </div><br>
    <a href="javascript:history.back()" class="btn btn-secondary">Retour</a>
    <button type="submit" class="btn btn-success">Ajouter</button>
</form>
</div>

