<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		if (!Schema::hasTable('toys')) {
            Schema::create('toys', function (Blueprint $table) {
                $table->engine = "InnoDB";
                $table->bigIncrements('id');
                $table->string('name', 45);
                $table->string('price', 45);
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
        Schema::dropIfExists('toys');
    }
}
