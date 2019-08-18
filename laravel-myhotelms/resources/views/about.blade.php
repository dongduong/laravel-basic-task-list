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
          <li class="nav-item active"><a href="{{ route('about.index') }}" class="nav-link">About Us</a></li>
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
          <span class="subheading-sm">About</span>
          <h2 class="heading">The Hotel</h2>
        </div>
      </div>
    </div>
  </div>

    
  

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12">
            <img src="images/bg_1.jpg" alt="Image placeholder" class="img-fluid">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-3">
            <h2>Enjoy a Luxury Experience</h2>
          </div>
          <div class="col-md-6">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni, necessitatibus officiis facere nisi et, ut adipisci a quis quisquam vitae doloremque tempora repellat quae accusantium atque eum voluptatibus aperiam cumque.</p>
            <p>Quia ratione, eum harum ab similique mollitia, nisi itaque vel voluptas ipsam dolore perferendis. Deleniti voluptatum error possimus ipsum, sed, obcaecati. Sit unde quia eum repudiandae molestiae reprehenderit harum nesciunt.</p>
            <p>Pariatur non consectetur libero, veniam inventore officia neque ipsum vel vitae repudiandae doloribus odit nihil dicta sit, magnam eos, in asperiores consequuntur eaque atque nam error. Dignissimos porro veniam voluptate.</p>
          </div>
          <div class="col-md-6">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni, necessitatibus officiis facere nisi et, ut adipisci a quis quisquam vitae doloremque tempora repellat quae accusantium atque eum voluptatibus aperiam cumque.</p>
            <p>Quia ratione, eum harum ab similique mollitia, nisi itaque vel voluptas ipsam dolore perferendis. Deleniti voluptatum error possimus ipsum, sed, obcaecati. Sit unde quia eum repudiandae molestiae reprehenderit harum nesciunt.</p>
          </div>

        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5 text-center">
          <div class="col-md-12 mb-5">
            <h2>The Team</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <div class="block-38 text-center">
              <div class="block-38-img">
                <div class="block-38-header">
                  <img src="images/person_1.jpg" alt="Image placeholder">
                  <h3 class="block-38-heading">Elizabeth Graham</h3>
                  <p class="block-38-subheading">CEO</p>
                </div>
                <div class="block-38-body">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae aut minima nihil sit distinctio recusandae doloribus ut fugit officia voluptate soluta. </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="block-38 text-center">
              <div class="block-38-img">
                <div class="block-38-header">
                  <img src="images/person_2.jpg" alt="Image placeholder">
                  <h3 class="block-38-heading">Jennifer Greive</h3>
                  <p class="block-38-subheading">President</p>
                </div>
                <div class="block-38-body">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae aut minima nihil sit distinctio recusandae doloribus ut fugit officia voluptate soluta. </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="block-38 text-center">
              <div class="block-38-img">
                <div class="block-38-header">
                  <img src="images/person_3.jpg" alt="Image placeholder">
                  <h3 class="block-38-heading">Patrick Marx</h3>
                  <p class="block-38-subheading">Marketer</p>
                </div>
                <div class="block-38-body">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae aut minima nihil sit distinctio recusandae doloribus ut fugit officia voluptate soluta. </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="block-38 text-center">
              <div class="block-38-img">
                <div class="block-38-header">
                  <img src="images/person_2.jpg" alt="Image placeholder">
                  <h3 class="block-38-heading">Mike Coolbert</h3>
                  <p class="block-38-subheading">Partner</p>
                </div>
                <div class="block-38-body">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae aut minima nihil sit distinctio recusandae doloribus ut fugit officia voluptate soluta. </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    

    <div class="block-31 mb-5" style="position: relative;">
          <div class="owl-carousel loop-block-31">
            <div class="block-30 no-overlay item" style="background-image: url('images/bg_2.jpg');"></div>
            <div class="block-30 no-overlay item" style="background-image: url('images/bg_1.jpg');"></div>
            <div class="block-30 no-overlay item" style="background-image: url('images/bg_3.jpg');"></div>
          </div>
        </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
        
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