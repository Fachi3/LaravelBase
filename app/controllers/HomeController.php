<?php

class HomeController extends BaseController {


	public function __construct() {

        $this->beforeFilter('auth', array());

        $this->beforeFilter('csrf', array( 'on' => 'post' ));

	}

	public function getIndex()
	{

        $url = 'customers/1439807/domains';

        $params = array(
                        'url'    => $url,
                        //'size'   => $size,
                        //'offset' => $offset,
                    );
        $resultados = json_decode($this->contactar_api($params));

        return $resultados->domains;

	}

}
