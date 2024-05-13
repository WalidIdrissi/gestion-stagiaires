{{-- @extends('layouts.app')

@section('title')
    welcome
@endsection


@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col-md-6 mw-auto">
                <div class="card">
                    <div class='card-header bg-light'>
                        <h3 class="p-2"> Welcome Back</h3>
                    </div>
                    <div class=card-body>
                        @guest
                            <a href="{{url('/login')}}" class="btn btn-outline-primary">login</a>
                        @endguest
                        @auth
                            <a href="{{url('/admin/home')}}" class="btn btn-outline-primary">Home</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
 --}}


 @extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<div class="container">
    <div class="row my-5">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3 class="p-2">Welcome Back</h3>
                </div>
                <div class="card-body">
                    @guest
                    <p class="text-center">Vous n'êtes pas connecté.</p>
                    <div class="text-center">
                        <a href="{{ url('/login') }}" class="btn btn-primary">Se connecter</a>
                    </div>
                    @endguest

                    @auth
                    <p class="text-center">Vous êtes connecté.</p>
                    <div class="text-center">
                        <a href="{{ url('/admin/home') }}" class="btn btn-primary">Accueil</a>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

