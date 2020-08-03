<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDataTestingsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('data_testings', function (Blueprint $table) {
			$table->increments('id');
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
			$table->string('penyakit');
			$table->string('prediksi_penyakit')->nullable();
			$table->integer('batch');
			$table->float('bdm_pred', 10, 0)->nullable();
			$table->float('dm1_pred', 10, 0)->nullable();
			$table->float('dm2_pred', 10, 0)->nullable();
			$table->float('dml_pred', 10, 0)->nullable();
			$table->float('dmg_pred', 10, 0)->nullable();
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
		Schema::drop('data_testings');
	}
}
