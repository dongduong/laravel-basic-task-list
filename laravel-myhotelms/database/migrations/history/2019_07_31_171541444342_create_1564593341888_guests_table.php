<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1564593341888GuestsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('guests')) {
            Schema::create('guests', function (Blueprint $table) {
                $table->increments('id');
                $table->string('first_name');
                $table->string('last_name');
                $table->string('address');
                $table->string('email')->nullable();
                $table->string('phone')->nullable();
                $table->string('city')->nullable();
                $table->string('country')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('guests');
    }
}
