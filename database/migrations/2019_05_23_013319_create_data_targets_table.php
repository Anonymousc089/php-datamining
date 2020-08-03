<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDataTargetsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('data_targets', function (Blueprint $table) {
			$table->integer('id', true);
			$table->string('norekam');
			$table->string('umur');
			$table->string('jk');
			$table->string('hamil');
			$table->string('riwayat');
			$table->string('keturunan');
			$table->string('trias');
			$table->string('ulkus');
			$table->string('td');
			$table->string('lila');
			$table->string('imt');
			$table->string('gds');
			$table->string('gdp');
			$table->string('gd2pp');
			$table->string('kolesterol');
			$table->string('prediksi_penyakit');
			$table->timestamps();
			$table->integer('testing_trial_id')->unsigned()->index('testing_trial_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('data_targets');
	}
}
