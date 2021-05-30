<?php


namespace App\Repositories;

use App\Models\Wallet;

class WalletRepository
{
    /**
     * @var Wallet $wallet
     */
    private Wallet $wallet;

    /**
     * WalletRepository constructor.
     * @param Wallet $wallet
     */
    public function __construct(Wallet $wallet)
    {
        $this->wallet = $wallet;
    }

    /**
     * @param array $data
     * @return Wallet
     */
    public function create(array $data): Wallet
    {
        $wallet = $this->wallet->fill($data);
        $this->wallet->save();
        return $wallet;
    }
}
