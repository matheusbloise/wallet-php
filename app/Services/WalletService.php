<?php


namespace App\Services;


use App\Models\Wallet;

class WalletService
{
    protected Wallet $wallet;

    public function setWallet(Wallet $wallet)
    {
        $this->wallet = $wallet;
    }

    public function getWallet(): Wallet
    {
        return $this->wallet;
    }
}
