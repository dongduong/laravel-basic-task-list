<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1564594502386ContactContactsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('contact_contacts')) {
            Schema::create('contact_contacts', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('company_id')->nullable();
                $table->foreign('company_id', 'company_fk_207961')->references('id')->on('contact_companies');
                $table->string('contact_first_name')->nullable();
                $table->string('contact_last_name')->nullable();
                $table->string('contact_phone_1')->nullable();
                $table->string('contact_phone_2')->nullable();
                $table->string('contact_email')->nullable();
                $table->string('contact_skype')->nullable();
                $table->string('contact_address')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('contact_contacts');
    }
}
