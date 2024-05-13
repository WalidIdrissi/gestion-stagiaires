
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3264/3264289.png">
    <title>Tous les stagiaires</title>
    <style>
        .div-table-container {
            width: 70%;
            white-space: nowrap;
            margin: auto;
            padding: 40px;
            border-radius: 5px;
            position: relative;
            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
            background-image: url('{{ asset("images/th.jpg") }}');
            background-size: cover;
            background-position: center;
            margin-top:20px;
        }
        input[type="date"] {
            border: none;
            outline: none;
            background-color: transparent;
        }
    </style>
</head>
<body>

    <div style="margin: 25px">

        <a href="javascript:history.back()" class="btn btn-secondary" style="margin-left: 200px">Retour</a>
        <button onclick="printContent()" style="margin-left: 5px" class="btn btn-primary">Imprimer</button><br>

        <div class="div-table-container"  id="printContent">
            <div style="margin: 25px; display: flex; justify-content: space-between;">
                <img class="card-img-top" src="{{ asset('images/logo-header.png') }}" alt="loginIMG" style="width: 250px; height: 60px;">
                <div style="flex: 1; text-align: right;">
                    <p>Adresse: Avenue bir Anzarane résidence Nour ler<br>étage Bureau N9 Centre Ville Fès <br>Email: contact@webmarko.com <br>Téléphone: +212 661 51 11 83</p>
                </div>
            </div>
            <h1 style="display: flex; justify-content: center;">ATTESTATION DE STAGE</h1>
            <div style="display: flex; justify-content: center;">
                <hr style="border-color: rgb(0, 0, 0); height: 5px; width: 250px;">
            </div>
            <div style=" text-align: center;">
                <p>Je soussigné, Monsieur Mohamed RACHIDI, <br> fonction: Gérant de la société Webmarko.</p>
                <p>Atteste que le stagiaire: <b>{{ $stagiaire->demande->nom }} {{ $stagiaire->demande->prenom }}</b> <br> a effectué un stage dans notre entreprise en développement digital. <br> du {{ $stagiaire->demande->date_debut }} au {{ $stagiaire->demande->date_fin }}</p>
                <p>Nous délivrons la présente attestation pour servir et valoir ce que de droit.</p>
            </div>
            <div style=" margin: 25px; text-align: right;">
                <p>Fait à Fès, le: <input type="date" name="" id="" value="{{ date('Y-m-d') }}"><br>Signature et cachet de l'entreprise</p>
            </div>
            <div style="height: 150px"></div>
        </div>
    </div>



        <script>
        function printContent() {
            var content = document.getElementById('printContent').innerHTML;
            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write(content);
            printWindow.document.close();
            printWindow.print();
        }
        </script>
</body>
</html>



