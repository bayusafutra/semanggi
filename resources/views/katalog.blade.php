@extends('layouts.navbarHome')

@section('content')
<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="img/catalog-1.png" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-7">
                                <h1 class="display-2 mb-5 animated slideInDown"></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="img/catalog-2.png" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-7">
                                <h1 class="display-2 mb-5 animated slideInDown"></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="img/catalog-3.png" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-7">
                                <h1 class="display-2 mb-5 animated slideInDown"></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="img/catalog-4.png" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-7">
                                <h1 class="display-2 mb-5 animated slideInDown"></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->

    <!-- Product Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 d-flex justify-content-center mb-5">
                <div class="col-lg-6 text-start text-lg-end wow slideInCenter" data-wow-delay="0.1s">
                    <ul class="produk nav nav-pills d-flex mx-auto justify-content-center mb-5">
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary border-2 active" data-bs-toggle="pill" href="#tab-1">Semua</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-2">Makanan Kering</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-3">Makanan Frozen</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-4">Minuman</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        @foreach ($kering as $ker)
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden">
                                        <img class="img-fluid w-100" src="img/{{ $ker->gambar }}" style="width: 261px; height: 261px" alt="">
                                    </div>
                                    <div class="text-center p-4">
                                        <a class="d-block h5 mb-2" href="">{{ $ker->nama }}</a>
                                        <span class="text-primary me-1">Rp {{ $ker->harga }}</span>
                                        {{-- <span class="text-body text-decoration-line-through">$29.00</span> --}}
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="w-50 text-center border-end py-2">
                                            <a class="text-body" href="/detailproduk/{{ $ker->slug }}"><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                        </small>
                                        <small class="w-50 text-center py-2">
                                            <form action="/cart" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $ker->nama }}" name="nama">
                                                <input type="hidden" value="{{ $ker->harga }}" name="harga">
                                                <input type="hidden" value="{{ $ker->gambar }}" name="gambar">
                                                <input type="hidden" value="1" name="quantity">
                                                <button type="submit" class="text-body border-0" style="background: none"><i class="fa fa-shopping-bag text-primary me-2"></i>Add To Cart</button>
                                            </form>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @foreach ($frozen as $fro)
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="img-fluid w-100" src="img/{{ $fro->gambar }}" style="width: 261px; height: 261px" alt="">
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href="">{{ $fro->nama }}</a>
                                    <span class="text-primary me-1">Rp {{ $fro->harga }}</span>
                                    {{-- <span class="text-body text-decoration-line-through">$29.00</span> --}}
                                </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href="/detailproduk/{{ $fro->slug }}"><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                    </small>
                                    <small class="w-50 text-center py-2">
                                        <form action="/cart" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $fro->nama }}" name="nama">
                                            <input type="hidden" value="{{ $fro->harga }}" name="harga">
                                            <input type="hidden" value="{{ $fro->gambar }}" name="gambar">
                                            <input type="hidden" value="1" name="quantity">
                                            <button type="submit" class="text-body border-0" style="background: none"><i class="fa fa-shopping-bag text-primary me-2"></i>Add To Cart</button>
                                        </form>
                                    </small>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    </div>
                </div>

                <div id="tab-2" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        @foreach ($kering as $ker)
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden">
                                        <img class="img-fluid w-100" src="img/{{ $ker->gambar }}" style="width: 261px; height: 261px" alt="">
                                    </div>
                                    <div class="text-center p-4">
                                        <a class="d-block h5 mb-2" href="">{{ $ker->nama }}</a>
                                        <span class="text-primary me-1">Rp {{ $ker->harga }}</span>
                                        {{-- <span class="text-body text-decoration-line-through">$29.00</span> --}}
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="w-50 text-center border-end py-2">
                                            <a class="text-body" href="/detailproduk/{{ $ker->slug }}"><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                        </small>
                                        <small class="w-50 text-center py-2">
                                            <form action="/cart" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $ker->nama }}" name="nama">
                                                <input type="hidden" value="{{ $ker->harga }}" name="harga">
                                                <input type="hidden" value="{{ $ker->gambar }}" name="gambar">
                                                <input type="hidden" value="1" name="quantity">
                                                <button type="submit" class="text-body border-0" style="background: none"><i class="fa fa-shopping-bag text-primary me-2"></i>Add To Cart</button>
                                            </form>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div id="tab-3" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        @foreach ($frozen as $fro)
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden">
                                        <img class="img-fluid w-100" src="img/{{ $fro->gambar }}" style="width: 261px; height: 261px" alt="">
                                    </div>
                                    <div class="text-center p-4">
                                        <a class="d-block h5 mb-2" href="">{{ $fro->nama }}</a>
                                        <span class="text-primary me-1">Rp {{ $fro->harga }}</span>
                                        {{-- <span class="text-body text-decoration-line-through">$29.00</span> --}}
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="w-50 text-center border-end py-2">
                                            <a class="text-body" href="/detailproduk/{{ $fro->slug }}"><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                        </small>
                                        <small class="w-50 text-center py-2">
                                            <form action="/cart" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $fro->nama }}" name="nama">
                                                <input type="hidden" value="{{ $fro->harga }}" name="harga">
                                                <input type="hidden" value="{{ $fro->gambar }}" name="gambar">
                                                <input type="hidden" value="1" name="quantity">
                                                <button type="submit" class="text-body border-0" style="background: none"><i class="fa fa-shopping-bag text-primary me-2"></i>Add To Cart</button>
                                            </form>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div id="tab-4" class="tab-pane fade show p-0">
                    <div class="row g-4">

                        @foreach ($minuman as $minum)
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden">
                                        <img class="img-fluid w-100" src="img/{{ $minum->gambar }}" style="width: 261px; height: 261px" alt="">
                                    </div>
                                    <div class="text-center p-4">
                                        <a class="d-block h5 mb-2" href="">{{ $minum->nama }}</a>
                                        <span class="text-primary me-1">Rp {{ $minum->harga }}</span>
                                        {{-- <span class="text-body text-decoration-line-through">$29.00</span> --}}
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="w-50 text-center border-end py-2">
                                            <a class="text-body" href="/detailproduk/{{ $minum->slug }}"><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                        </small>
                                        <small class="w-50 text-center py-2">
                                            <form action="/cart" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $minum->nama }}" name="nama">
                                                <input type="hidden" value="{{ $minum->harga }}" name="harga">
                                                <input type="hidden" value="{{ $minum->gambar }}" name="gambar">
                                                <input type="hidden" value="1" name="quantity">
                                                <button type="submit" class="text-body border-0" style="background: none"><i class="fa fa-shopping-bag text-primary me-2"></i>Add To Cart</button>
                                            </form>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    <!-- Product End -->
    @endsection
