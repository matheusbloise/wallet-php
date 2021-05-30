<?php


namespace App\Repositories;

use App\Models\ShopkeeperWallet;

class ShopkeeperWalletRepository extends WalletRepository
{
    /**
     * CustomerWalletRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(new ShopkeeperWallet());
    }
}
