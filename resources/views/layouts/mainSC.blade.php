<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="det/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="det/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="det/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="det/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="det/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="det/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="det/css/style.css" type="text/css">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css') }}"
        rel="stylesheet">
</head>

<body>
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

    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4">
        <a href="/" class="navbar-brand d-flex align-items-center">
            <h1 class="fw-bold text-primary mb-4">Kampung<span class="text-warning">Semanggi</span></h1>
        </a>
        <div class="collapse navbar-collapse px-5" id="navbarCollapse">
            <div class="row justify-content-between">
                <div class="col-auto order-2 d-none d-sm-block"><a class="nav-link" href="#!"></a></div>
                <div class="col-auto d-none d-lg-block">
                    <div class="d-flex align-items-center">
                        <form>
                            <div class="input-group d-flex flex-end-center" style="width: 16cm">
                                <input class="form-control form-eduprixsearch-control rounded-pill"
                                    id="formGroupExampleInput" type="text"
                                    placeholder="Apa yang anda cari hari ini?" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- <button type="button" class="btn p-0 ms-auto"><i class="fa fa-search"></i></button> --}}
            <a type="button" class="btn p-0 ms-auto" href="/cart"><i class="fa fa-shopping-cart"><span
                        class="count">1</span></i>
            </a>
            <div class="nav-item dropdown ms-auto">
                @auth
                    <li class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="color: black">
                        {{ auth()->user()->username }}</li>
                    <li class="dropdown-menu rounded-0 rounded-bottom m-0 btn-success">
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
    <!-- Shoping Cart Section Begin -->
    <div class="ShopCart">
        @yield('content')
    </div>
    <!-- Shoping Cart Section End -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
          const minusBtn = document.querySelector('.minus-btn');
          const plusBtn = document.querySelector('.plus-btn');
          const numericInput = document.querySelector('.numeric-input');

          minusBtn.addEventListener('click', function() {
            if (numericInput.value > 1) {
              numericInput.value = parseInt(numericInput.value) - 1;
            }
          });

          plusBtn.addEventListener('click', function() {
            numericInput.value = parseInt(numericInput.value) + 1;
          });
        });
    </script>

    <!-- Js Plugins -->
    <script src="det/js/jquery-3.3.1.min.js"></script>
    <script src="det/js/bootstrap.min.js"></script>
    <script src="det/js/jquery.nice-select.min.js"></script>
    <script src="det/js/jquery-ui.min.js"></script>
    <script src="det/js/jquery.slicknav.js"></script>
    <script src="det/js/mixitup.min.js"></script>
    <script src="det/js/owl.carousel.min.js"></script>
    <script src="det/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
