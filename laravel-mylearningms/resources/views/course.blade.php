@extends('layouts.home')

@section('main')

  <h2>{{ $course->title }}</h2>

  <p>{{ $course->description }}</p>

  <p><a href="{{ route('register') }}?redirect_url={{ route('courses.show', [$course->slug]) }}" 
  	class="btn btn-primary">Buy course (${{ $course->price }})</a></p>

  @foreach( $course->publishedLessons as $lesson )
    @if ($lesson->free_lesson) (FREE!) @endif{{ $loop->iteration }}. 
    &nbsp;<a href="{{ route('lessons.show', [$lesson->slug])}}">{{ $lesson->title }}</a>
    <p>{{ $lesson->short_text }}</p>
  @endforeach

@endsection
