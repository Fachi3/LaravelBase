<?php

class TestingController extends BaseController {

	public function __construct() {

		$this->beforeFilter('auth', array());

		$this->beforeFilter('csrf', array( 'on' => 'post' ));

	}

    public function getIndex()
    {
        return 'Ok';
    }

	public function getUsers()
	{

        $usuarios = User::has('rol')->with('rol')->get();

        return Response::json($usuarios);

	}

}
