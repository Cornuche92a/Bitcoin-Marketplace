@php $pagename = 'Abonnements' @endphp
@extends('layouts.backend')
@section('content')
@include('layouts.banner')

        <!-- Page Content -->

        <div class="content content-full content-boxed"><!-- New Arrivals -->
            <h2 class="content-heading">Les disponibilités</h2>
            <div class="row items-push">

                @foreach($categorydata as $categorysingle)
                <div class="col-md-6 col-xl-4 block-rounded block-link-pop">

                    <div class="block block-rounded h-100 mb-0 block-link-pop">
                        <div class="block-content p-1">
                            <div class="options-container">
                                <a class="block-rounded block-link-pop" href="{{ route('products.show',['categoryname' => $categorysingle->catname,'name' => $categorysingle->name]) }}">
                                <img class="img-fluid options-item" src="{{ asset('/assets/media/photos/')}}/{{$categorysingle->bannerurl}}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="mb-1">
                                <a class="h6" href="{{ route('products.show',['categoryname' => $categorysingle->catname,'name' => $categorysingle->name]) }}">{{$categorysingle->name}}</a>
                            </div>
                            <p class="fs-sm text-muted">{{$categorysingle->catname}}</p>

                        </div>
                    </div>
                    </a>

                </div>
                @endforeach

            </div>

            <!-- END New Arrivals -->


        </div>
        <!-- END Page Content -->

        <!-- Explore Store -->
        <div class="bg-body-dark">
            <div class="content content-full">
                <div class="my-5 text-center">
                    <h3 class="h4 mb-4">
                        Plus de <strong>10.000</strong> abonnements premium en vente !
                    </h3>
                    <a class="btn btn-primary px-4 py-2" href="{{route('products.type','abonnements')}}">
                        Découvrir les ventes <i class="fa fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- END Explore Store -->
        @stop
