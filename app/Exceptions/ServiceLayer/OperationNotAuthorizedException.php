<?php


namespace App\Exceptions\ServiceLayer;

use Illuminate\Http\Response;

class OperationNotAuthorizedException extends ServiceDomainException
{
    public function __construct()
    {
        parent::__construct();
        $this->message = 'Operation Not Authorized';
        $this->code = Response::HTTP_UNAUTHORIZED;
    }
}
