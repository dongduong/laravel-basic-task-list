<?php

namespace App;

class FeatureFlag
{
    public static function process_payment() {
        $payment = \Config::get('feature.flag.payment');
        if ($payment) {
            return true;
        } else {
            return false;
        }
    }
}
