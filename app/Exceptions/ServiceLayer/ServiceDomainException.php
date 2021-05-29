<?php


namespace App\Exceptions\ServiceLayer;

use Illuminate\Http\Response;
use DomainException;

class ServiceDomainException extends DomainException
{
    public function __construct()
    {
        parent::__construct();
        $this->message = 'Service Domain Exception';
        $this->code = Response::HTTP_EXPECTATION_FAILED;
    }
}
