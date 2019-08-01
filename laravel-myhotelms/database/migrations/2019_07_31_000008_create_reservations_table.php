<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
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
