<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;


class CreateCodeTranslationsTable extends Migration
{


	public function __construct()
	{
		// Get the prefix
		$this->prefix = Config::get('horitsu.horitsu_db.prefix', '');
	}


	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create($this->prefix . 'code_translations', function(Blueprint $table) {

			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();

			$table->string('title')->nullable();
			$table->string('description')->nullable();

			$table->integer('code_id')->unsigned()->index();
			$table->foreign('code_id')->references('id')->on('codes')->onDelete('cascade');

			$table->integer('locale_id')->unsigned()->index();
			$table->foreign('locale_id')->references('id')->on('locales')->onDelete('cascade');

			$table->unique(['code_id', 'locale_id']);

			$table->softDeletes();
			$table->timestamps();

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop($this->prefix . 'code_translations');
	}


}
