<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

use Config;


class Authenticate
{

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($this->auth->guest()) {
			if ($request->ajax()) {
				return response('Unauthorized.', 401);
			} else {

/*
				if (Auth::user()->can('manage_admin')) {
					return redirect()->guest(Config::get('kagi.admin_login_return_path', '/admin/dashboard'));
				} else {
					return redirect()->guest(Config::get('kagi.login_return_path', '/'));
				}
*/

//				return redirect()->guest('login');
				return redirect()->guest(Config::get('kagi.auth_login_path', '/login'));

			}
		}

		return $next($request);
	}


}
