@php $pagename = 'Mes achats' @endphp
@extends('layouts.backend')
@section('content')

    <div class="bg-image" style="background-image: url('{{ asset('/assets/media/photos/')}}/background_orders.jpeg')">


        <div class="bg-primary-dark-op">

            <div class="content content-full text-center py-6">
                <h1 class="h2 text-white mb-2">Mes abonnements</h1>

            </div>
            @if(session('sent'))
                <div class="toast-container position-absolute top-0 end-0 p-3">
                    <!-- Toast Example 1 -->
                    <div id="messagesent" class="toast fade hide" data-delay="4000" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <i class="si si-bubble text-primary me-2"></i>
                            <strong class="me-auto">Support</strong>
                            <small class="text-muted">à l'instant</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            {{session('sent')}}
                        </div>
                    </div>
                    <!-- END Toast Example 1 -->
                </div>
            @endif

            @if(session('unsent'))
            <!-- Toast Example 1 -->
                <div class="toast-container position-absolute top-0 end-0 p-3">
                    <div id="messageunsent" class="toast fade hide" data-delay="4000" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <i class="si si-bubble text-danger me-2"></i>
                            <strong class="me-auto">Erreur</strong>
                            <small class="text-muted">à l'instant</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            {{session('unsent')}}                    </div>
                    </div>
                    <!-- END Toast Example 1 -->
                </div>
            @endif
        </div>

    </div>
    @if($orders->isEmpty())


        <!-- Explore Store -->
        <div class="bg-body-dark">
            <div class="content content-full">
                <div class="my-5 text-center">
                    <h5> Aucun abonnement actif :( mais ...</h5>
                    <h3 class="h4 mb-4">
                        Découvrez plus de <strong>10.000</strong> Abonnements en vente !
                    </h3>
                    <a class="btn btn-primary px-4 py-2" href="{{route('products.type','abonnements')}}">
                        Découvrir les ventes <i class="fa fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    @else

        <div class="content">
            <div class="row">

                @foreach($orders as $order)

                    <div class="col-md-3 text-center">
                        <!-- Developer Plan -->
                        <a class="block block-rounded text-center" >
                            <div class="block-header">
                                <h3 class="block-title">{{$order->log->category->name}}</h3>
                            </div>
                            <div class="py-1">
                                <img class="img-fluid" src="{{asset('assets/media/photos/')}}/{{$order->log->category->bannerurl}}" alt="" onclick="location.href = '/cart/{{$order->log->category->catname}}/{{$order->log->category->name}}'">
                            </div>
                            <div class="block-content">
                                <div class="fs-sm py-2">
                                    <p>
                                        <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill {{$order->state->style}}">{{$order->state->name}}</span></p>
                                    </p>
                                    <p>
                                        <strong>Identifiant</strong>
                                    </p>
                                    <p class="fw-semibold fs-sm" style="font-family: monospace">
                                        {{$order->log->username_email_log}}
                                    </p>
                                    <p>
                                        <strong>Mot de passe</strong>
                                    </p>
                                    <p class="fw-semibold fs-sm" style="font-family: monospace">
                                        {{$order->log->password_pin_log}}
                                    </p>
                                </div>
                            </div>
                            <div class="block-content block-content-full bg-body-light" >
                                <span class="btn rounded-0 btn-primary px-4" type="button" data-bs-toggle="modal" data-bs-target="#modal-block-small-{{$order->id}}"><i class="fa fa-fw fa-exclamation-triangle"></i> </span>
                            </div>
                        </a>
                        <!-- END Developer Plan -->
                    </div>



                @endforeach
            </div>
            <!-- END Modern Design -->

        </div>

    @endif


@stop
