  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
      <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

          <a href="/" class="logo d-flex align-items-center">
              <h1>BKK SMK</h1>
          </a>

          <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
          <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
          <nav id="navbar" class="navbar">
              <ul>
                  <li><a href="/">Home</a></li>
                  <li><a href="/lowongan">Lowongan</a></li>
                  <li><a href="/informasi">Informasi</a></li>
                  @auth
                      <li><a class="get-a-quote" href="/dashboard">Dashboard</a></li>
                  @else
                      <li><a class="get-a-quote" href="/login">Masuk/Daftar</a></li>
                  @endauth

              </ul>
          </nav>
          <!-- .navbar -->

      </div>
  </header>

  <!-- End Header -->
