<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1564287229797CrmCustomersTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('crm_customers')) {
            Schema::create('crm_customers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('first_name')->nullable();
                $table->string('last_name')->nullable();
                $table->unsignedInteger('status_id')->nullable();
                $table->foreign('status_id', 'status_fk_198529')->references('id')->on('crm_statuses');
                $table->string('email')->nullable();
                $table->string('phone')->nullable();
                $table->string('address')->nullable();
                $table->string('skype')->nullable();
                $table->string('website')->nullable();
                $table->longText('description')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('crm_customers');
    }
}
