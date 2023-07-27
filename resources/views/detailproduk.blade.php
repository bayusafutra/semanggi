@extends('layouts.navbarHome')
@section('content')
<!-- Features Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center wow fadeInUp">
            <div class="col-lg-6" data-wow-delay="0.1s">
                <div class="rounded overflow-hidden">
                    <div class="row g-0" data-wow-delay="0.1s">
                        @if ($produk[0]->gambar)
                            <a data-wow-delay="0.1s"><img src="{{ asset('storage/'.$produk[0]->gambar) }}" width="500" height="500" data-wow-delay="0.1s" alt=""></a>
                        @else
                            <a data-wow-delay="0.1s"><img src="{{ asset('img/food.png') }}" width="500" height="500" data-wow-delay="0.1s" alt="{{ $produk[0]->nama }}"></a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-2">{{ ucwords($produk[0]->nama) }}</h1>
                <p class="bg-white text-start text-primary ">{{ $produk[0]->berat }}</p>
                <h4 class="mb-4"><b>Rp {{ number_format($produk[0]->harga, 2, ',','.') }}</b></h4>
                    <p class="py-2">
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-secondary"></i>
                        <span class="list-inline-item text-dark">Rating 4.8 | 36 Comments</span>
                    </p>
                    <h6>Rincian Produk :</h6>
                    <ul class="list-unstyled pb-1">
                        <li>Berat Bersih {{ $produk[0]->berat }}</li>
                    </ul>

                    <h6>Deskripsi Produk :</h6>
                    <p class="pb-2">{{ $produk[0]->deskripsi }}</p>

                    <div class="row pb-3">
                        <div class="col d-grid">
                            <button type="submit" class="btn btn-warning">Buy</button>
                        </div>
                        <div class="col d-grid">
                            <form action="/cart" method="POST">
                                @csrf
                                <input type="hidden" name="total" value="{{ $produk[0]->harga*$produk[0]->minim }}">
                                <input type="hidden" name="barang" value="{{ $produk[0]->id }}">
                                <input type="hidden" name="quantity" value="{{ $produk[0]->minim }}">
                                <button type="submit" class="btn btn-warning" style="padding-left: 82px; padding-right: 82px">Tambahkan ke keranjang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="wow fadeInUp">
        <div class="container py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 col-xl-8 text-center">
                    <h4 class="fw-bold mb-4">Ulasan</h4>
                </div>
            </div>

            <div class="row text-center">
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="card">
                <div class="card-body py-4 mt-2">
                    <h6 class="font-weight-bold">Teresa May</h6>
                    <ul class="list-unstyled d-flex justify-content-center">
                    <li>
                        <i class="fas fa-star fa-sm text-warning"></i>
                    </li>
                    <li>
                        <i class="fas fa-star fa-sm text-warning"></i>
                    </li>
                    <li>
                        <i class="fas fa-star fa-sm text-warning"></i>
                    </li>
                    <li>
                        <i class="fas fa-star fa-sm text-warning"></i>
                    </li>
                    <li>
                        <i class="fas fa-star-half-alt fa-sm text-warning"></i>
                    </li>
                    </ul>
                    <p class="mb-2">
                    <i class="fas fa-quote-left pe-2"></i>Lorem ipsum dolor sit amet,
                    consectetur adipisicing elit. Quod eos id officiis hic tenetur quae quaerat
                    ad velit ab hic tenetur.
                    </p>
                </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="card">
                <div class="card-body py-4 mt-2">
                    <h6 class="font-weight-bold">Maggie McLoan</h6>
                    <ul class="list-unstyled d-flex justify-content-center">
                    <li>
                        <i class="fas fa-star fa-sm text-warning"></i>
                    </li>
                    <li>
                        <i class="fas fa-star fa-sm text-warning"></i>
                    </li>
                    <li>
                        <i class="fas fa-star fa-sm text-warning"></i>
                    </li>
                    <li>
                        <i class="fas fa-star fa-sm text-warning"></i>
                    </li>
                    <li>
                        <i class="fas fa-star fa-sm text-warning"></i>
                    </li>
                    </ul>
                    <p class="mb-2">
                    <i class="fas fa-quote-left pe-2"></i>Autem, totam debitis suscipit saepe
                    sapiente magnam officiis quaerat necessitatibus odio assumenda perferendis
                    labore laboriosam.
                    </p>
                </div>
                </div>
            </div>
            <div class="col-md-4 mb-0">
                <div class="card">
                <div class="card-body py-4 mt-2">
                    <h6 class="font-weight-bold">Alexa Horwitz</h6>
                    <ul class="list-unstyled d-flex justify-content-center">
                    <li>
                        <i class="fas fa-star fa-sm text-warning"></i>
                    </li>
                    <li>
                        <i class="fas fa-star fa-sm text-warning"></i>
                    </li>
                    <li>
                        <i class="fas fa-star fa-sm text-warning"></i>
                    </li>
                    <li>
                        <i class="fas fa-star fa-sm text-warning"></i>
                    </li>
                    <li>
                        <i class="far fa-star fa-sm text-warning"></i>
                    </li>
                    </ul>
                    <p class="mb-2">
                    <i class="fas fa-quote-left pe-2"></i>Cras sit amet nibh libero, in gravida
                    nulla metus scelerisque ante sollicitudin commodo cras purus odio,
                    vestibulum in tempus viverra turpis.
                    </p>
                </div>
                </div>
            </div>
            </div>
        </div>
@endsection
