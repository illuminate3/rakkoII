<?php

namespace App\Modules\Core\Database\Seeds;

use Illuminate\Database\Seeder;
Use DB, Eloquent, Model, Schema;


class StatusesSeeder extends Seeder {


	public function run()
	{

		$statuses = array(
		[
			'id'					=> 1
		],
		[
			'id'					=> 2
		]
		);
		$status_translations = array(
		[
			'name'					=> 'Enabled',
			'description'			=> 'Item has been Enabled',
			'_status_id'		=> 1,
			'locale_id'				=> 1
		],
		[
			'name'					=> 'Enabled',
			'description'			=> 'Item has been Enabled',
			'_status_id'		=> 1,
			'locale_id'				=> 2
		],
		[
			'name'					=> 'Disabled',
			'description'			=> 'Item has been Disabled',
			'_status_id'		=> 2,
			'locale_id'				=> 1
		],
		[
			'name'					=> 'Disabled',
			'description'			=> 'Item has been Disabled',
			'_status_id'		=> 2,
			'locale_id'				=> 2
		]
		);

		// Uncomment the below to run the seeder
//		DB::table('statuses')->insert($seeds);


// statuses
		DB::table('statuses')->delete();
			$statement = "ALTER TABLE statuses AUTO_INCREMENT = 1;";
			DB::unprepared($statement);
		DB::table('statuses')->insert( $statuses );

// status_translations
		DB::table('status_translations')->delete();
			$statement = "ALTER TABLE status_translations AUTO_INCREMENT = 1;";
			DB::unprepared($statement);
		DB::table('status_translations')->insert( $status_translations );


	} // run


}
