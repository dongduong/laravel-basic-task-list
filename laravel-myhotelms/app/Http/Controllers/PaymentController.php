<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\Services\Payment\PaypalService;
use Illuminate\Http\Request;
use Redirect;

class PaymentController extends Controller
{
 	public function index(Request $request)
 	{
 		if($request->input('token')) {
            $reservation = Reservation::where('token', $request->input('token'))->first();
            if ($reservation){
            	return view('payment', compact('reservation'));
            }
        }

        return redirect('/');
 	}

 	public function success(Request $request)
    {
        // if($request->input('token')) {
        //     $reservation = Reservation::where('token', $request->input('token'))->first();
        //     return view('book-success', compact('reservation'));
        // }
        // else {
        //     return redirect('/');
        // }

        return view('payment-success');
    }

    public function failed(Request $request)
    {
    	return view('payment-failed');
    }

    public function paypal(Request $request)
    {
    	//TODO: check FF payment

    	$service = new PaypalService();
    	$redirect_url = $service->pay($request);

    	if ($redirect_url) {
    		/** redirect to paypal **/
            return Redirect::away($redirect_url);
    	} else {
    		return redirect()->route('payment.failed');
    	}
    }

    //callback from Paypal
    public function paypalStatus(Request $request)
    {
    	$service = new PaypalService();
    	$result = $service->getPaymentStatus();
    	if ($result) {
    		return redirect()->route('payment.success');
    	} else {
    		return redirect()->route('payment.failed');
    	}
    }
}
