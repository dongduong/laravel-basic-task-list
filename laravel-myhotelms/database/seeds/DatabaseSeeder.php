<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            TaskStatusTableSeeder::class,
            RoomTypesTableSeeder::class,
            RoomStatusTableSeeder::class,
            ReservationStatusTableSeeder::class,
            RoomsTableSeeder::class,
            PaymentStatusTableSeeder::class,
            PaymentMethodTableSeeder::class,
        ]);
    }
}
