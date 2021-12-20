@extends('layouts.header')

@section('content')

    <h1 class="h2 mb-1">Connexion</h1>
    <p class="fw-medium text-muted">
        Découvrez les abonnements premium !
    </p>

    <form class="js-validation-signin" method="POST" action="{{ route('login') }} ">
        {{csrf_field()}}
        <div class="py-3">
            <div class="mb-4">

                <input type="text" class="form-control form-control-alt form-control-lg @error('email') is-invalid @enderror" id="login-username" name="email" value="{{ old('email') }}" placeholder="{{ __("E-mail") }}">
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                    </span>
                @endif
            </div>
            <div class="input-group">
                <input type="password" class="form-control form-control-alt form-control-lg @error('password') is-invalid @enderror" id="login-password" name="password" placeholder="{{ __('Mot de passe') }}"><button type="button" onclick="location.href='/password/reset';" class="btn btn-dark">Oublié</button></input>
            @if($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                    </span>
                @endif
            </div>
            <br>
            <div class="mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="login-remember" name="login-remember">
                    <label class="form-check-label" for="login-remember">Se souvenir de moi</label>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-6">
                <button type="submit" class="btn w-120 btn-alt-primary">
                    <i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i> Connexion
                </button>
            </div>
        </div>
    </form>
@endsection

