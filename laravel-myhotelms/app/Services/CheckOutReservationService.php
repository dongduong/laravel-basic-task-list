<?php

namespace App\Services;

use App\Reservation;

class CheckOutReservationService
{
    public function perform($reservation_id)
    {
    	$reservation = Reservation::find($reservation_id);

    	//only check-in when room status is Booking
    	if ($reservation->room->room_status_id == 2) {
	        //update room status as Available (or Checkout/On Clean later)
	        $updateStatusRoomService = new UpdateStatusRoomService();
	        $updateStatusRoomService->perform($reservation->room_id, 1);

	        $reservation->update(['reservation_status_id' => 4, 'editing_user_id' => \Auth::user()->id]);
	        //TODO: update again check out date at datetime perform

	        $historyService = new HistoryReservationService();
	        $historyService->save($reservation);
	        return $reservation;
	    } else {
	    	//TODO: error handling
	    }
    }
}
