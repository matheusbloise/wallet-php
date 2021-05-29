<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Services\ShopkeeperService;
use App\Http\Requests\User\FindPaginatedRequest;
use App\Http\Requests\User\UpdateOrCreateRequest;
use App\Http\Resources\User\UserResource;

class ShopkeeperController extends Controller
{
    /**
     * @var ShopkeeperService $shopkeeperService
     */
    private ShopkeeperService $shopkeeperService;

    /**
     * ShopkeeperController constructor.
     * @param ShopkeeperService $shopkeeperService
     */
    public function __construct(ShopkeeperService $shopkeeperService)
    {
        $this->shopkeeperService = $shopkeeperService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param FindPaginatedRequest $request
     * @return JsonResponse
     */
    public function index(FindPaginatedRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();
            $customers = $this->shopkeeperService->findAllPaginated($data);
        } catch(Exception $e) {
            return $this->responseError($e->getMessage(), $e->getCode());
        }

        return $this->responseContentSuccess(
            'The Shopkeepers has been found',
            UserResource::collection($customers)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UpdateOrCreateRequest $request
     * @return JsonResponse
     */
    public function store(UpdateOrCreateRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();
            $shopkeeper = $this->shopkeeperService->create($data);

            return $this->responseContentSuccess(
                "Shopkeeper has been created",
                UserResource::make($shopkeeper),
                Response::HTTP_CREATED
            );

        } catch (Exception $e) {
            return $this->responseError($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            $shopkeeper = $this->shopkeeperService->findOneById($id);

            return $this->responseContentSuccess(
                'The Shopkeeper has been found',
                UserResource::make($shopkeeper)
            );
        } catch (Exception $e) {
            return $this->responseError($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateOrCreateRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateOrCreateRequest $request, int $id): JsonResponse
    {
        try {
            $data = $request->validated();
            $shopkeeper = $this->shopkeeperService->update($data, $id);

            return $this->responseContentSuccess(
                "Shopkeeper has been updated",
                UserResource::make($shopkeeper),
                Response::HTTP_OK
            );

        } catch (Exception $e) {
            return $this->responseError($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $this->shopkeeperService->delete($id);
            return $this->responseSuccess("Shopkeeper has been deleted", Response::HTTP_NO_CONTENT);
        } catch (Exception $e) {
            return $this->responseError($e->getMessage(), $e->getCode());
        }
    }
}
