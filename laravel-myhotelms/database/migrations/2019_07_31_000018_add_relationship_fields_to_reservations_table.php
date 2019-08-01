<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToReservationsTable extends Migration
{
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->unsignedInteger('guest_id');
            $table->foreign('guest_id', 'guest_fk_207899')->references('id')->on('guests');
            $table->unsignedInteger('room_id');
            $table->foreign('room_id', 'room_fk_207900')->references('id')->on('rooms');
        });
    }
}
