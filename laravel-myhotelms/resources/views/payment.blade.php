@extends('layouts.home')

@section('main')
  @include('partials.hotel-menu')

  <div class="block-30 block-30-sm item" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-10">
          <span class="subheading-sm">Rooms</span>
          <h2 class="heading">Payment</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    @if ($message = Session::get('success'))
      <div class="row mb-2">
          <div class="col-lg-12">
              <div class="alert alert-success" role="alert">{{ $message }}</div>
          </div>
      </div>
    <?php Session::forget('success');?>
    @endif
    @if ($message = Session::get('error'))
      <div class="row mb-2">
          <div class="col-lg-12">
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
          </div>
      </div>
    <?php Session::forget('error');?>
    @endif

    <div class="row mb-5">
      <div class="col-md-12">
        <div class="block-32">
          @include('partials.payment-form')
        </div>
      </div>
    </div>
  </div>

@endsection