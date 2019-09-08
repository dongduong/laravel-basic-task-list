@if (isset($reservation) && !$reservation->isPaidPrePayment())
  <form class="w3-container w3-display-middle w3-card-4 " method="POST" id="payment-form"  action="{{ route('payment.paypal') }}">
      {{ csrf_field() }}
      <h2 class="w3-text-blue">Payment Reservation</h2>
      <p>You need pay mount 50% on total price to complete the reservation </p>
      <p>      
      <label class="w3-text-blue"><b>Amount: </b></label>
      <b>{{ $reservation->prePayAmount() }} $</b>

      <h4>Pays methods:</h4>
        <!-- Group of default radios - option 1 -->
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="groupOfDefaultRadios">
          <label class="custom-control-label" for="defaultGroupExample1">Internet Bank Cards</label>
        </div>

        <!-- Group of default radios - option 2 -->
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="defaultGroupExample2" name="groupOfDefaultRadios" checked>
          <label class="custom-control-label" for="defaultGroupExample2">Paypal</label>
        </div>

        <!-- Group of default radios - option 3 -->
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="defaultGroupExample3" name="groupOfDefaultRadios">
          <label class="custom-control-label" for="defaultGroupExample3">VNPay</label>
        </div>

      <input type="hidden" name="amount" value="{{ $reservation->prePayAmount() }}"></p> 
      <input type="hidden" name="reservation_id" value="{{ $reservation->id }}"></p>    
      <button class="w3-btn w3-blue">Pay</button></p>
  </form>
@endif
@if (isset($reservation) && $reservation->isPaidPrePayment())
<p>Payment was already successfully ! </p>
@endif
