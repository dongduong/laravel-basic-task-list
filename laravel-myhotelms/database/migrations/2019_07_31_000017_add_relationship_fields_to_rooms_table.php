<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRoomsTable extends Migration
{
    public function up()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->unsignedInteger('room_type_id');
            $table->foreign('room_type_id', 'room_type_fk_207855')->references('id')->on('room_types');
            $table->unsignedInteger('room_status_id')->nullable();
            $table->foreign('room_status_id', 'room_status_fk_207856')->references('id')->on('room_statuses');
        });
    }
}
