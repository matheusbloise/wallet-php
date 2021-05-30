<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\Wallet\CustomerWalletResource;
use App\Http\Requests\Wallet\CustomerWalletRequest;
use App\Services\CustomerWalletService;

/**
 * Class CustomerWalletController
 *
 * @group Customer Wallet
 * @package App\Http\Controllers
 */
class CustomerWalletController extends Controller
{
    /**
     * @var CustomerWalletService $customerWalletService
     */
    protected CustomerWalletService $customerWalletService;

    /**
     * CustomerWalletController constructor.
     * @param CustomerWalletService $customerWalletService
     */
    public function __construct(CustomerWalletService $customerWalletService)
    {
        $this->customerWalletService = $customerWalletService;
    }

    /**
     * @param CustomerWalletRequest $request
     * @return JsonResponse
     */
    public function store(CustomerWalletRequest $request)
    {
        try {
            $data = $request->validated();
            $wallet = $this->customerWalletService->create($data);
        } catch (Exception $e) {
            return $this->responseError($e->getMessage(), $e->getCode());
        }
        return $this->responseContentSuccess(
            'Customer Wallet created with success',
            CustomerWalletResource::make($wallet)
        );
    }
}
