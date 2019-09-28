<?php

namespace App\Services\Payment;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
use URL;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Amount;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Exception\PayPalConnectionException;

class PaypalService
{
    public $_api_context;

    public function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function pay(Request $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();
        $item_1->setName('Item 1') /** item name **/
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount')); /** unit price **/

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('amount'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('payment.paypal.status')) /** Specify return URL **/
            ->setCancelUrl(URL::route('payment.paypal.status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($this->_api_context);
        } catch (PayPalConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error', 'Connection timeout');           
            } else {
                \Session::put('error', 'Some error occur, sorry for inconvenient');
            }
            return null;
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        if (isset($redirect_url)) {
            /** Create Hotel Payment**/
            $paymentService = new PaymentService();
            $paymentService->create(
                $payment->getId(),
                "PRE-PAYMENT",
                $request->get('amount'),
                3, //Paypal
                1, //On Progress
                $request->get('reservation_id')
            );
            return $redirect_url;
        }

        \Session::put('error', 'Unknown error occurred');
        return null;
    }

    public function getPaymentStatus()
    {
        if (empty(Input::get('paymentId')) || empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            \Session::put('error', 'Payment failed');
            return false;
        }

        /** Get the payment ID before session clear **/
        $payment_id = Input::get('paymentId');
        $token = 
        
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        $paymentService = new PaymentService();

        try {
            /**Execute the payment **/
            $result = $payment->execute($execution, $this->_api_context);
            if ($result->getState() == 'approved')
            {
                $description = "PayerID : " . Input::get('PayerID');
                $paymentService->updateStatusSuccess(
                    $payment_id,
                    Input::get('token'),
                    $description
                );
                return true;
            } else if ($result->getState() == 'failed') {
                $paymentService->updateStatusFailed($payment_id);
                \Session::put('error', 'Payment failed');
                return false;
            } else {
                // keep status and will be set 'Cancelled' in 24h
                \Session::put('error', 'Payment failed');
                return false;
            }

         } catch (PayPalConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error', 'Connection timeout');           
            } else {
                \Session::put('error', 'Some error occur, sorry for inconvenient');
            }
            $paymentService->updateStatusFailed($payment_id);
            return false;
        }
    }
}