<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [[
            'id'         => '1',
            'title'      => 'user_management_access',
            'created_at' => '2019-06-26 09:23:38',
            'updated_at' => '2019-06-26 09:23:38',
        ],
            [
                'id'         => '2',
                'title'      => 'permission_create',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '3',
                'title'      => 'permission_edit',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '4',
                'title'      => 'permission_show',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '5',
                'title'      => 'permission_delete',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '6',
                'title'      => 'permission_access',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '7',
                'title'      => 'role_create',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '8',
                'title'      => 'role_edit',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '9',
                'title'      => 'role_show',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '10',
                'title'      => 'role_delete',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '11',
                'title'      => 'role_access',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '12',
                'title'      => 'user_create',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '13',
                'title'      => 'user_edit',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '14',
                'title'      => 'user_show',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '15',
                'title'      => 'user_delete',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '16',
                'title'      => 'user_access',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '17',
                'title'      => 'course_create',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '18',
                'title'      => 'course_edit',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '19',
                'title'      => 'course_show',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '20',
                'title'      => 'course_delete',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '21',
                'title'      => 'course_access',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '22',
                'title'      => 'lesson_create',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '23',
                'title'      => 'lesson_edit',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '24',
                'title'      => 'lesson_show',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '25',
                'title'      => 'lesson_delete',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '26',
                'title'      => 'lesson_access',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '27',
                'title'      => 'question_create',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '28',
                'title'      => 'question_edit',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '29',
                'title'      => 'question_show',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '30',
                'title'      => 'question_delete',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '31',
                'title'      => 'question_access',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '32',
                'title'      => 'questions_option_create',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '33',
                'title'      => 'questions_option_edit',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '34',
                'title'      => 'questions_option_show',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '35',
                'title'      => 'questions_option_delete',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '36',
                'title'      => 'questions_option_access',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '37',
                'title'      => 'test_create',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '38',
                'title'      => 'test_edit',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '39',
                'title'      => 'test_show',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '40',
                'title'      => 'test_delete',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ],
            [
                'id'         => '41',
                'title'      => 'test_access',
                'created_at' => '2019-06-26 09:23:38',
                'updated_at' => '2019-06-26 09:23:38',
            ]];

        Permission::insert($permissions);
    }
}
