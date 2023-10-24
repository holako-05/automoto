<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('date')->nullable(true);
			$table->string('time')->nullable(true);
			$table->string('name')->nullable(true);
			$table->string('telepohne')->nullable(true);
			$table->string('email')->nullable(true);
			$table->string('service')->nullable(true);
			$table->longText('message')->nullable(true);

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
        Schema::drop('reservations');
    }
}
