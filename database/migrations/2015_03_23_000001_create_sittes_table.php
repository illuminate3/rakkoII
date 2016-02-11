<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;


class CreateSittesTable extends Migration
{


	public function __construct()
	{
		// Get the prefix
		$this->prefix = Config::get('jinji.jinji_db.prefix', '');
	}


	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create($this->prefix . 'sittes', function(Blueprint $table) {

			$table->engine = 'InnoDB';
			$table->increments('id');

			$table->integer('user_id')->default(1);

			$table->integer('lea_id')->nullable()->index();
			$table->string('slug', 255)->nullable()->index();

			$table->string('name',100)->index();
			$table->string('email',100)->nullable();
			$table->string('phone_1',20)->nullable();
			$table->string('phone_2',20)->nullable();
			$table->string('website',100)->nullable();
			$table->string('address',100)->nullable();
			$table->string('city',100)->nullable();
			$table->string('state',60)->nullable();
			$table->string('zipcode',20)->nullable();
			$table->string('logo',100)->nullable();
			$table->integer('image_id')->nullable()->index();

//			$table->integer('division_id')->nullable();
//			$table->string('ad_code',10)->nullable();
			$table->string('bld_number',10)->nullable();

			$table->integer('status_id')->default(1);
			$table->string('theme_slug')->default('default');

			$table->text('notes')->nullable();
			$table->text('google_analytics')->nullable();

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
		Schema::drop($this->prefix . 'sittes');
	}


}
