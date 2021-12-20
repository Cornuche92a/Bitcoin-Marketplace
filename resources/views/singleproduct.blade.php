
@extends('layouts.backend')
@section('content')
@include('layouts.banner')

<!-- Page Content -->
@php($pagename = 'Comptes '.$getlogcat->name)
{{$placestatement=''}}


<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">les Abonnements {{$getlogcat->name}}</h3>
        <div class="block-options space-x-1">
            <div class="dropdown d-inline-block">
                <i class="fa fa-fw fa-box"></i>
                STOCK: {{$logslist->total()}}

                <div class="dropdown-menu dropdown-menu-md dropdown-menu-end fs-sm" aria-labelledby="dropdown-recent-orders-filters">
                    <a class="dropdown-item fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
                        Pending
                        <span class="badge bg-primary rounded-pill">20</span>
                    </a>
                    <a class="dropdown-item fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
                        Active
                        <span class="badge bg-primary rounded-pill">72</span>
                    </a>
                    <a class="dropdown-item fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
                        Completed
                        <span class="badge bg-primary rounded-pill">890</span>
                    </a>
                    <a class="dropdown-item fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
                        All
                        <span class="badge bg-primary rounded-pill">997</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="block-content block-content-full">
        <div class="table-responsive">
            <table class="table table-hover table-vcenter">
                <thead>
                <tr>
                    <th>Service</th>
                    <th class="d-none d-xl-table-cell">Nom</th>
                    <th>Statut</th>
                    <th class="text-end">Prix</th>
                </tr>
                </thead>
                <tbody class="fs-sm">
                @if($logslist->count() == 0)
                    <tr>
                        <td>
                            <a class="fw-semibold" href="javascript:void(0)">
                            </a>

                            <p class="fs-sm fw-medium text-muted mb-0"><img src="{{asset('/assets/media/photos/')}}/bad_smiley.png" style="height: 35px;"></p>
                        </td>
                        <td class="d-none d-xl-table-cell ">
                            <a class="fw-semibold"> Pas de disponibilités pour le moment. </a>
                        </td>
                        <td>
                            <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Indisponible</span>
                        </td>

                        <td class="text-end">

                                <button class="btn btn-success js-click-ripple-enabled" data-toggle="layout" data-action="header_loader_on" onclick="window.history.back();" style="overflow: hidden; position: relative; z-index: 1;">
                                    <strong><i class="fa fa-arrow-alt-circle-left"></i> Retour</strong>
                                </button>
                        </td>
                    </tr>

                @endif
                        @foreach($logslist as $log)

                            <tr>
                                <td>
                                    <a class="fw-semibold" href="javascript:void(0)">
                                    </a>

                                    <p class="fs-sm fw-medium text-muted mb-0"><img src="{{asset('/assets/media/photos/')}}/{{$log->category->iconurl}}" style="height: 45px;"></p>
                                </td>
                                <td class="d-none d-xl-table-cell ">
                                    <a class="fw-semibold" >{{$log->category->name}}</a>
                                </td>
                                <td>
                                    <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">Premium</span>
                                </td>

                                <td class="text-end">
                                    <form action="{{ action('ShopController@placeorder') }}" method="POST">
                                        {{csrf_field()}}
                                        <input type="hidden" name="productid" value="{{$log->id}}">
                                        <button type="submit" class="btn btn-success js-click-ripple-enabled" data-toggle="layout" data-action="header_loader_on" style="overflow: hidden; position: relative; z-index: 1;">
                                            <strong>{{$log->category->price}} <i class="fa fa-euro-sign"></i></strong>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="block-content block-content-full bg-body-dark">

        {!! $logslist->links() !!}

    </div>
</div>

<div class="bg-body-dark">
    <div class="content content-full">
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
@stop
