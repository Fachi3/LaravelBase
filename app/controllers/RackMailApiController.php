<?php

use Guzzle\Http\Client;

class RackMailApiController extends BaseController {

    protected $RackspaceConfig;

    protected $url_string;

    public function __construct() {

        $this->beforeFilter('auth', array());

        $this->beforeFilter('csrf', array( 'on' => 'post' ));

        /**
         * DANGER!!!
         *
         * Estos son datos en producción del API de Rackspace
         * Si lo rompen lo pagan
         * 
         */

        $this->RackspaceConfig =
            array(
                'UserKey'         =>  'BLw/d3BcDbMy2lZRyy31',
                'SecretKey'       =>  'sqKI+2KM3G7Y6XPcra1NT8ZVVRX1x3B4VvShHE68',
                'ApiHost'         =>  'https://api.emailsrvr.com',
                'ApiVersion'      =>  'v1',
                'UserAgent'       =>  'microbitMailClient',
                'customerNumber'  =>  '249199',
            );

        $this->url_string = '';

        if (Input::has('url')) {
            $this->url_string = Input::get('url');
        }

        if (Input::has('size')) {
            $this->url_string = $this->url_string . '?size=' . Input::get('size');
        }

        if (Input::has('offset')) {
            $this->url_string = $this->url_string . '&offset=' . Input::get('offset');
        }

        if (Input::has('fields')) {
            $this->url_string = $this->url_string . '&fields=' . Input::get('fields');
        }

    }

    /**
     * Funciones propias que traducen las peticiones a esta API hacia el API de Rackspace
     */


    /**
     * [prepareRequest crea un objeto $client utilizando Guzzle y los parámetros requeridos por el API Rest]
     * @return [Guzzle $client]
     */
    private function prepareRequest()
    {

        $time_stamp = date('YmdHis');

        $sha1_hash = $this->makeHash($time_stamp);

        $client = new Client($this->RackspaceConfig['ApiHost'], array(
            'request.options' => array(
                'headers' => array(
                    'Accept'          => 'application/json',
                    'User-Agent'      => $this->RackspaceConfig['UserAgent'],
                    'X-Api-Signature' => $this->xApiSignatureHeader($time_stamp,$sha1_hash)
                ),
            )
        ));

        $client->setUserAgent($this->RackspaceConfig['UserAgent']);

        return $client;

    }

    /**
     * [xApiSignatureHeader Crea el string para la cabecera X-Api-Signature]
     * @param  [string] $time_stamp
     * @param  [string] $sha1_hash
     * @return [string]
     */
    private function xApiSignatureHeader($time_stamp,$sha1_hash)
    {

        /**<User Key>:<Timestamp>:<SHA1 Hash> **/
        return $this->RackspaceConfig['UserKey'] . ':' . $time_stamp . ':' . $sha1_hash;
    }

    /**
     * [makeHash genera un hash para autenticar la petición a la API Rest]
     * @param  [string] $time_stamp
     * @return [string]
     */
    private function makeHash($time_stamp)
    {

        // <User Key><User Agent><Timestamp><Secret Key>
        return base64_encode(sha1(
            $this->RackspaceConfig['UserKey'] .
            $this->RackspaceConfig['UserAgent'] .
            $time_stamp .
            $this->RackspaceConfig['SecretKey']
        , true));

    }









    /**
     * Restful
     */

    public function getIndex()
    {

        if ($this->url_string): 
            $client = $this->prepareRequest();

            $request = $client->get( $this->RackspaceConfig['ApiVersion'] . '/' . $this->url_string );

            $response = $request->send();

            return $response->getBody();

        else:
            return Response::json('Error');
        endif;

    }

    // public function postIndex()
    // {
    //     $url_string = Input::get('url_string');
    //     return $url_string;
    // }

    // public function putIndex()
    // {
    //     $url_string = Input::get('url_string');
    //     return $url_string;
    // }

    // public function deleteIndex()
    // {
    //     $url_string = Input::get('url_string');
    //     return $url_string;
    // }

}
