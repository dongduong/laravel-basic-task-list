<?php

namespace App\Services\Payment;

use App\Payment;
use App\Enums\PAYMENT_STATUS;

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

    public function createPrePayment($amount, $reservation_id)
    {
        $payment = Payment::create([
            'payment_type' => "PRE-PAYMENT",
            'amount' => $amount,
            'payment_status_id' => PAYMENT_STATUS::Waiting,
            'reservation_id' => $reservation_id
        ]);
    }

    public function updateProcess($paymentid, $amount, $payment_method_id, $reservation_id) {
        $payment = Payment::where('reservation_id', $reservation_id)->first();
        if ($payment) {
            $payment->update([
                'paymentid' => $paymentid,
                'amount' => $amount,
                'payment_method_id' => $payment_method_id,
                'payment_status_id' => PAYMENT_STATUS::OnProgress
            ]);

            return true;
        } else {
            return false;
        }
    }

    public function updateStatusSuccess($paymentid, $token, $description){
    	$payment = Payment::where('paymentid', $paymentid)->first();
    	if ($payment) {
    		$payment->update([
    			'token' => $token,
    			'description' => $description,
    			'payment_status_id' => PAYMENT_STATUS::Success
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
    			'payment_status_id' => PAYMENT_STATUS::Failed
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
    			'payment_status_id' => PAYMENT_STATUS::Cancelled
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
    			'payment_status_id' => PAYMENT_STATUS::Withdraw
    		]);

    		return true;
    	} else {
    		return false;
    	}
    }

    public function checkPrePaymentSuccess($reservation_id) {
    	$payment = Payment::where(['reservation_id' => $reservation_id, 'payment_type' => 'PRE-PAYMENT', 'payment_status_id' => PAYMENT_STATUS::Success])->first();
    	if ($payment) {
    		return true;
    	} else {
    		return false;
    	}
    }
}
