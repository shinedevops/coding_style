<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->engine = "InnoDB";
                $table->bigIncrements('id');
                $table->string('email', 45)->unique();
                $table->string('username', 45);
                $table->string('surname', 45)->nullable();
                $table->tinyInteger('gender')->nullable(); 
                $table->string('date_of_birth', 45)->nullable();
                $table->string('country', 45)->nullable();
                $table->string('city', 45)->nullable();
                $table->string('phone_number', 45)->nullable();
                $table->string('payment_method', 45)->nullable();
                $table->tinyInteger('state')->comment('0 > pending, 1 > activated')->nullable();
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
        Schema::dropIfExists('users');
    }
}
