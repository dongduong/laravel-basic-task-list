<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [[
            'id'             => 1,
            'name'           => 'Admin',
            'email'          => 'admin@admin.com',
            'password'       => '$2y$10$VSk9nXYKMljFV2SOfpLVY..eEMlSmqSSoMwamKaDtsCvfNvQbiW0G',
            'remember_token' => null,
            'created_at'     => '2019-06-26 08:21:30',
            'updated_at'     => '2019-06-26 08:21:30',
            'deleted_at'     => null,
        ]];

        User::insert($users);
    }
}
