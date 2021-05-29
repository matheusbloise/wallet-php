<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param string $msg
     * @param int $code
     * @return JsonResponse
     */
    public function responseSuccess(string $msg, int $code = Response::HTTP_OK): JsonResponse
    {
        return response()->json(['message' => $msg], $code);
    }

    /**
     * @param string $msg
     * @param JsonResource $content
     * @param int $code
     * @return JsonResponse
     */
    public function responseContentSuccess(string $msg, JsonResource $content, int $code = Response::HTTP_OK): JsonResponse
    {
        return response()->json(['message' => $msg, 'content' => $content], $code);
    }

    /**
     * @param string $error
     * @param int $code
     * @return JsonResponse
     */
    public function responseError(string $error, int $code = Response::HTTP_UNPROCESSABLE_ENTITY): JsonResponse
    {
        return response()->json(['error' => $error], $code);
    }
}
