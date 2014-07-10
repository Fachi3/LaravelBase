<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}


    public function contactar_api($params)
    {

        // Store the original input of the request
        $originalInput = Request::input();

        $request = Request::create('/api', 'GET', $params);

        // Replace the input with your request instance input
        Request::replace($request->input());

        // Dispatch your request instance with the router
        $response = Route::dispatch($request);

        // Fetch the response
        $instance = Route::dispatch($request)->getContent();

        // Replace the input again with the original request input.
        Request::replace($originalInput);

        return $instance;

    }

}
