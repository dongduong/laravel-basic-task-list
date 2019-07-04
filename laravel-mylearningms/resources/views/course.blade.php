@extends('layouts.home')

@section('main')

  <h2>{{ $course->title }}</h2>

  <p>{{ $course->description }}</p>

  @foreach( $course->publishedLessons as $lesson )
    @if ($lesson->free_lesson) (FREE!) @endif{{ $loop->iteration }}. &nbsp;<a href="#">{{ $lesson->title }}</a>
    <p>{{ $lesson->short_text }}</p>
  @endforeach

@endsection
