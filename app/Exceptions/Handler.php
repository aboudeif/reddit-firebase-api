<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Illuminate\Auth\Access\AuthorizationException;


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
        $this->renderable(function (NotFoundHttpException $e, Request $request) {
                return response()->json([
                    'error' => 'API URL not found.'
                ], 404);
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof AuthorizationException) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            return response()->json(['error' => 'Method not allowed.'], 405);
        }

        return parent::render($request, $exception);
    }
}