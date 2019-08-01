<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1564594326970TaskTagsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('task_tags')) {
            Schema::create('task_tags', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('task_tags');
    }
}
