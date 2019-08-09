<?php

use App\ReservationStatus;
use Illuminate\Database\Seeder;

class ReservationStatusTableSeeder extends Seeder
{
    public function run()
    {
        $reservationStatuses = [[
                'id'         => '1',
                'name'       => 'On Request',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'         => '2',
                'name'       => 'Confirmed',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'         => '3',
                'name'       => 'Operational',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'         => '4',
                'name'       => 'Completed',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'         => '5',
                'name'       => 'Cancelled',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'         => '6',
                'name'       => 'Cancelled With Penalty',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'         => '7',
                'name'       => 'No Show',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'         => '8',
                'name'       => 'No Show With Penalty',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'         => '9',
                'name'       => 'Unsuccessful',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ]];

        ReservationStatus::insert($reservationStatuses);
    }
}
