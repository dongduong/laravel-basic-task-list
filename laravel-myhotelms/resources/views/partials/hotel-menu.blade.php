<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="/">Bright Hotel</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item {{ request()->is('/') ? 'active' : '' }}"><a href="/" class="nav-link">Home</a></li>
          <li class="nav-item {{ request()->is('rooms') || request()->is('rooms/*') ? 'active' : '' }}"><a href="{{ route('rooms.index') }}" class="nav-link">Rooms</a></li>
          <li class="nav-item {{ request()->is('services') || request()->is('services/*') ? 'active' : '' }}"><a href="{{ route('services.index') }}" class="nav-link">Services</a></li>
          <li class="nav-item"><a href="{{ route('about.index') }}" class="nav-link">About Us</a></li>
          <li class="nav-item"><a href="{{ route('blog.index') }}" class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="{{ route('contact.index') }}" class="nav-link">Contact</a></li>
        </ul>
      </div>
    </div>
</nav>
