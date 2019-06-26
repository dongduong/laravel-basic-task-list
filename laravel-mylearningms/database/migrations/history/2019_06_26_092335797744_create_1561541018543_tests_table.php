<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1561541018543TestsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('tests')) {
            Schema::create('tests', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('course_id')->nullable();
                $table->foreign('course_id', 'course_fk_138082')->references('id')->on('courses');
                $table->unsignedInteger('lesson_id')->nullable();
                $table->foreign('lesson_id', 'lesson_fk_138083')->references('id')->on('lessons');
                $table->string('title')->nullable();
                $table->longText('description')->nullable();
                $table->boolean('published')->default(0)->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('tests');
    }
}
