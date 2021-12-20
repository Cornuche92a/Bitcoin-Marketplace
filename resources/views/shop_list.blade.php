@php $pagename = 'Tout les abonnements' @endphp
@extends('layouts.backend')
@section('content')
    <div class="content content-full content-boxed">

    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Abonnements disponibles </h3>
        </div>
        <div class="block-content">
            <div class="row items-push">
                @foreach($categorys as $category)
                <div class="col-md-4">
                    <a class="block block-rounded block-bordered block-link-shadow h-100 mb-0" href="{{ route('products.show',['categoryname' => $category->catname,'name' => $category->name]) }}">
                        <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                            <div>
                                <div class="fw-semibold mb-1">{{$category->name}}</div>
                                <div class="fs-sm text-muted">({{$category->logs()->where(['available'=>1])->count()}})</div>
                            </div>
                            <div class="ms-3">
                                <img class="img-avatar" src="{{ asset('/assets/media/photos/')}}/{{$category->iconurl}}" alt="">
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
@stop
