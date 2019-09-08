<?php

namespace App\Services\Payment;

use App\Payment;

class PaymentService
{
    public function create($paymentid, $payment_type, $amount, $payment_method_id, $payment_status_id, $reservation_id)
    {
        $payment = Payment::create([
            'paymentid' => $paymentid,
            'payment_type' => $payment_type,
            'amount' => $amount,
            'payment_method_id' => $payment_method_id,
            'payment_status_id' => $payment_status_id,
            'reservation_id' => $reservation_id
        ]);

        return true;
    }

    public function updateStatusSuccess($paymentid, $token, $description){
    	$payment = Payment::where('paymentid', $paymentid)->first();
    	if ($payment) {
    		$payment->update([
    			'token' => $token,
    			'description' => $description,
    			'payment_status_id' => 2
    		]);

    		return true;
    	} else {
    		return false;
    	}
    }

    public function updateStatusFailed($paymentid){
    	$payment = Payment::where('paymentid', $paymentid)->first();
    	if ($payment) {
    		$payment->update([
    			'payment_status_id' => 4
    		]);

    		return true;
    	} else {
    		return false;
    	}
    }

    public function updateStatusCancelled($paymentid){
    	$payment = Payment::where('paymentid', $paymentid)->first();
    	if ($payment) {
    		$payment->update([
    			'payment_status_id' => 3
    		]);

    		return true;
    	} else {
    		return false;
    	}
    }

    public function updateStatusWithdraw($paymentid){
    	$payment = Payment::where('paymentid', $paymentid)->first();
    	if ($payment) {
    		$payment->update([
    			'payment_status_id' => 5
    		]);

    		return true;
    	} else {
    		return false;
    	}
    }

    public function checkPrePaymentSuccess($reservation_id) {
    	$payment = Payment::where(['reservation_id' => $reservation_id, 'payment_type' => 'PRE-PAYMENT'])->first();
    	if ($payment) {
    		return true;
    	} else {
    		return false;
    	}
    }
}
