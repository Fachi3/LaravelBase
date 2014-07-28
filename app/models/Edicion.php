<?php

use LaravelBook\Ardent\Ardent;

class Edicion extends Ardent
{

    protected $table = 'Ediciones';

    protected $guarded = array('id');

    public static $rules = array(
        'name'          => 'required',
        'documentId'    => 'required',
    );
    public $autoHydrateEntityFromInput = true;
    public $forceEntityHydrationFromInput = true;

    public function getIdentifier()
    {
        return $this->getKey();
    }

}
