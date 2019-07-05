<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [[
            'id'         => 1,
            'title'      => 'Admin',
            'created_at' => '2019-06-26 08:21:30',
            'updated_at' => '2019-06-26 08:21:30',
            'deleted_at' => null,
        ],
            [
                'id'         => 2,
                'title'      => 'Teacher',
                'created_at' => '2019-06-26 08:21:30',
                'updated_at' => '2019-06-26 08:21:30',
                'deleted_at' => null,
            ],
            [
                'id'         => 3,
                'title'      => 'Student',
                'created_at' => '2019-06-26 08:21:30',
                'updated_at' => '2019-06-26 08:21:30',
                'deleted_at' => null,
            ]];

        Role::insert($roles);
    }
}
