<a style="margin-top:20px;" class="btn btn-danger" href="#" data-toggle="modal" data-target="#cancelReservationModal"> Cancel Reservation </a>

<!-- Cancel Reservation Modal -->
<div class="modal fade" id="cancelReservationModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <form action="{{ route('admin.reservations.cancel', [$reservation->id]) }}" method="POST">
          <div class="modal-header">
            <h5 class="modal-title" id="cancelReservationModalScrollableTitle">Cancel Reservation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <p>Are you sure to <b>CANCEL</b> this reservation?</p>
                <p><i> - This reservation status will be changed to </i><span class="badge badge-danger">Cancelled</span></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-danger" value="Cancel Reservation">
          </div>
      </form>
    </div>
  </div>
</div>