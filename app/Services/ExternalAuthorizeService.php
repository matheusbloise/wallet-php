<?php


namespace App\Services;

use Exception;
use App\Exceptions\ServiceLayer\OperationNotAuthorizedException;
use Illuminate\Support\Facades\Http;

class ExternalAuthorizeService
{
    public static function authorizeOperation(): void
    {
        try {
            Http::get(config('app.authorize_external_service_api'))->ok();
        } catch (Exception $e) {
            throw new OperationNotAuthorizedException();
        }
    }
}
