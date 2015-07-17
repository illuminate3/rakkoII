<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use Flash;


class Handler extends ExceptionHandler
{

    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class,
    ];


    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }


    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {

		if ($e instanceof TokenMismatchException) {
			//Redirect to login form if session expires
			Flash::success( trans('kotoba::auth.error.time_out') );
			return redirect($request->fullUrl());
//             return redirect($request->fullUrl())->with('errors',
//                 ["The login form has expired, please try again. In the future, reload the login page if it has been open for several hours."]);
		}

        return parent::render($request, $e);
    }


}
