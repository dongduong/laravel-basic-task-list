<a style="margin-top:20px;" class="btn btn-secondary" href="#" data-toggle="modal" data-target="#paymentReservationModal"> Send Payment Reservation </a>

<!-- Confirm Reservation Modal -->
<div class="modal fade" id="paymentReservationModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <form action="{{ route('admin.reservations.payment', [$reservation->id]) }}" method="POST">
          <div class="modal-header"> 
            <h5 class="modal-title" id="paymentReservationModalScrollableTitle">Reservation Send Payment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <p>Are you sure to process <b>PAYMENT</b> this reservation?</p>
                <p><i> - <b>Payment Email</b> will be sent to Guest </i></p>
                <p><i> - This reservation status will be changed to </i><span class="badge badge-secondary">On Payment</span></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-secondary" value="Send Payment Reservation">
          </div>
      </form>
    </div>
  </div>
</div>