<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1561539015440CourseUserPivotTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('course_user')) {
            Schema::create('course_user', function (Blueprint $table) {
                $table->unsignedInteger('course_id');
                $table->foreign('course_id', 'course_id_fk_138042')->references('id')->on('courses');
                $table->unsignedInteger('user_id');
                $table->foreign('user_id', 'user_id_fk_138042')->references('id')->on('users');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('course_user');
    }
}
