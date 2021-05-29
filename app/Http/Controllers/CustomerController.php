<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Http\Requests\User\FindPaginatedRequest;
use App\Http\Requests\User\UpdateOrCreateRequest;
use App\Http\Resources\User\UserResource;
use App\Services\CustomerService;

class CustomerController extends Controller
{
    /**
     * @var CustomerService $customerService
     */
    private CustomerService $customerService;

    /**
     * CustomerController constructor.
     * @param CustomerService $customerService
     */
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
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
            $customers = $this->customerService->findAllPaginated($data);
        } catch(Exception $e) {
            return $this->responseError($e->getMessage(), $e->getCode());
        }

        return $this->responseContentSuccess(
            'The Customers has been found',
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
            $customer = $this->customerService->create($data);

            return $this->responseContentSuccess(
                "Customer has been created",
                UserResource::make($customer),
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
            $customer = $this->customerService->findOneById($id);

            return $this->responseContentSuccess(
                'The Customer has been found',
                UserResource::make($customer)
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
            $customer = $this->customerService->update($data, $id);

            return $this->responseContentSuccess(
                "Customer has been updated",
                UserResource::make($customer),
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
            $this->customerService->delete($id);
            return $this->responseSuccess("Customer has been deleted", Response::HTTP_NO_CONTENT);
        } catch (Exception $e) {
            return $this->responseError($e->getMessage(), $e->getCode());
        }
    }
}
