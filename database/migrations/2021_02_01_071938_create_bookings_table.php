<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		if (!Schema::hasTable('bookings')) {
            Schema::create('bookings', function (Blueprint $table) {
                $table->engine = "InnoDB";
				$table->unsignedBigInteger('user_id');
				$table->unsignedBigInteger('toy_id');
                $table->tinyInteger('state')->comment('0 > undefined, 1 > paid, 2 > canceled, 3 > pending')->nullable();
				$table->foreign('user_id')->references('id')->on('users')->onDelete('NO ACTION')->onUpdate('NO ACTION');
                $table->foreign('toy_id')->references('id')->on('toys')->onDelete('NO ACTION')->onUpdate('NO ACTION');
                $table->primary(['toy_id', 'user_id']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
