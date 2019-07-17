@extends('layouts.home')

@section('sidebar')
 	<h1 class="my-4">{{ $lesson->course->title }}</h1>
	<div class="list-group">
	  @foreach ($lesson->course->publishedLessons as $list_lesson)
	  	<a href="{{ route('lessons.show', [$list_lesson->slug])}}" class="list-group-item" 
	  		@if ($list_lesson->id == $lesson->id) style="font-weigh: bold" @endif >{{ $loop->iteration }}. {{ $list_lesson->title }}</a>
	  @endforeach
	</div>
@endsection

@section('main')

  <h2>{{ $lesson->title }}</h2>

  @if (($lesson->course->students()->where('user_id', \Auth::id())->count() > 0) || ($lesson->free_lesson == 1) )
  	<p>{!! $lesson->full_text !!}</p>
  @else 
  	Please <a href="{{ route('courses.show', [$lesson->course->slug]) }}"> go back </a> and buy the course.
  @endif

  @if($lesson->test)
     <hr/>
     <form action="" method="post">
     	<h3>Test: {{ $lesson->test->title }}</h3>
     	@foreach ($lesson->test->questions as $question)
     	  <b>{{  $loop->iteration }}. {{ $question->question }}</b>
     	  <br/>
     	  @foreach ($question->options as $option)
     	  	<input type="radio" name="question_{{ $question->id }}"/> {{ $option->option_text }} <br/>
     	  @endforeach
     	  <br/>
     	@endforeach
     </form>
  @endif

  <hr>

  @if ($previous_lesson)
    <p><a href="{{ route('lessons.show', [$previous_lesson->slug]) }}"><< {{ $previous_lesson->title }}</a></p>
    <hr>
  @endif

  @if ($next_lesson)
    <p><a href="{{ route('lessons.show', [$next_lesson->slug]) }}">{{ $next_lesson->title }} >></a></p>
    <hr>
  @endif

@endsection
 