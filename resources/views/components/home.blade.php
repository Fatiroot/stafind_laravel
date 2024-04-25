<!DOCTYPE html>
<html lang="en">

<head>
  <title>InternshipLink</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

  <!--  -->
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home.index') }}"><img src="{{ asset('img/logo.png') }}" class="mx-auto" alt="main_logo" style="height: 50px">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
        aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item "><a href="home" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="about" class="nav-link">About</a></li>
            <li class="nav-item"><a href="{{ route('UserOffer.index') }} "class="nav-link"> Internships</a></li>
            <li class="nav-item"><a href="{{ route('allCompanies') }}" class="nav-link">Companies</a></li>

            @auth
            <li class="nav-item"><a href="{{ route('home.edit', Auth::id()) }}" class="nav-link">Profile</a></li>
        </li>
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}" class="flex items-center">
                    @csrf
                    <button type="submit" class="form-control btn btn-primary" style="">Sign Out</button>
                </form>

            @else
            <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Get Started</a></li>
            @endauth
        </ul>

      </div>
    </div>
  </nav>
  <!-- END nav -->


  @yield('content')
  <section class="ftco-section-parallax">
    <div class="parallax-img d-flex align-items-center">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
            <h2>Subcribe to our Newsletter</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
              blind texts. Separated they live in</p>
            <div class="row d-flex justify-content-center mt-4 mb-4">
              <div class="col-md-8">
                <form action="#" class="subscribe-form">
                  <div class="form-group d-flex">
                    <input type="text" class="form-control" placeholder="Enter email address">
                    <input type="submit" value="Subscribe" class="submit px-3">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">About</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
              blind texts.</p>
            <ul class="ftco-footer-social  ">
                <li class="ftco-animate"><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li class="ftco-animate"><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li class="ftco-animate"><a href="#"><i class="fab fa-instagram"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Employers</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">How it works</a></li>
              <li><a href="#" class="py-2 d-block">Register</a></li>
              <li><a href="#" class="py-2 d-block">Post aInternship</a></li>
              <li><a href="#" class="py-2 d-block">Advance Skill Search</a></li>
              <li><a href="#" class="py-2 d-block">Recruiting Service</a></li>
              <li><a href="#" class="py-2 d-block">Blog</a></li>
              <li><a href="#" class="py-2 d-block">Faq</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4 ml-md-4">
            <h2 class="ftco-heading-2">Workers</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">How it works</a></li>
              <li><a href="#" class="py-2 d-block">Register</a></li>
              <li><a href="#" class="py-2 d-block">Post Your Skills</a></li>
              <li><a href="#" class="py-2 d-block">Stage Search</a></li>
              <li><a href="#" class="py-2 d-block">Emploer Search</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Have a Questions?</h2>
            <div class="block-23 mb-3">
              <ul>
                <li><span class="icon"><i class="fas fa-map-marker-alt"></i></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>

                    <li>
                        <a href="#">
                          <i class="fas fa-phone-alt mx-2"></i>
                          <span class="text">+2 392 3929 210</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="far fa-envelope mx-2"></i>
                          <span class="text">example@example.com</span>
                        </a>
                      </li>
                      class="text">info@yourdomain.com</span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">

          <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>
              document.write(new Date().getFullYear());
            </script> All rights reserved | This template is made with <i class="icon-heart text-danger"
              aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>
      </div>
    </div>
  </footer>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#F96D00" /></svg></div>


        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  @if(session('success'))
  <script>
      // Display SweetAlert message when the document is ready
      document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
              icon: 'success',
              title: 'Success!',
              text: '{{ session('success') }}'
          });
      });
  </script>
  @endif

  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('js/aos.js') }}"></script>
  <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('js/scrollax.min.js') }}"></script>
  </script>
  <script src="{{ asset('js/main.js') }}"></script>
  <script src="https://cdn.lordicon.com/lordicon.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
