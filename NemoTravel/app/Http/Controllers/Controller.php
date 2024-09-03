<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function response(\Closure $method): JsonResponse
    {
        try {
            return response()->json($method());
        } catch (\Throwable $throwable) {
            $errorCode = (int)$throwable->getCode();
            if ($errorCode >= 400 && $errorCode <= 500) {
                return response()->json(
                    ['message' => $throwable->getMessage()],
                    $errorCode
                );
            } else {
                Log::error('Error: ' . $throwable->getMessage());

                $this->logger($throwable->getMessage(), $errorCode);

                return response()->json(
                    ['message' => __('messages.serverError')],
                    Response::HTTP_INTERNAL_SERVER_ERROR
                );
            }
        }
    }

    private function logger(string $message, int $code): void
    {
        //Здесь бы я поставил логер телеграма или на почту чтобы ловить оповещения по ошибкам поэтому пока оставлю просто так

        Log::error("Message" . $message . "/n" . 'Code:' . $code);
    }
}
