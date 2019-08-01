<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1564591783664RoomStatusesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('room_statuses')) {
            Schema::create('room_statuses', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('room_statuses');
    }
}
