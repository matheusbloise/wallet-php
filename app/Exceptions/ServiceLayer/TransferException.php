<?php


namespace App\Exceptions\ServiceLayer;

use Illuminate\Http\Response;

class TransferException extends ServiceDomainException
{
    public function __construct()
    {
        parent::__construct();
        $this->message = 'There was an error during payment process';
        $this->code = Response::HTTP_INTERNAL_SERVER_ERROR;
    }
}
