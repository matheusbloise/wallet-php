<?php


namespace App\Exceptions\RepositoryLayer;

use Illuminate\Http\Response;

class EntityNotFound extends RepositoryDomainException
{
    public function __construct()
    {
        parent::__construct();
        $this->code = Response::HTTP_NOT_FOUND;
        $this->message = "Entity Not Found";
    }
}
