<?php

namespace App\Services;

use App\Reservation;

class CheckInReservationService
{
    public function perform($reservation_id)
    {
    	$reservation = Reservation::find($reservation_id);
    	
    	//only check-in when room status is Available
    	//TODO: validate date check in reservation, if is not today, verify range of date again
    	if ($reservation->room->room_status_id == 1) {

	        //update room status as booking
	        $updateStatusRoomService = new UpdateStatusRoomService();
	        $updateStatusRoomService->perform($reservation, 2);

	        $reservation->update(['reservation_status_id' => 3, 'editing_user_id' => \Auth::user()->id]);
	        $historyService = new HistoryReservationService();
	        $historyService->save($reservation);
	        return $reservation;
	    } else {
	    	//TODO: error handling
	    }
    }
}
