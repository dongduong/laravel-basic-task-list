<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipToReservationHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservation_histories', function (Blueprint $table) {
            $table->unsignedInteger('edit_user_id')->nullable();
            $table->foreign('edit_user_id', 'edit_user_fk_207968')->references('id')->on('users');

            $table->unsignedInteger('reservation_id')->nullable();
            $table->foreign('reservation_id', 'reservation_fk_207969')->references('id')->on('reservations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservation_histories', function (Blueprint $table) {
            //
        });
    }
}
