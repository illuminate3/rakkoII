<?php

namespace App\Modules\Kagi\HttpServices;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Kagi\Http\Models\User;
use App\Modules\Kagi\Http\Models\Role;

use DateTime;
use DB;
use Eloquent;
use Hash;
use Input;


class LoginRegistrar extends Model {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * Update user login timestamp
	 *
	 * @param  int  $email
	 * @return
	 */
	public function touchLastLogin($email)
	{
		$id = DB::table('users')
			->where('email', '=', $email)
			->pluck('id');

		$user = $this->findOrFail($id);
		$user->last_login = new DateTime;
//dd($user);

		$user->update();
	}

	/**
	 * Check user if approved to access site
	 *
	 * @param  int  $email
	 * @return
	 */
	public function checkUserApproval($email)
	{
		$id = DB::table('users')
			->where('email', '=', $email)
			->pluck('id');

		$user = $this->find($id);
//dd($user);

// Run authorization checks against user status
		$approved = false;
		if ($user != null) {
			if ( $user->confirmed == 1) {
				$approved = true;
			}
			if ( $user->activated == 1) {
				$approved = true;
			}
			if ( $user->blocked == 1) {
				$approved = false;
			}
			if ( $user->banned == 1) {
				$approved = false;
			}
		}
//dd($approved);

		return $approved;
	}

	/**
	 * @param $userData
	 * @return static
	 */
/*
	public function findByUsernameOrCreateGithub($userData)
	{
//dd($userData);
//	protected $fillable = ['name', 'email', 'password', 'blocked', 'banned', 'confirmed', 'activated'];
		return User::firstOrCreate([
			'name'					=> $userData->nickname,
			'email'					=> $userData->email,
//			'avatar'				=> $userData->avatar,
			'activated_at'			=> date("Y-m-d H:i:s"),
			'blocked'				=> 0,
			'banned'				=> 0,
			'confirmed'				=> 1,
			'activated'				=> 1,
			'confirmation_code'		=> md5(microtime().Config::get('app.key'))
		]);
	}

	public function findByUsernameOrCreateGoogle($userData)
	{
//dd($userData);
//	protected $fillable = ['name', 'email', 'password', 'blocked', 'banned', 'confirmed', 'activated'];
		return User::firstOrCreate([
			'name'					=> $userData->name,
			'email'					=> $userData->email,
//			'avatar'				=> $userData->avatar,
			'activated_at'			=> date("Y-m-d H:i:s"),
			'blocked'				=> 0,
			'banned'				=> 0,
			'confirmed'				=> 1,
			'activated'				=> 1,
			'confirmation_code'		=> md5(microtime().Config::get('app.key'))
		]);
	}
*/


}
