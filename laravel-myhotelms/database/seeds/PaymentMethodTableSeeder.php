<?php

use App\PaymentMethod;
use App\Enums\PAYMENT_METHOD;
use Illuminate\Database\Seeder;

class PaymentMethodTableSeeder extends Seeder
{
    public function run()
    {
        $paymentMethods = [[
            'id'         => PAYMENT_METHOD::InternetBanking,
            'name'       => 'Internet Bank Card',
            'created_at' => '2019-07-31 17:32:06',
            'updated_at' => '2019-07-31 17:32:06',
        ],
            [
                'id'         => PAYMENT_METHOD::VisaMasterCard,
                'name'       => 'Visa/Master Card',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'         => PAYMENT_METHOD::Paypal,
                'name'       => 'Paypal',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'         => PAYMENT_METHOD::VNPay,
                'name'       => 'VNPay',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ],
            [
                'id'         => PAYMENT_METHOD::Tranfer,
                'name'       => 'Tranfer',
                'created_at' => '2019-07-31 17:32:06',
                'updated_at' => '2019-07-31 17:32:06',
            ]];

        PaymentMethod::insert($paymentMethods);
    }
}
