<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\Wallet\ShopkeeperWalletResource;
use App\Services\ShopkeeperWalletService;
use App\Http\Requests\Wallet\ShopkeeperWalletRequest;

/**
 * Class ShopkeeperWalletController
 *
 * @group Shopkeeper Wallet
 * @package App\Http\Controllers
 */
class ShopkeeperWalletController extends Controller
{
    protected ShopkeeperWalletService $shopkeeperWalletService;

    public function __construct(ShopkeeperWalletService $shopkeeperWalletService)
    {
        $this->shopkeeperWalletService = $shopkeeperWalletService;
    }

    /**
     * @param ShopkeeperWalletRequest $request
     * @return JsonResponse
     */
    public function store(ShopkeeperWalletRequest $request)
    {
        try {
            $data = $request->validated();
            $wallet = $this->shopkeeperWalletService->create($data);
        } catch (Exception $e) {
            return $this->responseError($e->getMessage(), $e->getCode());
        }
        return $this->responseContentSuccess(
            'Shopkeeper Wallet created with success',
            ShopkeeperWalletResource::make($wallet)
        );
    }
}
