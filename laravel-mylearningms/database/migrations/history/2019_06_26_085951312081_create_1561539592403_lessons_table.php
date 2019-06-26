<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1561539592403LessonsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('lessons')) {
            Schema::create('lessons', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('course_id')->nullable();
                $table->foreign('course_id', 'course_fk_138054')->references('id')->on('courses');
                $table->string('title');
                $table->string('slug')->nullable();
                $table->longText('short_text')->nullable();
                $table->longText('full_text')->nullable();
                $table->integer('position');
                $table->boolean('free_lesson')->default(0)->nullable();
                $table->boolean('published')->default(0)->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
