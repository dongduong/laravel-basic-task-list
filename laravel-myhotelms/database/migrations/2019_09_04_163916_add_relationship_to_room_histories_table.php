<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipToRoomHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('room_histories', function (Blueprint $table) {
            $table->unsignedInteger('room_id')->nullable();
            $table->foreign('room_id', 'room_fk_207970')->references('id')->on('rooms');

            $table->unsignedInteger('room_status_id')->nullable();
            $table->foreign('room_status_id', 'room_status_fk_207971')->references('id')->on('room_statuses');

            $table->unsignedInteger('reservation_id')->nullable();
            $table->foreign('reservation_id', 'reservation_fk_207972')->references('id')->on('reservations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('room_histories', function (Blueprint $table) {
            //
        });
    }
}
