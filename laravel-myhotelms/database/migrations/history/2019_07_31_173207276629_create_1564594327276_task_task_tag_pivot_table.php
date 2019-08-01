<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1564594327276TaskTaskTagPivotTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('task_task_tag')) {
            Schema::create('task_task_tag', function (Blueprint $table) {
                $table->unsignedInteger('task_id');
                $table->foreign('task_id', 'task_id_fk_207931')->references('id')->on('tasks');
                $table->unsignedInteger('task_tag_id');
                $table->foreign('task_tag_id', 'task_tag_id_fk_207931')->references('id')->on('task_tags');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('task_task_tag');
    }
}
