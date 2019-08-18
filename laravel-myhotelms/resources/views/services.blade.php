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
          <li class="nav-item active"><a href="{{ route('services.index') }}" class="nav-link">Services</a></li>
          <li class="nav-item"><a href="{{ route('about.index') }}" class="nav-link">About Us</a></li>
          <li class="nav-item"><a href="{{ route('blog.index') }}" class="nav-link">Blog</a></li>
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
          <span class="subheading-sm">Services</span>
              <h2 class="heading">Facilities &amp; Services</h2>
        </div>
      </div>
    </div>
  </div>


  <div class="container">

  	<div class="row site-section">
  		<div class="col-lg-7 mb-5">
  			<img src="images/img_7.jpg" alt="Image placeholder" class="img-fluid img-shadow">
  		</div>
  		<div class="col-lg-5 pl-md-5">
  			
  			<div class="media block-6">
          <div class="icon"><span class="ion-ios-checkmark"></span></div>
          <div class="media-body">
            <h3 class="heading">Luxury Rooms</h3>
            <p>Even the all-powerful Pointing has no control about the blind texts.</p>
          </div>
	      </div>     

	      <div class="media block-6">
          <div class="icon"><span class="ion-ios-checkmark"></span></div>
          <div class="media-body">
            <h3 class="heading">Fast &amp; Free Wifi</h3>
            <p>Even the all-powerful Pointing has no control about the blind texts.</p>
          </div>
	      </div>   

	      <div class="media block-6">
          <div class="icon"><span class="ion-ios-checkmark"></span></div>
          <div class="media-body">
            <h3 class="heading">Travel Accomodation</h3>
            <p>Even the all-powerful Pointing has no control about the blind texts.</p>
          </div>
	      </div>   


  		</div>
  	</div>


  	<div class="row site-section pt-0">
  		<div class="col-lg-7 mb-5 order-lg-2">
  			<img src="images/img_2.jpg" alt="Image placeholder" class="img-fluid img-shadow">
  		</div>
  		<div class="col-lg-5 pr-md-5 order-lg-1">
  			
  			<div class="media block-6">
          <div class="icon"><span class="ion-ios-checkmark"></span></div>
          <div class="media-body">
            <h3 class="heading">Luxury Rooms</h3>
            <p>Even the all-powerful Pointing has no control about the blind texts.</p>
          </div>
	      </div>     

	      <div class="media block-6">
          <div class="icon"><span class="ion-ios-checkmark"></span></div>
          <div class="media-body">
            <h3 class="heading">Fast &amp; Free Wifi</h3>
            <p>Even the all-powerful Pointing has no control about the blind texts.</p>
          </div>
	      </div>   

	      <div class="media block-6">
          <div class="icon"><span class="ion-ios-checkmark"></span></div>
          <div class="media-body">
            <h3 class="heading">Travel Accomodation</h3>
            <p>Even the all-powerful Pointing has no control about the blind texts.</p>
          </div>
	      </div>   


  		</div>
  	</div>
  	
    
    </div>

    <div class="bg-light site-section">
    	<div class="container">

    		<div class="row mb-5">
            <div class="col-md-7 section-heading">
              <span class="subheading-sm">More</span>
              <h2 class="heading">Hotel Services</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit, iusto, omnis! Quidem, sint, impedit? Dicta eaque delectus tempora hic, corporis velit doloremque quod quam laborum, nobis iusto autem culpa quaerat!</p>
            </div>
          </div>

    		<div class="row ">
      <div class="col-md-6 col-lg-4">
        <div class="media block-6">
          <div class="icon"><span class="flaticon-double-bed"></span></div>
          <div class="media-body">
            <h3 class="heading">Luxury Rooms</h3>
            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
          </div>
        </div>      
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="media block-6">
          <div class="icon"><span class="flaticon-wifi"></span></div>
          <div class="media-body">
            <h3 class="heading">Fast &amp; Free Wifi</h3>
            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="media block-6">
          <div class="icon"><span class="flaticon-customer-service"></span></div>
          <div class="media-body">
            <h3 class="heading">Call Us 24/7</h3>
            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4">
        <div class="media block-6">
          <div class="icon"><span class="flaticon-taxi"></span></div>
          <div class="media-body">
            <h3 class="heading">Travel Accomodation</h3>
            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
          </div>
        </div>      
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="media block-6">
          <div class="icon"><span class="flaticon-credit-card"></span></div>
          <div class="media-body">
            <h3 class="heading">Accepts Credit Card</h3>
            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="media block-6">
          <div class="icon"><span class="flaticon-dinner"></span></div>
          <div class="media-body">
            <h3 class="heading">Restaurant</h3>
            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
          </div>
        </div>
      </div>

    </div>
    	</div>
    </div>

    
    <div class="site-section">
    	<div class="container">
	    	<div class="row">
	    		<div class="col-md-6 col-lg-4 mb-5">
	    			<img src="images/img_4.jpg" alt="Image placeholder" class="img-fluid img-shadow mb-4">
	    			<h4>Even the all-powerful Pointing</h4>
	    			<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
	    		</div>
	    		<div class="col-md-6 col-lg-4 mb-5">
	    			<img src="images/img_2.jpg" alt="Image placeholder" class="img-fluid img-shadow mb-4">
	    			<h4>Blind texts it is an almost</h4>
	    			<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
	    		</div>
	    		<div class="col-md-6 col-lg-4 mb-5">
	    			<img src="images/img_7.jpg" alt="Image placeholder" class="img-fluid img-shadow mb-4">
	    			<h4>Pointing has no control about</h4>
	    			<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
	    		</div>
	    	</div>`
    	</div>
    </div>
    

    <div class="site-section bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-7 section-heading">
            <span class="subheading-sm">Reviews</span>
            <h2 class="heading">Guest Reviews</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4">

            <div class="block-33">
              <div class="vcard d-flex mb-3">
                <div class="image align-self-center"><img src="images/person_3.jpg" alt="Person here"></div>
                <div class="name-text align-self-center">
                  <h2 class="heading">Martin Newmansfield</h2>
                  <span class="meta">Satisfied Customer</span>
                </div>
              </div>
              <div class="text">
                <blockquote>
                  <p>&rdquo; Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga aliquid. Atque dolore esse veritatis iusto eaque perferendis non dolorem fugiat voluptatibus vitae error ad itaque inventore accusantium tempore dolores sunt. &ldquo;</p>
                </blockquote>
              </div>
            </div>

          </div>
          <div class="col-md-6 col-lg-4">

            <div class="block-33">
              <div class="vcard d-flex mb-3">
                <div class="image align-self-center"><img src="images/person_2.jpg" alt="Person here"></div>
                <div class="name-text align-self-center">
                  <h2 class="heading">Nancy Green</h2>
                  <span class="meta">Satisfied Customer</span>
                </div>
              </div>
              <div class="text">
                <blockquote>
                  <p>&rdquo; Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga aliquid. Atque dolore esse veritatis iusto eaque perferendis non dolorem fugiat voluptatibus vitae error ad itaque inventore accusantium tempore dolores sunt. &ldquo;</p>
                </blockquote>
              </div>
            </div>

          </div>
          <div class="col-md-6 col-lg-4">

            <div class="block-33">
              <div class="vcard d-flex mb-3">
                <div class="image align-self-center"><img src="images/person_1.jpg" alt="Person here"></div>
                <div class="name-text align-self-center">
                  <h2 class="heading">Elizabeth Charles</h2>
                  <span class="meta">Satisfied Customer</span>
                </div>
              </div>
              <div class="text">
                <blockquote>
                  <p>&rdquo; Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga aliquid. Atque dolore esse veritatis iusto eaque perferendis non dolorem fugiat voluptatibus vitae error ad itaque inventore accusantium tempore dolores sunt. &ldquo;</p>
                </blockquote>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  
@endsection