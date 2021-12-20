@extends('layouts.header')
@section('content')


     <div class="p-sm-3 px-lg-4 px-xxl-5 py-lg-5">
            <h1 class="h2 mb-1">Réinitialisation</h1>
            <p class="fw-medium text-muted">
                Indiquez votre e-mail.
            </p>

            <!-- Reminder Form -->
            <!-- jQuery Validation (.js-validation-reminder class is initialized in js/pages/op_auth_reminder.min.js which was auto compiled from _js/pages/op_auth_reminder.js) -->
            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
            <form class="js-validation-reminder mt-4" action="{{ route('password.email') }}" method="POST" >
                {{csrf_field()}}
                <div class="mb-4">
                    <input type="text" class="form-control form-control-lg form-control-alt @error('email') is-invalid @enderror" id="reminder-credential" name="email" placeholder="E-mail">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                    @endif
                </div>
                <div class="row mb-4">
                    <div class="col-md-6 ">
                        <button type="submit" class="btn w-100 btn-alt-primary">
                            <i class="fa fa-fw fa-envelope me-1 opacity-50"></i> Envoyer
                        </button>
                    </div>
                </div>
            </form>
            <!-- END Reminder Form -->
@endsection
