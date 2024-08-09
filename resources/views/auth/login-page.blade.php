<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>KHALISH BRILIANT PERSADA
    </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="{{ asset('assets/img/logos.svg') }}" rel="icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  </head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="/">KHALIS</a></h1>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li class="nav-link scrollto">
            @if (Auth::check())
            <div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle"></i> Profile
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="{{ url('/profile') }}">Profile</a></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            @else
                <a class="btn-get-started scrollto" href="{{ url('login') }}">Login</a>
            @endif
            </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <ol>
            <li><a href="/">Home</a></li>
            <li>Login Page</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page" style="background: url('{{ asset('assets/img/hero-bg.jpg') }}'); background-size: cover;">
        {{-- CGPT --}}
    <div class="container" data-aos="fade-up">
        <div class="row justify-content-center">
            <div class="col-lg-4 mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="100">
                <div class="card login-card">
                    <div class="card-body">
                        <h3 class="card-title mt-2 mb-5 text-center"><span class="text-bold fw-bold">Login</span></h3>
                            @foreach(['error', 'warning', 'success'] as $msg)
                                @if(session($msg))
                                    <script>
                                        Swal.fire({
                                        icon: '{{ $msg }}',
                                        title: 'Alert',
                                        text: '{{ session($msg) }}',
                                        showConfirmButton: false,
                                        timer: 3000
                                        });
                                    </script>
                                @endif
                            @endforeach
                            <form action="" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="mb-3 form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" placeholder="Email  "
                                        value="{{ old('email') }}">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="my-3 form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" placeholder="Password">
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-center mt-3">
                                    <button class="btn btn-primary mt-3 mb-2 " style="width: 85%" type="submit">@lang('auth.log_title')</button>
                                </div>
                                <hr>
                            </form>
                        <div class="text-center">
                            <a href="{{ url('register') }}" class="text-decoration-none">@lang('auth.register_link')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </section>

  </main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>PT. KHALISH BRILIANT PERSADA</h3>
            <p>
            Jl. Cagak no.329, RT. 06, RW. 09, Sukabumi<br>
              <strong>Phone:</strong> +628 699669690<br>
              <strong>Email:</strong> laundryrwashofc@example.com<br>
            </p>
          </div>


        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Satyavega</span></strong>. All Rights Reserved
        </div>

      </div>
      {{-- <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="https://twitter.com/X26Code" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="https://web.facebook.com/PrajaAnime.satyavega" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="https://www.instagram.com/ohmy.shin_/" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="https://github.com/satyavega" class="github"><i class="bx bxl-github"></i></a>
      </div> --}}
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>