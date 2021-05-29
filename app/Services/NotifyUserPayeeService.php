<?php


namespace App\Services;

use Exception;
use App\Exceptions\ServiceLayer\NotificationException;
use Illuminate\Support\Facades\Http;

class NotifyUserPayeeService
{
    /**
     * @param int $payee_id
     * @param string $payee_type
     */
    public static function notify(int $payee_id, string $payee_type): void
    {
        try {
            Http
                ::withOptions([
                    'payee_id' => $payee_id,
                    'payee_type' => $payee_type
                ])
                ->get(config('app.notify_external_service_api'))
                ->ok();

        } catch (Exception $e) {
            throw new NotificationException;
        }
    }
}
