@extends('layouts.mainSC')

@section('content')
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4><a type="button" class="btn p-0 ms-auto btn-lg me-md-2" href="/cart"><i class="bi bi-arrow-left"></i>
                    </a>Detail Pesanan</h4>
                <form action="#">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="checkout__input">
                                <div class="row">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Alamat Pengiriman</h5>
                                            <a class="text-uppercase mt-3">Jl. Jaksa Agung Suprapto No.12, Kauman,
                                                Kab.Nganjuk</a>
                                            <p class="card-text"><span class="text-success fw-bold">Tasya Rania
                                                    Arinastia</span>, Jl. Jaksa Agung Suprapto No.12, Kauman, Kec. Nganjuk,
                                                Kabupaten Nganjuk, Jawa Timur 64411, Nganjuk, Nganjuk, Jawa Timur, 64411</p>
                                            <a href="/ubahAlamat" class="btn btn-primary">Ubah Alamat Pengiriman</a>
                                        </div>
                                    </div>
                                    <div class="card mt-3">
                                        <div class="card-body">
                                            <h5 class="card-title">Metode Pengiriman</h5>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="form-check form">
                                                                <input class="form-check-input" type="radio"
                                                                    name="pembayaran" id="pembayaran1">
                                                                <label class="form-check-label" for="pembayaran1">
                                                                    <span class="text-success fw-bold">Ambil di
                                                                        tempat</span>
                                                                    <p class="card-text">With supporting text below as a
                                                                        natural lead-in to additional content.</p>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="form-check form">
                                                                <input class="form-check-input" type="radio"
                                                                    name="pembayaran" id="pembayaran2">
                                                                <label class="form-check-label" for="pembayaran2">
                                                                    <span class="text-success fw-bold">Dikirim ke
                                                                        rumah</span>
                                                                    <p class="card-text">With supporting text below as a
                                                                        natural lead-in to additional content.</p>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Pesanan Anda</h4>
                                <div class="checkout_order_products"><span>Rincian Produk</span></div>
                                <ul>
                                    @foreach ($produk as $pro)
                                        <li>{{ ucwords($pro->barang->nama) }} (x{{ $pro->qtyitem }})<span>Rp {{ number_format($pro->barang->harga*$pro->qtyitem, 2, ',','.') }}</span></li>
                                    @endforeach
                                </ul>

                                <div class="checkout_order_subtotal mb-3">
                                    <div class="row d-flex justify-content-between">
                                        <div class="col-7">
                                            <span class="text-start">Subtotal Produk</span>
                                        </div>
                                        <div class="col-5">
                                            <span class="text-end fw-bold">Rp {{ number_format($subtotal, 2, ',','.') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="checkout_order_subtotal mb-3">
                                    <div class="row d-flex justify-content-between">
                                        <div class="col-8">
                                            <span class="text-start">Ongkir</span>
                                        </div>
                                        <div class="col-4">
                                            <span class="text-end fw-bold">Rp.90.000</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="checkout_order_subtotal mb-3">
                                    <div class="row d-flex justify-content-between">
                                        <div class="col-8">
                                            <span class="text-start">Biaya Layanan</span>
                                        </div>
                                        <div class="col-4">
                                            <span class="text-end fw-bold">Rp.90.000</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="checkout_order_subtotal mb-3">
                                    <div class="row d-flex justify-content-between">
                                        <div class="col-8">
                                            <span class="text-start">Total Biaya</span>
                                        </div>
                                        <div class="col-4">
                                            <span class="text-end fw-bold">Rp.90.000</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="container mt-4">
                                    <div class="row">
                                        <div class="col text-center">
                                            <a class="site-btn" href="/pembayaran" role="button">Lanjutkan Pembayaran</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
