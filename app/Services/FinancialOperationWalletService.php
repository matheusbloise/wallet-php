<?php


namespace App\Services;

use Exception;
use App\Exceptions\ServiceLayer\TransferException;
use App\Models\FinancialOperationWallet;
use App\Models\Wallet;
use App\Enums\UserTypeEnum;
use App\Repositories\FinancialOperationWalletRepository;
use Illuminate\Support\Facades\DB;

class FinancialOperationWalletService
{
    /**
     * @var WalletService $walletPayerService
     */
    protected WalletService $walletPayerService;

    /**
     * @var WalletService $walletPayeeService
     */
    protected WalletService $walletPayeeService;

    /**
     * @var FinancialOperationWalletRepository $financialOperationWalletRepository
     */
    protected FinancialOperationWalletRepository $financialOperationWalletRepository;

    /**
     * FinancialOperationWalletService constructor.
     * @param WalletService $walletPayeeService
     * @param WalletService $walletPayerService
     * @param FinancialOperationWalletRepository $financialOperationWalletRepository
     */
    public function __construct(
        WalletService $walletPayeeService,
        WalletService $walletPayerService,
        FinancialOperationWalletRepository $financialOperationWalletRepository
    ) {
        $this->walletPayeeService = $walletPayeeService;
        $this->walletPayerService = $walletPayerService;
        $this->financialOperationWalletRepository = $financialOperationWalletRepository;
    }

    /**
     * @param int $payer_id
     */
    protected function setWalletPayer(int $payer_id): void
    {
        $wallet = $this->financialOperationWalletRepository->findCustomerWallet($payer_id);
        $this->walletPayerService->setWallet($wallet);
    }

    /**
     * @return Wallet
     */
    public function getWalletPayer(): Wallet
    {
        return $this->walletPayerService->getWallet();
    }

    /**
     * @param string $payee_type
     * @param int $payee_id
     */
    protected function setWalletPayee(string $payee_type, int $payee_id): void
    {
        if ($payee_type == UserTypeEnum::SHOPKEEPER) {
            $wallet = $this->financialOperationWalletRepository->findShopkeeperWallet($payee_id);
        } else {
            $wallet = $this->financialOperationWalletRepository->findCustomerWallet($payee_id);
        }

        $this->walletPayeeService->setWallet($wallet);
    }

    /**
     * @return Wallet
     */
    public function getWalletPayee(): Wallet
    {
        return $this->walletPayeeService->getWallet();
    }

    /**
     * @param array $data
     * @throws Exception
     */
    public function transfer(array $data): void
    {
        $this->setWalletPayer($data['payer']);
        $this->setWalletPayee($data['payee_type'], $data['payee']);

        $walletPayer = $this
            ->getWalletPayer()
            ->withdraw($data['value']);

        $walletPayee = $this
            ->getWalletPayee()
            ->deposit($data['value']);

        $financialOperationWallet = $this->fillFinancialOperationWallet($data['value']);

        try {
            DB::beginTransaction();
            $this->financialOperationWalletRepository->updateWallet($walletPayer);
            $this->financialOperationWalletRepository->updateWallet($walletPayee);
            $this->financialOperationWalletRepository->createFinancialOperationWallet($financialOperationWallet, $walletPayee);
            ExternalAuthorizeService::authorizeOperation();
            NotifyUserPayeeService::notify($data['payee'], $data['payee_type']);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new TransferException;
        }
    }

    /**
     * @param float $value
     * @return FinancialOperationWallet
     */
    protected function fillFinancialOperationWallet(float $value): FinancialOperationWallet
    {
        $walletPayer = $this->getWalletPayer();
        $walletPayee = $this->getWalletPayee();

        $financialOperationWallet = new FinancialOperationWallet();
        $financialOperationWallet->customer_wallet_id = $walletPayer->id;
        $financialOperationWallet->balance_payer = $walletPayer->balance;
        $financialOperationWallet->balance_payee = $walletPayee->balance;
        $financialOperationWallet->value_transferred = $value;

        return $financialOperationWallet;
    }
}
