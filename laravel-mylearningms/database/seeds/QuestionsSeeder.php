<?php

use Illuminate\Database\Seeder;

use App\Question;
use App\QuestionsOption;

class QuestionsSeeder extends Seeder
{
    public function run()
    {
        factory(Question::class, 50)->create()->each(function($question) { 
            $question->options()->saveMany(factory(QuestionsOption::class, 4)->create());
            $question->tests()->attach(rand(1,50));
        });
    }
}
