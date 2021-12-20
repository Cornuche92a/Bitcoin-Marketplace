@php $pagename = 'Tableau de bord' @endphp
@extends('layouts.backend')
@section('content')

    <!-- Page Content -->
        <!-- Hero -->

        <div class="bg-image overflow-hidden" style="background-image: url('assets/media/photos/background_1.jpg'); width: auto">
            <div class="bg-primary-dark-op">
                <div class="content content-full">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-start">
                        <div class="flex-grow-1">
                            <h1 class="fw-semibold text-white mb-0">Bienvenue</h1>
                            <h2 class="h4 fw-normal text-white-75 mb-0">Divertissez vous à prix réduit</h2>
                        </div>
                        <div class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3">
                            <span class="d-inline-block">
                                <a class="btn btn-primary px-4 py-2 js-click-ripple-enabled" data-toggle="click-ripple" href="{{route('products.type','abonnements')}}" style="overflow: hidden; position: relative; z-index: 1;">
                                    <i class="fa fa-shopping-cart me-1 opacity-50"></i> Je découvre
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <!-- Overview -->
            <div class="row items-push">
                <div class="col-sm-6 col-xxl-3">
                    <!-- Pending Orders -->
                    <div class="block block-rounded d-flex flex-column h-100 mb-0">
                        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{\App\Models\Order::where('user_id','=',auth()->user()->id)->count()}}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Abonnements actifs</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class="fa fa-box-open fs-3 text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="{{route('orders')}}">
                                <span>Voir mes abonnements</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </div>
                    <!-- END Pending Orders -->
                </div>

                <div class="col-sm-6 col-xxl-3">
                    <div class="block block-rounded d-flex flex-column h-100 mb-0">
                        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{\App\Models\logs::where('available','=',1)->count()}}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Abonnements disponibles</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class="fa fa-box fs-3 text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="{{route('products.type','abonnements')}}">
                                <span>Découvrir</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="col-sm-6 col-xxl-3">
                    <div class="block block-rounded d-flex flex-column h-100 mb-0">
                        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{auth()->user()->amount}} €</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Solde</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class="fa fa-wallet fs-3 text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="{{route('payment.addfunds')}}">
                                <span>Ajouter des fonds</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="col-sm-6 col-xxl-3">
                    <div class="block block-rounded d-flex flex-column h-100 mb-0">
                        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">Contact</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Sur les réseaux</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class="si si-bubbles fs-3 text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="https://twitter.com/TheSpot">
                                <span>Contactez-nous</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </div>

                </div>
                @if(auth()->user()->admin==1)
                <div class="col-sm-6 col-xxl-3">
                    <div class="block block-rounded d-flex flex-column h-100 mb-0">
                        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{$received}} €</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Gains</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class="fa fa-wallet fs-3 text-primary"></i>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-6 col-xxl-3">
                    <div class="block block-rounded d-flex flex-column h-100 mb-0">
                        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{\App\Models\User::count()}}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Membres</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class="fa fa-user fs-3 text-primary"></i>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-6 col-xxl-3">
                    <div class="block block-rounded d-flex flex-column h-100 mb-0">
                        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{\App\Models\Order::count()}}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Ventes</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class="fa fa-shopping-cart fs-3 text-primary"></i>
                            </div>
                        </div>
                    </div>

                </div>
                    @endif

            </div>
            <!-- END Overview -->

            <!-- Recent Orders -->

            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">MES ACHATS</h3>
                </div>

                @if($orders->isEmpty())

                    <div class="block-content block-content-full">
                        <!-- Recent Orders Table -->
                        <div class="table-responsive">
                            <div class="my-5 text-center">
                                <h3 class="h4 mb-4">
                                    Plus de <strong>10.000</strong> Abonnements en vente !
                                </h3>
                                <a class="btn btn-primary px-4 py-2" href="{{route('products.type','abonnements')}}">
                                    Découvrir les ventes <i class="fa fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    </div>

                @else
                    <div class="block-content block-content-full">
                        <!-- Recent Orders Table -->
                        <div class="table-responsive">
                            <table class="table table-hover table-vcenter">
                                <thead>
                                <tr>
                                    <th class="text-center" style="width: 100px;">
                                        <i class="fa fa-box-open"></i>
                                    </th>
                                    <th class="d-none d-sm-table-cell">TYPE</th>
                                    <th>STATUT</th>
                                    <th class="d-none d-sm-table-cell text-end">QUAND</th>
                                    <th class="d-none d-sm-table-cell text-end">PRIX</th>
                                    <th class="text-center" style="width: 20px;">VOIR</th>

                                </tr>
                                </thead>


                                <tbody class="fs-sm">

                                @foreach($orders as $order)
                                    <script type="text/javascript">
                                        function copyid{{$order->id}}() {
                                            var button = document.getElementById("btnid{{$order->id}}");
                                            var copyText = document.getElementById("identifiant{{$order->id}}");
                                            copyText.select();
                                            document.execCommand("Copy");
                                            button.innerHTML = "<i class='fa fa-check'></i>";
                                        }
                                        function copypass{{$order->id}}() {
                                            var button = document.getElementById("btnpass{{$order->id}}");
                                            var copyText = document.getElementById("motdepasse{{$order->id}}");
                                            copyText.select();
                                            document.execCommand("Copy");
                                            button.innerHTML = "<i class='fa fa-check'></i>";
                                        }
                                    </script>
                                    <tr>
                                        <td class="text-center">
                                            <img class="img-avatar img-avatar48" style="height: {{$order->log->category->iconstylesize}}px" src="{{asset('assets/media/photos/')}}/{{$order->log->category->iconurl}}" alt="">
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a class="fw-semibold" href="/cart/{{$order->log->category->catname}}/{{$order->log->category->name}}">
                                                {{$order->log->category->name}}                  </a>
                                            <p class="fs-sm fw-medium text-muted mb-0">Premium</p>
                                        </td>

                                        <td>
                                            <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill {{$order->state->style}}">{{$order->state->name}}</span>
                                        </td>
                                        <td class="d-none d-sm-table-cell fw-semibold text-muted text-end">{{ \Carbon\Carbon::parse($order->created_at)->diffForHumans()}}</td>
                                        <td class="d-none d-sm-table-cell text-end">
                                            <strong>{{$order->log->category->price}} €</strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">

                                                <button type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="modal" data-bs-target="#modal-block-small-{{$order->id}}">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </div>

                                        </td>
                                    </tr>



                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @foreach($orders as $order)
                    <div class="modal" id="modal-block-small-{{$order->id}}" tabindex="-1" aria-labelledby="modal-block-small" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-sm text-center" role="document">
                            <div class="modal-content">
                                <div class="block block-rounded block-transparent mb-0">
                                    <div class="block-header block-header-default">
                                        <h3 class="block-title">IDENTIFIANTS</h3>
                                        <div class="block-options">
                                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </div>

                                    </div>
                                    <div class="my-3">
                                        <img class="img-avatar img-avatar-thumb" src="{{asset('assets/media/photos/')}}/{{$order->log->category->iconurl}}">
                                    </div>
                                    <h5 class="h5 text-white mb-0">{{$order->log->category->name}}</h5>

                                    <div class="row justify-content-center py-sm-3 ">
                                        <div class="col-sm-10 col-md-10">
                                            <div class="mb-4">
                                                <label class="form-label" for="identifiant{{$order->id}}">Identifiant</label>
                                                <div class="input-group">
                                                    <input readonly type="email" class="form-control" name="identifiant{{$order->id}}" id="identifiant{{$order->id}}" value="{{$order->log->username_email_log}}">
                                                    <button type="button" id="btnid{{$order->id}}" onclick="copyid{{$order->id}}()" class="btn btn-dark"><i class="far fa-copy"></i></button>
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label" for="motdepasse{{$order->id}}">Mot de passe</label>
                                                <div class="input-group">
                                                    <input readonly type="text" class="form-control" name="motdepasse{{$order->id}}" id="motdepasse{{$order->id}}" value="{{$order->log->password_pin_log}}">
                                                    <button type="button" id="btnpass{{$order->id}}" onclick="copypass{{$order->id}}()" class="btn btn-dark"><i class="far fa-copy"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="block block-rounded">
                                    </div>

                                    <div class="block-content block-content-full text-end bg-body">
                                        <button type="button" class="btn btn-sm btn-alt-secondary me-1" data-bs-dismiss="modal">Fermer</button>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif

    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">ACTUALITÉ</h3>
        </div>
        <div class="block-content">
                <ul class="timeline timeline-alt py-0">
                    @foreach($news as $new)
                        <li class="timeline-event">
                            <div class="timeline-event-icon bg-default">
                                <i class="fa fa-newspaper"></i>
                                @if(auth()->user()->admin == 1)
                                    <form action="{{route('news.delete')}}" method="POST">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{$new->id}}">
                                        <button name="action" type="submit" class="btn btn-alt-primary">
                                            <i class="fa fa-window-close"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                            <div class="timeline-event-block block">
                                <div class="block-header">
                                    <h3 class="block-title">{{$new->new_tittle}}</h3>
                                    <div class="block-options">
                                        <div class="timeline-event-time block-options-item fs-sm">
                                            {{ \Carbon\Carbon::parse($new->created_at)->diffForHumans()}}
                                        </div>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <p class="fw-semibold mb-2">
                                        {{$new->new_body}}
                                    </p>
                                </div>
                            </div>
                        </li>


                    @endforeach
                    @if(auth()->user()->admin == 1)
                            <div class="timeline-event-block block">


                                    <form action="{{route('news.add')}}" method="POST">
                                        {{csrf_field()}}
                                        <div class="block-content fs-sm">
                                            <input type="text" class="form-control" id="one-profile-edit-email" name="tittle" placeholder="Titre" >
                                            <textarea class="form-control" id="message" name="body" rows="4" placeholder="Corps de la news"></textarea>
                                        <button name="action" type="submit" class="btn btn-alt-primary">
                                            Ajouter
                                        </button>
                                        </div>

                                    </form>
                            </div>

                        @endif

                </ul>
        </div>
    </div>

        </div>

@stop
