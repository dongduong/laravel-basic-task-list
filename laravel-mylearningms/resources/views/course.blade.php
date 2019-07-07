@extends('layouts.home')

@section('main')

  <h2>{{ $course->title }}</h2>

  <p>{{ $course->description }}</p>

  <p>
  	@if (\Auth::check())
  	  @if ( $course->students()->where('user_id', \Auth::id())->count() == 0 )
  		<form action="{{ route('courses.payment') }}" method="post">
  			<input type="hidden" name="course_id" value="{{ $course->id }}">
  			<script 
  				src="https://checkout.stripe.com/checkout.js" class="stripe-button"
  				data-key="{{ env('PUB_STRIPE_API_KEY') }}"
  				data-amount="{{ $course->price * 100 }}"
  				data-currency="usd"
  				data-name="My Learning MS"
  				data-label="Buy course (${{ $course->price }})"
  				data-description="Course: {{ $course->title }}"
  				data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
  				data-locale="auto"
  				data-zip-code="false">	
  			</script>
  			{{ csrf_field() }}
  		</form>
  	  @endif
  	@else
  		<a href="{{ route('register') }}?redirect_url={{ route('courses.show', [$course->slug]) }}" 
  	class="btn btn-primary">Buy course (${{ $course->price }})</a>
  	@endif
  </p>

  @foreach( $course->publishedLessons as $lesson )
    @if ($lesson->free_lesson) (FREE!) @endif{{ $loop->iteration }}. 
    &nbsp;<a href="{{ route('lessons.show', [$lesson->slug])}}">{{ $lesson->title }}</a>
    <p>{{ $lesson->short_text }}</p>
  @endforeach

@endsection
