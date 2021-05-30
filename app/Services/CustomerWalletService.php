<?php


namespace App\Services;

use App\Repositories\CustomerWalletRepository;

class CustomerWalletService extends WalletService
{
    /**
     * CustomerWalletService constructor.
     */
    public function __construct()
    {
        parent::__construct(new CustomerWalletRepository());
    }
}
