@extends('layouts.home')

@section('main')

          @foreach($courses as $course)
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="{{ route('courses.show', [$course->slug])}}">{{ $course->title}}</a>
                </h4>
                <h5>{{ $course->price}}</h5>
                <p class="card-text">{{ $course->description}}</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>
          @endforeach

@endsection
