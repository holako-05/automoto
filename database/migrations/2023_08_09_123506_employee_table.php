<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('user_id')->nullable(true);
			$table->string('position')->nullable(true);
			$table->string('speciality')->nullable(true);
			$table->string('hire_date')->nullable(true);
			$table->string('shift_start_time')->nullable(true);
			$table->string('shift_end_time')->nullable(true);
			$table->string('salary')->nullable(true);
			$table->string('emergency_contact')->nullable(true);
			$table->string('first_name')->nullable(true);
			$table->string('last_name')->nullable(true);
			$table->longText('address')->nullable(true);
			$table->string('phone')->nullable(true);

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
        Schema::drop('employees');
    }
}
