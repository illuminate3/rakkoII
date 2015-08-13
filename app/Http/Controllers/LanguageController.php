<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Redirect;
use Session;


class LanguageController extends Controller
{


	/**
	 * Initializer.
	 *
	 * @return \CoreController
	 */
	public function __construct()
	{
/*
		parent::__construct();
		$this->middleware('csrf');
		$this->middleware('auth');
*/
// middleware
// 		$this->middleware('auth');
// 		$this->middleware('admin');
	}


	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function language($lang)
	{
/*
Route::get('/language/{lang}', function ($lang) {
	});
*/

		Session::put('locale', $lang);

		return Redirect::back();
	}


}
