<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$Du5WL0jqxd7dvm0vsASIk.qWDcqRQGdpJLVq5zAG.7AG98zilv3lW',
                'remember_token' => null,
                'created_at'     => '2019-07-28 04:13:49',
                'updated_at'     => '2019-07-28 04:13:49',
                'deleted_at'     => null,
            ],
            [
                'id'             => 2,
                'name'           => 'Manager',
                'email'          => 'manager@manager.com',
                'password'       => '$2y$10$Du5WL0jqxd7dvm0vsASIk.qWDcqRQGdpJLVq5zAG.7AG98zilv3lW',
                'remember_token' => null,
                'created_at'     => '2019-07-28 04:13:50',
                'updated_at'     => '2019-07-28 04:13:50',
                'deleted_at'     => null,
            ],
            [
                'id'             => 3,
                'name'           => 'User',
                'email'          => 'user@user.com',
                'password'       => '$2y$10$Du5WL0jqxd7dvm0vsASIk.qWDcqRQGdpJLVq5zAG.7AG98zilv3lW',
                'remember_token' => null,
                'created_at'     => '2019-07-28 04:13:51',
                'updated_at'     => '2019-07-28 04:13:51',
                'deleted_at'     => null,
            ]
        ];

        User::insert($users);
    }
}
