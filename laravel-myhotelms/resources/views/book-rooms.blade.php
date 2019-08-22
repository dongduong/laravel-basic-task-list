@extends('layouts.home')

@section('main')
  @include('partials.hotel-menu')

  <div class="block-30 block-30-sm item" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-10">
          <span class="subheading-sm">Rooms</span>
          <h2 class="heading">Book Rooms</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row mb-5">
      <div class="col-md-8">
        <h2 class="mt0">Reservation Form</h2>
        <form action="#" method="post" class="probootstrap-form">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <div class="form-field">
              <input type="text" class="form-control" id="address" name="address">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="city">City</label>
                <div class="form-field">
                  <input type="text" class="form-control" id="city" name="city">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="country">Country</label>
                <div class="form-field">
                  <input type="text" class="form-control" id="country" name="country">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <div class="form-field">
              <input type="email" class="form-control" id="email" name="email">
            </div>
          </div>
          <div class="form-group">
            <label for="phone">Phone</label>
            <div class="form-field">
              <input type="text" class="form-control" id="phone" name="phone">
            </div>
          </div>
          <div class="form-group">
            <label for="room">Room</label>
            <div class="form-field">
              <select name="room_id" id="room" class="form-control select2" required>
                  @foreach($rooms as $id => $room)
                      <option value="{{ $id }}">{{ $room }}</option>
                  @endforeach
              </select>
              @if($errors->has('room_id'))
                  <p class="help-block">
                      {{ $errors->first('room_id') }}
                  </p>
              @endif
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="date-arrival">Arrival</label>
                <div class="field-icon-wrap">
                  <div class="icon"><span class="icon-calendar"></span></div>
                  <input type="text" id="checkin_date" name="checkin_date" class="form-control datetimepicker" placeholder="" required>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="date-departure">Departure</label>
                <div class="field-icon-wrap">
                  <div class="icon"><span class="icon-calendar"></span></div>
                  <input type="text" id="checkout_date" name="checkout_date" class="form-control datetimepicker" placeholder="" required>
                </div>
              </div>
            </div>
          </div>

          <div class="row mb30">
            <div class="col-md-6">
              <div class="form-group">
                <label for="adults">Adults</label>
                <div class="form-field">
                  <select name="adults" id="adults" class="form-control">
                    <option value="">Number of Adults</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4+</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="children">Children</label>
                <div class="form-field">
                  <select name="children" id="children" class="form-control">
                    <option value="">Number of Children</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4+</option>
                  </select>
                </div>
                
              </div>
            </div>
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary btn-lg" id="submit" name="submit" value="Reserve">
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection