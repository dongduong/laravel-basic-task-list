<?php

use App\RoomStatus;
use Illuminate\Database\Seeder;

class RoomStatusTableSeeder extends Seeder
{
    public function run()
    {
        $roomStatuses = [[
            'id'         => '1',
            'name'       => 'Available',
            'created_at' => '2019-07-31 17:32:06',
            'updated_at' => '2019-07-31 17:32:06',
        ],
            [
                'id'         => '2',
                'name'       => 'Booking',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'         => '3',
                'name'       => 'On Repair',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'         => '4',
                'name'       => 'Unknown',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ]];

        RoomStatus::insert($roomStatuses);
    }
}
