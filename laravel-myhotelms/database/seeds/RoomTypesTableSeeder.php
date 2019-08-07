<?php

use App\RoomType;
use Illuminate\Database\Seeder;

class RoomTypesTableSeeder extends Seeder
{
    public function run()
    {
        $roomTypes = [[
                'id'         => '1',
                'name'       => 'Standard',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'         => '2',
                'name'       => 'Superior',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'         => '3',
                'name'       => 'Deluxe',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'         => '4',
                'name'       => 'Suite',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'         => '5',
                'name'       => 'Family',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ]];

        RoomType::insert($roomTypes);
    }
}
