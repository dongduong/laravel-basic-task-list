<?php

use App\PaymentStatus;
use Illuminate\Database\Seeder;

class PaymentStatusTableSeeder extends Seeder
{
    public function run()
    {
        $paymentStatuses = [[
            'id'         => '1',
            'name'       => 'On Progress',
            'created_at' => '2019-07-31 17:32:06',
            'updated_at' => '2019-07-31 17:32:06',
        ],
            [
                'id'         => '2',
                'name'       => 'Success',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'         => '3',
                'name'       => 'Cancelled',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'         => '4',
                'name'       => 'Failed',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'         => '5',
                'name'       => 'Withdraw',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ]];

        PaymentStatus::insert($paymentStatuses);
    }
}
