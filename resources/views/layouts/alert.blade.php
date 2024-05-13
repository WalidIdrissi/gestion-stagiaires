{{-- @if($errors->any())
        <div class="row my-4">
            <div class="col-md-6 mx-auto">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{$error}}
                    </div>
                @endforeach
            </div>
        </div>
@endif --}}

@if($errors->any())
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger login-error">
                    @if ($error === 'These credentials do not match our records.')
                        Ces identifiants ne correspondent pas à nos enregistrements.
                    @else
                        {{ $error }}
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endif
