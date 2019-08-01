<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1564593020804RoomsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('rooms')) {
            Schema::create('rooms', function (Blueprint $table) {
                $table->increments('id');
                $table->string('room_number');
                $table->integer('floor')->nullable();
                $table->string('slug');
                $table->unsignedInteger('room_type_id');
                $table->foreign('room_type_id', 'room_type_fk_207855')->references('id')->on('room_types');
                $table->unsignedInteger('room_status_id')->nullable();
                $table->foreign('room_status_id', 'room_status_fk_207856')->references('id')->on('room_statuses');
                $table->longText('description')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
