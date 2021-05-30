<?php


namespace App\Services;

use App\Models\Wallet;
use App\Repositories\WalletRepository;

abstract class WalletService
{
    /**
     * @var Wallet $wallet
     */
    protected Wallet $wallet;

    /**
     * @var WalletRepository $walletRepository
     */
    protected WalletRepository $walletRepository;

    /**
     * WalletRepository constructor.
     * @param WalletRepository $walletRepository
     */
    public function __construct(WalletRepository $walletRepository)
    {
        $this->walletRepository = $walletRepository;
    }

    /**
     * @param Wallet $wallet
     */
    public function setWallet(Wallet $wallet): void
    {
        $this->wallet = $wallet;
    }

    /**
     * @return Wallet
     */
    public function getWallet(): Wallet
    {
        return $this->wallet;
    }

    public function create(array $data)
    {
        return $this->walletRepository->create($data);
    }
}
