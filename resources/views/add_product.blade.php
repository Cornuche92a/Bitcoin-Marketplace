@include('layouts.header')

@extends('master')

@section('add_product')
<form method="post" action="{{route('store_product')}}">
    {{csrf_field()}}
    <input type="text" name="log_name">
    <input type="text" name="username_email_log">
    <input type="text" name="password_pin_log">
    <input type="textarea" name="details_more">
    <input type="number" name="price" id="price" value=5>
    <button type="submit">Valider</button>
</form>

    @if($errors->any())

    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>

    @endif

@stop
