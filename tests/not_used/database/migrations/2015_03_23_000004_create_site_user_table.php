<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateSiteUserTable extends Migration
{


	public function __construct()
	{
		// Get the prefix
		$this->prefix = Config::get('campus.campus_db.prefix', '');
	}


	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create($this->prefix . 'site_user', function(Blueprint $table)
		{

			$table->engine = 'InnoDB';


			$table->integer('site_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();

			$table->foreign('site_id')->references('id')->on($this->prefix.'sites')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on($this->prefix.'users')->onDelete('cascade');


// 			$table->softDeletes();
// 			$table->timestamps();

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop($this->prefix . 'site_user');
	}


}
