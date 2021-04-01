<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Support\Arr;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($this->isHttpException($exception)) {
            switch ($exception->getStatusCode()) {
                case 404:
                    return response()->view('errors.404', [], $exception->getStatusCode());
                    break;
                case 403:
                    return response()->view('errors.403', [], $exception->getStatusCode());
                    break;
                case 405:
                    return response()->view('errors.405', [], $exception->getStatusCode());
                    break;
            }
        }

        return parent::render($request, $exception);
    }

    protected function unauthenticated($request, \Illuminate\Auth\AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        $guard = Arr::get($exception->guards(), 0);

        switch ($guard) {
            case 'officer':
                $route = 'officer.login';
                break;

            default:
                $route = 'login';
                break;
        }

        return redirect()->guest(route($route));
    }
}
