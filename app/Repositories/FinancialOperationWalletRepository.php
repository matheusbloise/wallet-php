<?php


namespace App\Repositories;

use App\Models\Wallet;
use App\Models\CustomerWallet;
use App\Models\ShopkeeperWallet;
use App\Models\FinancialOperationWallet;
use App\Exceptions\RepositoryLayer\EntityNotFound;

class FinancialOperationWalletRepository
{
    /**
     * @param int $shopkeeper_id
     * @return ShopkeeperWallet
     */
    public function findShopkeeperWallet(int $shopkeeper_id): ShopkeeperWallet
    {
        $wallet = ShopkeeperWallet::whereShopkeeperId($shopkeeper_id)->first();

        if (!$wallet) {
            throw new EntityNotFound;
        }

        return $wallet;
    }

    /**
     * @param int $customer_id
     * @return CustomerWallet
     */
    public function findCustomerWallet(int $customer_id): CustomerWallet
    {
        $wallet = CustomerWallet::whereCustomerId($customer_id)->first();

        if (!$wallet) {
            throw new EntityNotFound;
        }

        return $wallet;
    }

    /**
     * @param Wallet $wallet
     */
    public function updateWallet(Wallet $wallet): void
    {
        $wallet->update();
    }

    /**
     * @param FinancialOperationWallet $financialOperationWallet
     * @param Wallet $walletPayee
     */
    public function createFinancialOperationWallet(FinancialOperationWallet $financialOperationWallet, Wallet $walletPayee): void
    {
        $financialOperationWallet
            ->payable()
            ->associate($walletPayee)
            ->save();
    }
}
