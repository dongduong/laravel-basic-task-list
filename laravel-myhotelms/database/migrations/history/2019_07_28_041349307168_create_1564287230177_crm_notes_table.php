<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1564287230177CrmNotesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('crm_notes')) {
            Schema::create('crm_notes', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('customer_id')->nullable();
                $table->foreign('customer_id', 'customer_fk_198540')->references('id')->on('crm_customers');
                $table->longText('note')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('crm_notes');
    }
}
