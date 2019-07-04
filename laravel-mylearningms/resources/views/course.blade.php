@extends('layouts.home')

@section('main')

  <h2>{{ $course->title }}</h2>

  <p>{{ $course->description }}</p>

@endsection
