<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1561540760003QuestionsOptionsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('questions_options')) {
            Schema::create('questions_options', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('question_id')->nullable();
                $table->foreign('question_id', 'question_fk_138075')->references('id')->on('questions');
                $table->longText('option_text');
                $table->boolean('correct')->default(0)->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('questions_options');
    }
}
