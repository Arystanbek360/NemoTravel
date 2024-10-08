<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
        });

        $this->renderable(function (AuthorizationException|AccessDeniedHttpException $e) {
            return response()->json([
                'message' => 'messages.accessDenied',
            ], Response::HTTP_FORBIDDEN);
        });

        $this->renderable(function (NotFoundHttpException $e) {
            return response()->json([
                'message' => 'messages.notFound',
            ], Response::HTTP_NOT_FOUND);
        });

        $this->renderable(function (\TypeError $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        });
    }
}
