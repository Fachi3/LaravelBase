@extends('base-layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Bienvenido</h3>
                </div>
                <div class="panel-body">


                    <div class="mensajes">

                        @if(Session::has('message_success'))
                        <div class="alert alert-dismissable alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{ Session::get('message_success') }}</div>
                        @endif

                        @if(Session::has('message_info'))
                        <div class="alert alert-dismissable alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{ Session::get('message_info') }}</div>
                        @endif

                        @if(Session::has('message_warning'))
                        <div class="alert alert-dismissable alert-warning"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{ Session::get('message_warning') }}</div>
                        @endif

                        @if(Session::has('message_danger'))
                        <div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{ Session::get('message_danger') }}</div>
                        @endif

                    </div>


                    {{ Form::open(array('url'=>URL::to('login'), 'class'=>'form-signin', 'role'=>'form')) }}
                        <fieldset>
                            <div class="form-group">
                                {{ Form::text('usuario', null, array('class'=>'form-control', 'placeholder'=>'Usuario')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
                            </div>
                            {{ Form::submit('Ingresar', array('class'=>'btn btn-lg btn-info btn-block'))}}
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
            <p class="text-center">¿Olvidaste tus <a href="{{ URL::to('password/remind') }}">credenciales de acceso</a>?</p>
        </div>
    </div>
</footer>
@stop
