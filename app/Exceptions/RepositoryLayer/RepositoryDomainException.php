<?php


namespace App\Exceptions\RepositoryLayer;

use Illuminate\Http\Response;
use DomainException;

class RepositoryDomainException extends DomainException
{
    public function __construct()
    {
        parent::__construct();
        $this->message = 'Repository Domain Exception';
        $this->code = Response::HTTP_EXPECTATION_FAILED;
    }
}
