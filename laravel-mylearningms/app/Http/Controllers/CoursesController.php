<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Stripe\Customer;
use Stripe\Charge;
use Stripe\Stripe;

class CoursesController extends Controller
{
    
    public function show($course_slug)
    {
    	$course = Course::where('slug', $course_slug)->with('publishedLessons')->firstOrFail();
    	return view('course', compact('course'));
    }

    public function payment(Request $request)
    {
    	$course =Course::findOrFail($request->get('course_id'));
    	$this->createStripeCharge($request);
    	
    	$course->students()->attach(\Auth::id());

    	return redirect()->back()->with('success', 'Payment completed successfully.');
    }

    private function createStripeCharge($request)
    {
    	Stripe::setApiKey(env('STRIPE_API_KEY'));

    	try {
    		$customer = Customer::create([
    			'email' => $request->get('stripeEmail'),
    			'source' => $request->get('stripeToken')
    		]);

    		$charge = Charge::create([
    			'customer' => $customer->id,
    			'amount' => $request->get('amount'),
    			'currency' => "usd"
    		]);
    	} catch (\Stripe\Error\Base $e)
    	{
    		return redirect()->back()->withError($e)->send();
    	}
    }
}
