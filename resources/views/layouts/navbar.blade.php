 <!-- Header -->
 <header>
    <!-- Navbar -->
    <nav id="navigation" class="navbar nav-bg navbar-expand-lg navbar-light py-4">
        <div class="container">
          <a class="navbar-brand logo darkblue" href="#"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title text-bold" id="offcanvasNavbarLabel">BCR</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <div class="navbar-nav ms-auto">
                @guest
                <li class="d-flex px-3">
                    <a href="{{ route('login') }}" class="btn btn-primary">
                        Login
                    </a>
                  </li>
                {{-- <li class="d-flex">
                  <a href="{{ route('register') }}" class="btn btn-success">
                      Register
                  </a>
                </li> --}}
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                  </li>
                  @endguest
            </div>
          </div>
        </div>
      </nav>
    <!-- Navbar -->
  </header>
  <!-- Header -->
