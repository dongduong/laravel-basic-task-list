@extends('layouts.home')

@section('main')
    
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="/">BrightHotel</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="{{ route('rooms.index') }}" class="nav-link">Rooms</a></li>
          <li class="nav-item"><a href="{{ route('services.index') }}" class="nav-link">Services</a></li>
          <li class="nav-item"><a href="{{ route('about.index') }}" class="nav-link">About Us</a></li>
          <li class="nav-item active"><a href="{{ route('blog.index') }}" class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="{{ route('contact.index') }}" class="nav-link">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->
  
  

  <div class="block-30 block-30-sm item" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-10">
          <span class="subheading-sm">Blog</span>
              <h2 class="heading">News &amp; Events</h2>
        </div>
      </div>
    </div>
  </div>


  <div class=" site-section bg-light" id="blog">
    
    <div class="container">
      <div class="row">

        <div class="col-md-12 mb-4">
          <div class="block-3 d-md-flex">
            <a class="image" href="blog-single.html" style="background-image: url('images/img_3.jpg'); "></a>
            <div class="text">
              <h2 class="heading"><a href="#">Our New Presidential Room</a></h2>
              <p class="meta"><em>Posted on</em> <a href="">June 20, 2018</a> <span class="sep">&bullet;</span> <em>by</em> <a href="#">Admin</a> </p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore, dolorem. Officiis fugit dicta earum, sequi...</p>
              <p><a href="blog-single.html">Read More...</a></p>
            </div>
          </div>  
        </div>

        <div class="col-md-12 mb-4">
          <div class="block-3 d-md-flex">
            <a class="image" href="blog-single.html" style="background-image: url('images/img_1.jpg'); "></a>
            <div class="text">
              <h2 class="heading"><a href="#">We Have A New Year Promo</a></h2>
              <p class="meta"><em>Posted on</em> <a href="">June 20, 2018</a> <span class="sep">&bullet;</span> <em>by</em> <a href="#">Admin</a> </p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore, dolorem. Officiis fugit dicta earum, sequi...</p>
              <p><a href="blog-single.html">Read More...</a></p>
            </div>
          </div>  
        </div>

        <div class="col-md-12 mb-4">
          <div class="block-3 d-md-flex">
            <a class="image" href="blog-single.html" style="background-image: url('images/img_7.jpg'); "></a>
            <div class="text">
              
              <h2 class="heading"><a href="#">Experience Luxury Hotel</a></h2>
              <p class="meta"><em>Posted on</em> <a href="">June 20, 2018</a> <span class="sep">&bullet;</span> <em>by</em> <a href="#">Admin</a> </p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore, dolorem. Officiis fugit dicta earum, sequi...</p>
              <p><a href="blog-single.html">Read More...</a></p>
            </div>
          </div>  
        </div>

        <div class="col-md-12 mb-4">
          <div class="block-3 d-md-flex">
            <a class="image" href="blog-single.html" style="background-image: url('images/img_6.jpg'); "></a>
            <div class="text">
              <h2 class="heading"><a href="#">Our New Presidential Room</a></h2>
              <p class="meta"><em>Posted on</em> <a href="">June 20, 2018</a> <span class="sep">&bullet;</span> <em>by</em> <a href="#">Admin</a> </p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore, dolorem. Officiis fugit dicta earum, sequi...</p>
              <p><a href="blog-single.html">Read More...</a></p>
            </div>
          </div>  
        </div>

        <div class="col-md-12 mb-4">
          <div class="block-3 d-md-flex">
            <a class="image" href="blog-single.html" style="background-image: url('images/img_5.jpg'); "></a>
            <div class="text">
              <h2 class="heading"><a href="#">2018 New Year Promo</a></h2>
              <p class="meta"><em>Posted on</em> <a href="">June 20, 2018</a> <span class="sep">&bullet;</span> <em>by</em> <a href="#">Admin</a> </p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore, dolorem. Officiis fugit dicta earum, sequi...</p>
              <p><a href="blog-single.html">Read More...</a></p>
            </div>
          </div>  
        </div>


      </div>

      <div class="row mt-5">
                <div class="col-md-12 pt-5">
                  <ul class="pagination custom-pagination">
                    <li class="page-item prev"><a class="page-link" href="#"><i class="icon-keyboard_arrow_left"></i></a></li>
                    <li class="page-item active"><a class="page-linkx href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item next"><a class="page-link" href="#"><i class="icon-keyboard_arrow_right"></i></a></li>
                  </ul>


                </div>
              </div>
  </div>
  </div>
  
@endsection