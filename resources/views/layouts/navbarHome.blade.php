<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Kampoeng Semanggi</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="{{ asset('https://fonts.googleapis.com') }}">
    <link rel="preconnect" href="{{ asset('https://fonts.gstatic.com') }}" crossorigin>
    <link href="{{ asset('https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&family=Open+Sans:wght@400;500;600&display=swap') }}" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css') }}" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-0">
        <div class="row g-0 d-none d-lg-flex">
            <div class="col-lg-6 ps-5 text-start">
            </div>
            <div class="col-lg-6 text-end">
                <div class="h-100 d-inline-flex align-items-center text-light">
                    <a class="btn btn-link text-light" href="/"><i>Home</i></a>
                    <a class="btn btn-link text-light" href="/profile"><i>Profile</i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5">
        <a href="/" class="navbar-brand d-flex align-items-center">
            <h1 class="fw-bold text-primary mb-4">Kampung<span class="text-warning">Semanggi</span></h1>
        </a>
        <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="row justify-content-between">
                <div class="col-auto order-2 d-none d-sm-block"><a class="nav-link" href="#!"></a></div>
                <div class="col-auto d-none d-lg-block">
                  <div class="d-flex align-items-center">
                    <form>
                      <div class="input-group d-flex flex-end-center" style="width: 16cm">
                        <input class="form-control form-eduprixsearch-control rounded-pill" id="formGroupExampleInput" type="text" placeholder="Apa yang anda cari hari ini?" />
                      </div>
                    </form>
                  </div>
                </div>
              </div>
                {{-- <button type="button" class="btn p-0 ms-auto"><i class="fa fa-search"></i></button> --}}
                <a type="button" class="btn p-0 ms-auto" href="/cart"><i class="fa fa-shopping-cart"><span class="count">1</span></i>
                </a>


            <div class="nav-item dropdown ms-auto">
                @auth
                    <li class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="color: black">{{ auth()->user()->username }}</li>
                    <li class="dropdown-menu rounded-0 rounded-bottom m-0">
                        @can('admin')
                        <a href="/dashboard" class="dropdown-item">My Dashboard</a>
                        @endcan
                        <form action="/logout" method="post">
                                @csrf
                                <button class="dropdown-item" style="color: black">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-link dropdown-toggle" data-bs-toggle="dropdown">User</li>
                    <div class="dropdown-menu rounded-0 rounded-bottom m-0 btn-success">
                        <a href="/login" class="dropdown-item">Login</a>
                        <a href="/signup" class="dropdown-item">Register</a>
                    </div>
                @endauth
            </div>

        </div>
    </nav>
    <!-- Navbar End -->

    <div class="navbarAdm">
        @yield('content')
    </div>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h1 class="fw-bold text-primary mb-4">Kampung<span class="text-primary" style="color: rgb(255, 115, 0)">Semanggi</span></h1>
                    <p>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-9" style="margin-left: 145px">
                    <h4 class="text-light mb-4">Address</h4>
                    <p><i class="fa fa-map-marker-alt me-3"></i>Jalan Kendung IX, Sememi, Kec. Benowo,
                        Kota Surabaya, Jawa Timur</p>
                    <p><i class="fa fa-phone-alt me-3"></i>0838 5744 9383</p>
                    <p><i class="fab fa-instagram me-3"></i>@srikandi_semanggi</p>
                </div>
                <div class="col-lg-3 col-md-6" style="margin-left: 145px">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="">Home</a>
                    <a class="btn btn-link" href="">Profile</a>
                    <a class="btn btn-link" href="/catalog">Catalog</a>
                    <a class="btn btn-link" href="">Login</a>
                    <a class="btn btn-link" href="">Register</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


        <!-- Copyright Start -->
        <div class="container-fluid bg-secondary text-body copyright py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="fw-semi-bold" href="#">Kampoeng Semanggi 2022</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By SPSi KELOMPOK 3</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="{{ asset('https://code.jquery.com/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
        <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
        <script src="{{ asset('lib/parallax/parallax.min.js') }}"></script>
        <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ asset('js/main.js') }}"></script>
    </body>

    </html>
