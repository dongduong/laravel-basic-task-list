<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1564594501870ContactCompaniesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('contact_companies')) {
            Schema::create('contact_companies', function (Blueprint $table) {
                $table->increments('id');
                $table->string('company_name')->nullable();
                $table->string('company_address')->nullable();
                $table->string('company_website')->nullable();
                $table->string('company_email')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('contact_companies');
    }
}
