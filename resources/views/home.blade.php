
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
    <title>welcom</title>
</head>
<body>
    @include('includes.menu')

    <div style="margin: 25px;">

        <div class="card-container" style="margin-left: 18%">
            <div class="card col-md-6 offset-md-3" style="width: 18rem;">
                <div class="card-body" style="box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2);">
                  <h5 class="card-title"><p>Demandes de stage &nbsp; &nbsp; &nbsp; &nbsp; <i class="fas fa-book mr-1"></i></p></h5>
                  <h3 class="card-text">{{ App\Models\Demande::count() }}</h3>
                  <a href="{{ route('demande.index') }}" class="small-box-footer" style="text-decoration: none;">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <div class="footer" style="position: fixed;bottom: 0; width: 100%; text-align: center;">
            <p>&copy; Copyright WEBMARKO. Tous Les Droits Sont Réservés</p>
        </div>

    </div>
</body>
</html>
