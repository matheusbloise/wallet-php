<?php


namespace App\Exceptions\ModelLayer;

use Illuminate\Http\Response;
use DomainException;

class ModelDomainException extends DomainException
{
    public function __construct()
    {
        parent::__construct();
        $this->message = 'Service Domain Exception';
        $this->code = Response::HTTP_EXPECTATION_FAILED;
    }
}
