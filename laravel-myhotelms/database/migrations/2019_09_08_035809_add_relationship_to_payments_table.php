<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipToPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->unsignedInteger('payment_method_id')->nullable();
            $table->foreign('payment_method_id', 'payment_method_fk_207973')->references('id')->on('payment_methods');

            $table->unsignedInteger('payment_status_id')->nullable();
            $table->foreign('payment_status_id', 'payment_status_fk_207974')->references('id')->on('payment_statuses');

            $table->unsignedInteger('reservation_id')->nullable();
            $table->foreign('reservation_id', 'reservation_fk_207975')->references('id')->on('reservations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            //
        });
    }
}
