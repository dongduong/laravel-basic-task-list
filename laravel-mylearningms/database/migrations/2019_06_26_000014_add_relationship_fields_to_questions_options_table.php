<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToQuestionsOptionsTable extends Migration
{
    public function up()
    {
        Schema::table('questions_options', function (Blueprint $table) {
            $table->unsignedInteger('question_id')->nullable();
            $table->foreign('question_id', 'question_fk_138075')->references('id')->on('questions');
        });
    }
}
