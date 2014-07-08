@extends('base-layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Restablecer password</h3>
                </div>
                <div class="panel-body">

                    {{ Form::open(array('url'=>URL::action('RemindersController@postRemind'), 'class'=>'form-signin', 'role'=>'form')) }}
                        <fieldset>
                            <div class="form-group">
                                {{ Form::text('usuario', null, array('class'=>'form-control', 'placeholder'=>'Usuario')) }}
                            </div>
                            {{ Form::submit('Restablecer password', array('class'=>'btn btn-lg btn-info btn-block'))}}
                        </fieldset>
                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /container -->

@stop

@section('footer')
<footer>
    <div class="row">
        <div class="col-lg-12">
            <p class="text-center">¿Tienes una cuenta? <a href="{{ URL::to('login') }}">Inicia sesión</a>?</p>
        </div>
    </div>
</footer>
@stop
