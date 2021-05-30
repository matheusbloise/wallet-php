<?php


namespace App\Services;

use App\Repositories\ShopkeeperWalletRepository;

class ShopkeeperWalletService extends WalletService
{
    /**
     * CustomerWalletService constructor.
     */
    public function __construct()
    {
        parent::__construct(new ShopkeeperWalletRepository());
    }
}
