<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;


class CreateRuleTranslationsTable extends Migration
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

		Schema::create($this->prefix . 'rule_translations', function(Blueprint $table) {

			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();

			$table->string('title')->nullable();
			$table->string('description')->nullable();

			$table->integer('rule_id')->unsigned()->index();
			$table->foreign('rule_id')->references('id')->on('rules')->onDelete('cascade');

			$table->integer('locale_id')->unsigned()->index();
			$table->foreign('locale_id')->references('id')->on('locales')->onDelete('cascade');

			$table->unique(['rule_id', 'locale_id']);

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
		Schema::drop($this->prefix . 'rule_translations');
	}


}
