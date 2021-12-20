@php $pagename = 'Mon profil' @endphp
@extends('layouts.backend')
@section('content')
        <!-- Hero -->
        <div class="bg-image" style="background-image: url('{{asset('assets/media/photos/background_profile.jpeg')}}');">
            <div class="bg-primary-dark-op">
                <div class="content content-full text-center">
                    <div class="my-3">
                        <img class="img-avatar img-avatar-thumb" src="{{ asset('assets/media/avatars/'.auth()->user()->avatar()->select('avatar')->first()->avatar) }}" alt="">
                    </div>
                    <h1 class="h2 text-white mb-0">Modifier mon profil</h1>
                    <h2 class="h4 fw-normal text-white-75">
                        {{$getuserinfo->username}}
                    </h2>
                    <a class="btn btn-alt-secondary" href="{{route('dashboard')}}">
                        <i class="fa fa-fw fa-arrow-left text-danger"></i> Retour à l'accueil
                    </a>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content content-boxed">
            <!-- User Profile -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">éditer mon profil</h3>
                </div>
                <div class="block-content">
                    <form action="{{action('ProfileController@general')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row push">
                            <div class="col-lg-4">
                                <p class="fs-sm text-muted">
                                    Informations générales
                                </p>
                            </div>
                            <div class="col-lg-8 col-xl-5">
                                <div class="mb-4">
                                    <label class="form-label" for="one-profile-edit-email">Adresse e-mail</label>
                                    <input type="email" class="form-control" id="one-profile-edit-email" name="email" placeholder="Un nouveau mail ?" value="{{$getuserinfo->email}}">
                                </div>

                                <div class="col-lg-8 col-xl-5">
                                    <button type="submit" class="btn btn-alt-primary">
                                        Mettre à jour
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END User Profile -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">changer d'avatar</h3>
                </div>
                <div class="block-content">
                        <div class="row push">

                            <div class="mb-4">
                                <label class="form-label">Choisissez-vous ...</label>
                            </div>
                            <div class="row text-center">
                                @foreach(\App\Models\avatar::get() as $avatar)
                                    <div class="col-3">
                                    <form action="{{action('ProfileController@general')}}" method="POST" name="avatar{{$avatar->id}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="avatar" value="{{$avatar->id}}" >
                                        <a class="item item-link-pop item-circle bg-default text-white-75 mx-auto mb-3" data-toggle="theme" data-theme="default" onclick="window.document.avatar{{$avatar->id}}.submit()">
                                            <img class="img-avatar img-avatar-thumb" src="{{asset('assets/media/avatars/'.$avatar->avatar)}}">
                                        </a>
                                        </form>
                                </div>
                                @endforeach


                            </div>
                        </div>
                </div>
            </div>

            <!-- Change Password -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Changement de mot de passe</h3>
                </div>
                <div class="block-content">
                    <form action="{{action('ProfileController@password')}}" method="POST">
                        {{csrf_field()}}
                        <div class="row push">
                            <div class="col-lg-4">
                                <p class="fs-sm text-muted">
                                    Un bon moyen de garder son compte en sécurité
                                </p>
                            </div>
                            <div class="col-lg-8 col-xl-5">
                                <div class="mb-4">
                                    <label class="form-label" for="one-profile-edit-password">Mot de passe actuel</label>
                                    <input type="password" class="form-control" id="one-profile-edit-password" name="current_password">
                                </div>
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <label class="form-label" for="one-profile-edit-password-new">Nouveau mot de passe</label>
                                        <input type="password" class="form-control" id="one-profile-edit-password-new" name="new_password">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <label class="form-label" for="one-profile-edit-password-new-confirm">Confirmation</label>
                                        <input type="password" class="form-control" id="one-profile-edit-password-new-confirm" name="new_confirm_password">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <button type="submit" class="btn btn-alt-primary">
                                        Mettre à jour
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Change Password -->

        </div>
        <!-- END Page Content -->
    @stop
