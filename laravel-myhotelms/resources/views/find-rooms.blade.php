@extends('layouts.home')

@section('main')
  @include('partials.hotel-menu')

  <div class="block-30 block-30-sm item" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-10">
          <span class="subheading-sm">Rooms</span>
          <h2 class="heading">Find Rooms &amp; Reservation</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row mb-5">
      <div class="col-md-12">
        <div class="block-32">
          @include('partials.check-availability')
        </div>
      </div>
    </div>
  </div>

@endsection