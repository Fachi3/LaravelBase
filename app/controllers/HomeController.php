<?php

class HomeController extends BaseController {

    public function __construct() {

        $this->beforeFilter('auth', array());

        $this->beforeFilter('csrf', array( 'on' => 'post' ));

        if ( ! Auth::user()->hasRole( 'Administrador' ) )
        {
            Auth::logout();
            return Redirect::action('LoginController@getLogin')
                ->with('message_info', 'No está autorizado')
                ;
        }

    }

    public function showWelcome()
    {

        return View::make('home');

    }

}
