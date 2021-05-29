<?php


namespace App\Exceptions\ModelLayer;

use Illuminate\Http\Response;

class WalletWithdrawException extends ModelDomainException
{
    public function __construct()
    {
        parent::__construct();
        $this->code = Response::HTTP_UNPROCESSABLE_ENTITY;
        $this->message = "Insufficient Funds";
    }
}
