<?php

use App\Course;
use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    public function run()
    {
        factory(Course::class, 5)->create();

        foreach (Course::all() as $course) {
            $course->teachers()->sync([1]);
        }
    }
}
