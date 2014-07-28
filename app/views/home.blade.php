@extends('layout')

@section('header')
<header class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="page-header">
                <h1>{{ getenv('APP_NAME') }}</h1>
            </div>

        </div>
    </div>
</header>
@stop

@section('content')
<div class="container">
    <div class="row">
        @include('partials.sidebar-menu',array())
        <div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat earum ut impedit neque sint voluptatum, qui eius, itaque possimus atque, incidunt? Obcaecati optio veniam inventore. Voluptates, facilis, aut. Labore, ipsa!</p>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
