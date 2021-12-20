@extends('layouts.header')

@section('content')
    <div class="p-sm-3 px-lg-4 px-xxl-5 py-lg-5">
        <h1 class="h2 mb-1">Inscription</h1>
    <!-- Sign In Form -->
    <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
    <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
    <form class="js-validation-signin" method="POST" action="{{ route('register') }}">
        {{csrf_field()}}
        <div class="py-3">
            <div class="mb-4">

                <input type="text" class="form-control form-control-alt form-control-lg @error('username') is-invalid @enderror" id="login-username" name="username" value="{{ old('username') }}" placeholder="{{ __("Nom d'utilisateur") }}">
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('username') }}</strong>
                                                        </span>
                @endif
            </div>
            <div class="mb-4">

                <input type="text" class="form-control form-control-alt form-control-lg @error('email') is-invalid @enderror" id="login-username" name="email" value="{{ old('email') }}" placeholder="{{ __("E-mail") }}">
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                @endif
            </div>
            <div class="mb-4">
                <input type="password" class="form-control form-control-alt form-control-lg @error('password') is-invalid @enderror" id="login-password" name="password" placeholder="{{ __('Mot de passe') }}">
                @if($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                    </span>
                @endif
            </div>
            <div class="mb-4">
                <input type="password" class="form-control form-control-alt form-control-lg @error('password') is-invalid @enderror" id="login-password" name="password_confirmation" placeholder="{{ __('Confirmez le mot de passe') }}">
            </div>
            <div class="mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="signup-terms" name="signup-terms" aria-describedby="signup-terms-error" required>
                    <label class="form-check-label" for="signup-terms">J'accorde les Conditions de vente et d'utilisation</label>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-6">
                <button type="submit" class="btn w-120 btn-alt-success">
                    <i class="fa fa-fw fa-plus me-1 opacity-50"></i> S'inscrire
                </button>
            </div>
        </div>
    </form>
    <!-- END Sign In Form -->
@endsection
