<a style="margin-top:20px;" class="btn btn-primary" href="#" data-toggle="modal" data-target="#checkinReservationModal"> Check-In Reservation </a>

<!-- Confirm Reservation Modal -->
<div class="modal fade" id="checkinReservationModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <form action="{{ route('admin.reservations.checkin', [$reservation->id]) }}" method="POST">
          <div class="modal-header"> 
            <h5 class="modal-title" id="confirmReservationModalScrollableTitle">Check-In Reservation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <p>Are you sure to <b>CHECK-IN</b> this reservation?</p>
                <p><i> - This reservation status will be changed to </i><span class="badge badge-primary">Operational</span></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Check-In Reservation">
          </div>
      </form>
    </div>
  </div>
</div>