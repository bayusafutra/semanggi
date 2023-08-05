@extends('layouts.mainSC')
@section('content')
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4><a type="button" class="btn p-0 ms-auto btn-lg me-md-2" href="/detailpesanan/{{ $pesanan->slug }}"><i
                            class="bi bi-arrow-left"></i>
                    </a>Ubah Alamat Pengiriman</h4>
                <form action="#">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="checkout__input">
                                <div class="row">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Pilih Alamat</h5>
                                            <div class="row">
                                                @foreach ($alamat as $al)
                                                    <div class="col-sm-12 mb-3">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="form-check form">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="pembayaran" id="pembayaran1">
                                                                    <label class="form-check-label" for="pembayaran1">
                                                                        <div class="row d-flex justify-content-between">
                                                                            <div class="col-10">
                                                                                <span
                                                                                    class="text-success fw-bold">{{ $al->nama }}
                                                                                </span>
                                                                            </div>
                                                                            <div class="col-2 ms-auto">
                                                                                <a class="fw-bold" style="color: #F68037" href="">
                                                                                    Ubah
                                                                                </a>
                                                                            </div>
                                                                            <div class="notelp">
                                                                                <span class="fw-bold">+62 {{ $al->notelp }}</span>
                                                                            </div>
                                                                        </div>

                                                                        <p class="card-text">{{ $al->alamat }} ({{ $al->detail }}),
                                                                            Kelurahan
                                                                            {{ $al->kelurahan }}, Kecamatan
                                                                            {{ $al->kecamatan }},
                                                                            {{ $al->kota }}
                                                                            {{ $al->provinsi }}
                                                                            {{ $al->kodepos }}
                                                                        </p>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="erga mt-4 d-flex justify-content-center">
                                        <a href="/tambahAlamat" class="btn btn-lg" style="background-color: #5B8C51; color: white">Tambah Alamat Baru</a>
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

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
