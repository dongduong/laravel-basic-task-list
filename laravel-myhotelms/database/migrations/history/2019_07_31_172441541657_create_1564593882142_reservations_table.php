<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1564593882142ReservationsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('reservations')) {
            Schema::create('reservations', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('guest_id');
                $table->foreign('guest_id', 'guest_fk_207899')->references('id')->on('guests');
                $table->unsignedInteger('room_id');
                $table->foreign('room_id', 'room_fk_207900')->references('id')->on('rooms');
                $table->date('check_in_date');
                $table->date('check_out_date');
                $table->integer('adults')->nullable();
                $table->integer('children')->nullable();
                $table->string('additional_information')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
