<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('label')->nullable(true);
			$table->string('description')->nullable(true);

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
        Schema::drop('positions');
    }
}
