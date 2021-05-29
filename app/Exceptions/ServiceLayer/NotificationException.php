<?php


namespace App\Exceptions\ServiceLayer;

use Illuminate\Http\Response;

class NotificationException extends ServiceDomainException
{
    public function __construct()
    {
        parent::__construct();
        $this->message = 'Something went wrong on notification external service';
        $this->code = Response::HTTP_INTERNAL_SERVER_ERROR;
    }
}
