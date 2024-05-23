
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
{{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3264/3264289.png">
    <title>welcom</title>
    <style>
        body {
            background-color: #f8f9fa;
            background-image: url('{{ asset("images/istockphoto1.jpg") }}');
            background-size: cover;
            background-position: center;
        }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.2);
            color: #ffffff;
            padding: 10px 0;
            text-align: center;
            font-size: 15px;
            margin-left: -25px
        }
        .btn-primary {
            position: absolute;
            left: 37.8%;
            margin-top: 120px;
        }

    </style>
</head>
<body>
    @include('includes.menu')

    <div style="margin: 25px;">
        <div class="card-container" style="margin-left:17.5%; margin-top:5%;">
            <div class="card col-md-6 offset-md-3" style="width: 18rem;">
                <div class="card-body" style="box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2);">
                  <h5 class="card-title"><p>Demandes de stage &nbsp; &nbsp; &nbsp; &nbsp; <i class="fas fa-envelope"></i></p></h5>
                  <h3 class="card-text">{{ App\Models\Demande::count() }}</h3>
                  <a href="{{ route('demande.index') }}" class="small-box-footer" style="text-decoration: none;">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <a id="shareButton" href="{{ route('demande.create')}}" class="btn btn-primary" ><i class="fas fa-share"></i> Partager le lien de demande de stage </a>
        </div>

        <div class="footer" style="position: fixed;bottom: 0; width: 100%; text-align: center;">
            <p>&copy; Copyright WEBMARKO. Tous Les Droits Sont Réservés</p>
        </div>

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var createLink = document.getElementById('shareButton').href;
            document.getElementById('shareButton').addEventListener('click', function(event) {
                event.preventDefault();
                if (navigator.share) {
                    navigator.share({
                        title: 'Créer une demande de stage',
                        text: 'Cliquez sur le lien pour créer une demande de stage',
                        url: createLink
                    }).then(function() {
                        console.log('Partage réussi.');
                    }).catch(function(error) {
                        console.error('Erreur de partage:', error);
                    });
                } else {
                    alert('L\'API de partage n\'est pas prise en charge dans ce navigateur. Veuillez copier le lien et le partager manuellement.');
                }
            });
        });
    </script>
</body>
</html>
