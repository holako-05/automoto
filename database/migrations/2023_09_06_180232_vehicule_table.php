<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VehiculeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('client_id')->nullable(true);
			$table->string('marque_id')->nullable(true);
			$table->string('modele_id')->nullable(true);
			$table->string('year')->nullable(true);
			$table->string('chassis')->nullable(true);
			$table->string('numberOfDoors')->nullable(true);
			$table->string('fuelType')->nullable(true);
			$table->string('mileage')->nullable(true);
			$table->string('registrationDate')->nullable(true);

            $table->bigInteger('deleted')->default(0);	
            $table->dateTime('deleted_at', 0)->nullable(true);
            $table->bigInteger('deleted_by', 0)->nullable(true);
            $table->bigInteger('created_by', 0)->nullable(true);
            $table->bigInteger('updated_by', 0)->nullable(true);
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
        Schema::drop('vehicules');
    }
}
