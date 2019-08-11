<?php

use App\Room;
use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    public function run()
    {
        $rooms = [[
                'id'                => '1',
                'room_number'       => 'R101',
                'floor'             => '1',
                'slug'              => 'r101',
                'description'       => 'Room 101',
                'room_type_id'      => '1',
                'room_status_id'    => '1',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'                => '2',
                'room_number'       => 'R102',
                'floor'             => '1',
                'slug'              => 'r102',
                'description'       => 'Room 102',
                'room_type_id'      => '2',
                'room_status_id'    => '1',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'                => '3',
                'room_number'       => 'R103',
                'floor'             => '1',
                'slug'              => 'r103',
                'description'       => 'Room 103',
                'room_type_id'      => '3',
                'room_status_id'    => '1',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'                => '4',
                'room_number'       => 'R201',
                'floor'             => '2',
                'slug'              => 'r201',
                'description'       => 'Room 201',
                'room_type_id'      => '4',
                'room_status_id'    => '1',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'                => '5',
                'room_number'       => 'R202',
                'floor'             => '2',
                'slug'              => 'r202',
                'description'       => 'Room 202',
                'room_type_id'      => '5',
                'room_status_id'    => '1',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'                => '6',
                'room_number'       => 'R203',
                'floor'             => '2',
                'slug'              => 'r203',
                'description'       => 'Room 203',
                'room_type_id'      => '1',
                'room_status_id'    => '1',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'                => '7',
                'room_number'       => 'R301',
                'floor'             => '3',
                'slug'              => 'r301',
                'description'       => 'Room 301',
                'room_type_id'      => '2',
                'room_status_id'    => '1',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'                => '8',
                'room_number'       => 'R302',
                'floor'             => '3',
                'slug'              => 'r302',
                'description'       => 'Room 302',
                'room_type_id'      => '3',
                'room_status_id'    => '1',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'                => '9',
                'room_number'       => 'R303',
                'floor'             => '3',
                'slug'              => 'r303',
                'description'       => 'Room 2303',
                'room_type_id'      => '4',
                'room_status_id'    => '3',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'                => '10',
                'room_number'       => 'R401',
                'floor'             => '4',
                'slug'              => 'r401',
                'description'       => 'Room 401',
                'room_type_id'      => '5',
                'room_status_id'    => '4',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ]];

        Room::insert($rooms);
    }
}
