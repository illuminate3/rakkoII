<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;


class CreateAssetRoomTable extends Migration
{


	public function __construct()
	{
		// Get the prefix
		$this->prefix = Config::get('shisan.shisan_db.prefix', '');
	}


	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create($this->prefix . 'asset_room', function(Blueprint $table) {

			$table->engine = 'InnoDB';

			$table->integer('asset_id')->unsigned()->index();
			$table->integer('room_id')->unsigned()->index();

			$table->foreign('asset_id')->references('id')->on($this->prefix.'assets')->onDelete('cascade');
			$table->foreign('room_id')->references('id')->on($this->prefix.'rooms')->onDelete('cascade');

		});

	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop($this->prefix . 'asset_room');
	}


}
