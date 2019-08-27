@extends('layouts.home')

@section('main')
  @include('partials.hotel-menu')

  <div class="block-30 block-30-sm item" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-10">
          <span class="subheading-sm">Rooms</span>
          <h2 class="heading">Reservation Successful !</h2>
        </div>
      </div>
    </div>
  </div>
  @if(isset($reservation) && !is_null($reservation))
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-12">
        <div class="block-32">
          <h2 class="mt0">Information</h2>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label><b>Reservation Code</b></label>
                <div class="form-field">
                  {{ $reservation->code }}
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label><b>Booking At</b></label>
                <div class="form-field">
                  {{ $reservation->created_at }}
                </div>
              </div>
            </div>
          </div>

          <h2 class="mt0">Guest</h2>
          <div class="form-group">
            <label><b>Name</b></label>
            <div class="form-field">
              {{ $reservation->guest->fullName() }}
            </div>
          </div>

          <div class="form-group">
            <label><b>Address</b></label>
            <div class="form-field">
              {{ $reservation->guest->address }}
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label><b>City</b></label>
                <div class="form-field">
                  {{ $reservation->guest->city }}
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label><b>Country</b></label>
                <div class="form-field">
                  {{ $reservation->guest->country }}
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label><b>Phone</b></label>
                <div class="form-field">
                  {{ $reservation->guest->phone }}
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label><b>Email</b></label>
                <div class="form-field">
                  {{ $reservation->guest->email }}
                </div>
              </div>
            </div>
          </div>

          <h2 class="mt0">Room</h2>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label><b>Room Number</b></label>
                <div class="form-field">
                  {{ $reservation->room->room_number }}
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label><b>Room Type</b></label>
                <div class="form-field">
                  {{ $reservation->room->room_type->name }}
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label><b>Check In Date</b></label>
                <div class="form-field">
                  {{ $reservation->check_in_date }}
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label><b>Check Out Date</b></label>
                <div class="form-field">
                  {{ $reservation->check_out_date }}
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label><b>Adults</b></label>
                <div class="form-field">
                  {{ $reservation->adults }}
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label><b>Children</b></label>
                <div class="form-field">
                  {{ $reservation->children }}
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row mb-5">
      <div class="col-md-12">
        <div class="block-32">
           <h5><i>Thank you !</i></h5>
           <p><i>An email was sent to <b>{{ $reservation->guest->email }}</b> about this reservation. We will contact and confirm with you as soon as posible.</i></p>
           <p><i>If you have any questions, please call to 084 8888 4444.</i></p>
           <a href="/"><< Home</a>
        </div>
      </div>
    </div>
  </div>
  @endif

@endsection