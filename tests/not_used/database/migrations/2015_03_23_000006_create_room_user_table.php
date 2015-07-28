<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateRoomUserTable extends Migration
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
		Schema::create($this->prefix . 'room_user', function(Blueprint $table)
		{

			$table->engine = 'InnoDB';


			$table->integer('room_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();

			$table->foreign('room_id')->references('id')->on($this->prefix.'rooms')->onDelete('cascade');
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
		Schema::drop($this->prefix . 'room_user');
	}


}
