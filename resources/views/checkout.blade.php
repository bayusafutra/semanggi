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
                        <div class="col-lg-6">
                            <div class="checkout__input">
                                <div class="row">
                                    <div class="card">
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
                                    <div class="card mt-3">
                                        <div class="card-body">
                                            @if ($pesanan->alamat_id == null)
                                                <h5 class="card-title">Alamat Pengiriman</h5>
                                                <p class="card-text"><span class="text-success fw-bold d-f">Belum ada daftar
                                                        alamat pada pengiriman akun anda</span></p>
                                                <a href="/tambahAlamat" class="btn btn-primary">Tambahkan Alamat
                                                    Pengiriman</a>
                                            @else
                                                <h5 class="card-title">Alamat Pengiriman</h5>
                                                <a class="text-uppercase mt-3">{{ $pesanan->alamat->alamat }}</a>
                                                <p class="card-text"><span class="text-success fw-bold">{{ ucwords($pesanan->alamat->nama) }} </span>(+62 {{ $pesanan->alamat->notelp }}), {{ $pesanan->alamat->alamat }}, Kelurahan
                                                    {{ $pesanan->alamat->kelurahan }}, Kecamatan {{ $pesanan->alamat->kecamatan }}, {{ $pesanan->alamat->kota }} {{ $pesanan->alamat->provinsi }} {{ $pesanan->alamat->kodepos }}
                                                </p>
                                                <a href="/ubahAlamat/{{ $pesanan->slug }}" class="btn btn-primary">Ubah Alamat Pengiriman</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="checkout__order">
                                <h4>Pesanan Anda</h4>
                                <strong>No Pesanan : #{{ $pesanan->nomer }}</strong>
                                <div class="checkout_order_subtotal mb-3">
                                    <div class="row d-flex justify-content-between">
                                        <span class="text-start">Rincian Produk</span>
                                        @foreach ($produk as $pro)
                                            <div class="row">
                                                <div class="col-8">
                                                    <span class="col-7">{{ ucwords($pro->barang->nama) }}
                                                        (x{{ $pro->qtyitem }})
                                                    </span>
                                                </div>
                                                <div class="col-4">
                                                    <span class="text-end fw-bold">Rp
                                                        {{ number_format($pro->barang->harga * $pro->qtyitem, 2, ',', '.') }}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <hr>

                                <div class="checkout_order_subtotal mb-3">
                                    <div class="row d-flex justify-content-between">
                                        <div class="row">
                                            <div class="col-8">
                                                <span class="text-start">Subtotal Produk</span>
                                            </div>
                                            <div class="col-4">
                                                <span class="text-end fw-bold">Rp
                                                    {{ number_format($subtotal, 2, ',', '.') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="checkout_order_subtotal mb-3">
                                    <div class="row d-flex justify-content-between">
                                        <div class="row">
                                            <div class="col-8">
                                                <span class="text-start">Ongkir</span>
                                            </div>
                                            <div class="col-4">
                                                <span class="text-end fw-bold">Rp 20.000,00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="checkout_order_subtotal mb-3">
                                    <div class="row d-flex justify-content-between">
                                        <div class="row">
                                            <div class="col-8">
                                                <span class="text-start">Biaya Layanan</span>
                                            </div>
                                            <div class="col-4">
                                                <span class="text-end fw-bold">Rp 1.000,00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="checkout_order_subtotal mb-3">
                                    <div class="row d-flex justify-content-between">
                                        <div class="row">
                                            <div class="col-8">
                                                <span class="text-start">Total Biaya</span>
                                            </div>
                                            <div class="col-4">
                                                <span class="text-end fw-bold">Rp
                                                    {{ number_format($subtotal + 1000 + 20000, 2, ',', '.') }}</span>
                                            </div>
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
