<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1564287230390CrmDocumentsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('crm_documents')) {
            Schema::create('crm_documents', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('customer_id')->nullable();
                $table->foreign('customer_id', 'customer_fk_198546')->references('id')->on('crm_customers');
                $table->string('name')->nullable();
                $table->longText('description')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('crm_documents');
    }
}
