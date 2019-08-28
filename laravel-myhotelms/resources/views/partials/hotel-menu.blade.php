<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="/">Bright Hotel</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item {{ request()->is('/') ? 'active' : '' }}"><a href="/" class="nav-link">{{ trans('page.home.menu') }}</a></li>
          <li class="nav-item {{ request()->is('rooms') || request()->is('rooms/*') ? 'active' : '' }}"><a href="{{ route('rooms.index') }}" class="nav-link">{{ trans('page.rooms.menu') }}</a></li>
          <li class="nav-item {{ request()->is('services') || request()->is('services/*') ? 'active' : '' }}"><a href="{{ route('services.index') }}" class="nav-link">{{ trans('page.services.menu') }}</a></li>
          <li class="nav-item {{ request()->is('about') || request()->is('about/*') ? 'active' : '' }}"><a href="{{ route('about.index') }}" class="nav-link">{{ trans('page.about.menu') }}</a></li>
          <li class="nav-item {{ request()->is('blog') || request()->is('blog/*') ? 'active' : '' }}"><a href="{{ route('blog.index') }}" class="nav-link">{{ trans('page.blog.menu') }}</a></li>
          <li class="nav-item {{ request()->is('contact') || request()->is('contact/*') ? 'active' : '' }}"><a href="{{ route('contact.index') }}" class="nav-link">{{ trans('page.contact.menu') }}</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ strtoupper(App::getLocale()) }}</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{ url()->current() }}?change_language=en">English</a>
              <a class="dropdown-item" href="{{ url()->current() }}?change_language=vi">Tiếng Việt</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
</nav>
