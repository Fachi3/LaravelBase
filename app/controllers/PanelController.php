<?php

class PanelController extends BaseController {


	public function __construct() {

        $this->beforeFilter('auth', array());

        $this->beforeFilter('csrf', array( 'on' => 'post' ));

	}

	public function getIndex()
	{
		return 'Panel';
	}

}
