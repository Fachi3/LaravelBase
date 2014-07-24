<?php

class LoginController extends BaseController {

	public function __construct() {

        // $this->beforeFilter('auth', array());

        $this->beforeFilter('csrf', array( 'on' => 'post' ));

	}

	public function getLogin() {
        if (Auth::check())
        {
            return Redirect::action('HomeController@getIndex');
        }
        return View::make( 'login' );
	}

	public function postLogin() {

        if ( Auth::attempt (array('login'=>Input::get('usuario'), 'password' => Input::get('password'), 'estatus' => 1, ) ) ) {
            return Redirect::action('HomeController@getIndex');
        } else {
            return Redirect::action('LoginController@getLogin')
            	->with('message_danger', 'Nombre de usuario o contrasela incorrectos')
            	->withInput()
            	;
        }

	}


    public function anyLogout() {
        Auth::logout();
        return Redirect::action('LoginController@getLogin')
            ->with('message_info', 'Haz cerrado sesión')
            ;
    }

}
