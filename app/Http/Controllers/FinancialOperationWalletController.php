<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Requests\FinancialOperationWallet\TransferRequest;
use App\Services\FinancialOperationWalletService;
use Illuminate\Http\JsonResponse;

/**
 * Class FinancialOperationWalletController
 *
 * @group Financial Operation Wallet
 * @package App\Http\Controllers
 */
class FinancialOperationWalletController extends Controller
{
    /**
     * @var FinancialOperationWalletService $financialOperationWalletService
     */
    protected FinancialOperationWalletService $financialOperationWalletService;

    /**
     * FinancialOperationWalletController constructor.
     * @param FinancialOperationWalletService $financialOperationWalletService
     */
    public function __construct(FinancialOperationWalletService $financialOperationWalletService)
    {
        $this->financialOperationWalletService = $financialOperationWalletService;
    }

    /**
     * @param TransferRequest $request
     * @return JsonResponse
     */
    public function transfer(TransferRequest $request)
    {
        try {
            $data = $request->validated();
            $this->financialOperationWalletService->transfer($data);
        } catch (Exception $e) {
            return $this->responseError($e->getMessage(), $e->getCode());
        }
        return $this->responseSuccess('Operation done with success');
    }
}
