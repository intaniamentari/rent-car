<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html">Car<span>Book</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
        @if (Auth::guest())
            <li class="nav-item {{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
            {{-- <li class="nav-item {{ request()->is('about') ? 'active' : '' }}"><a href="{{ route('about') }}" class="nav-link">About</a></li> --}}
            {{-- <li class="nav-item {{ request()->is('services') ? 'active' : '' }}"><a href="{{ route('services') }}" class="nav-link">Services</a></li> --}}
            {{-- <li class="nav-item {{ request()->is('pricing') ? 'active' : '' }}"><a href="{{ route('pricing') }}" class="nav-link">Pricing</a></li> --}}
            <li class="nav-item {{ request()->is('cars') ? 'active' : '' }}"><a href="{{ route('cars') }}" class="nav-link">Cars</a></li>
            {{-- <li class="nav-item {{ request()->is('blog') ? 'active' : '' }}"><a href="{{ route('blog') }}" class="nav-link">Blog</a></li> --}}
            <li class="nav-item {{ request()->is('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
            <li class="nav-item {{ request()->is('login') ? 'active' : '' }}"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
          @else
            <li class="nav-item {{ request()->is('carbook.index') ? 'active' : '' }}"><a href="{{ route('carbook.index') }}" class="nav-link">CarBook</a></li>
            <li class="nav-item {{ request()->is('cars') ? 'active' : '' }}"><a href="{{ route('cars') }}" class="nav-link">Cars</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <li class="nav-item {{ request()->is('logout') ? 'active' : '' }}"><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">Logout</a></li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
