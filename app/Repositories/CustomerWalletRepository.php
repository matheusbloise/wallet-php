<?php


namespace App\Repositories;

use App\Models\CustomerWallet;

class CustomerWalletRepository extends WalletRepository
{
    /**
     * CustomerWalletRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(new CustomerWallet());
    }
}
