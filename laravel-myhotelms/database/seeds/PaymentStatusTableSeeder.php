<?php

use App\PaymentStatus;
use App\Enums\PAYMENT_STATUS;
use Illuminate\Database\Seeder;

class PaymentStatusTableSeeder extends Seeder
{
    public function run()
    {
        $paymentStatuses = [[
            'id'         => PAYMENT_STATUS::Waiting,
            'name'       => 'Waiting',
            'created_at' => '2019-07-31 17:32:06',
            'updated_at' => '2019-07-31 17:32:06',
        ],
            [
                'id'         => PAYMENT_STATUS::OnProgress,
                'name'       => 'On Progress',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'         => PAYMENT_STATUS::Success,
                'name'       => 'Success',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'         => PAYMENT_STATUS::Cancelled,
                'name'       => 'Cancelled',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'         => PAYMENT_STATUS::Failed,
                'name'       => 'Failed',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'         => PAYMENT_STATUS::Withdraw,
                'name'       => 'Withdraw',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ]];

        PaymentStatus::insert($paymentStatuses);
    }
}
