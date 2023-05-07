@extends('layouts.mainSC')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('content')
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4><a type="button" class="btn p-0 ms-auto btn-lg me-md-2" href="/checkout"><i class="bi bi-arrow-left"></i>
                </a>Pilih Metode Pembayaran</h4>
                <form action="#">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="list-group list-group-flush">
                                <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                                  Bank BRI
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">Bank BCA</a>
                                <a href="#" class="list-group-item list-group-item-action">Bank Permata</a>
                                <a href="#" class="list-group-item list-group-item-action">Bank Mandiri</a>
                              </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>

                                <h5 class="card-title">Alamat Pengiriman</h5>
                                <p class="card-text"><span class="text-success fw-bold">Tasya Rania Arinastia</span>, Jl. Jaksa Agung Suprapto No.12, Kauman, Kec. Nganjuk, Kabupaten Nganjuk, Jawa Timur 64411, Nganjuk, Nganjuk, Jawa Timur, 64411</p>

                                <h5 class="card-title">Detail Pemesanan</h5>
                                <div class="checkout_order_products">Total<span> Produk</span></div>
                                <ul>
                                    <li>Stik Semanggi <span>Rp 20.000</span></li>
                                    <li>Mie Semanggi <span>Rp 35.000</span></li>
                                    <li>Kue Dahlia Semanggi <span>Rp 35.000</span></li>
                                </ul>
                                <div class="checkout_order_subtotal">
                                    <div class="row">
                                        <span class="text-start">Subtotal</span>
                                        <span class="text-end fw-bold">Rp.90.000</span>
                                    </div>
                                </div>

                                <div class="checkout_order_ongkir">
                                    <div class="row">
                                        <span class="text-start">Ongkir</span>
                                        <span class="text-end fw-bold">Rp.20.000</span>
                                    </div>
                                </div>

                                <div class="checkout_order_biayaLayanan">
                                    <div class="row">
                                        <span class="text-start">Biaya Layanan</span>
                                        <span class="text-end fw-bold">Rp.5.000</span>
                                    </div>
                                </div>

                                <div class="checkout_order_total">
                                    <div class="row">
                                        <span class="text-start">Total</span>
                                        <span class="text-end fw-bold">Rp.115.000</span>
                                    </div>
                                </div>

                                <div class="container mt-4">
                                    <div class="row">
                                      <div class="col text-center">
                                        <a class="site-btn" href="/pembayaran/kode-unik" role="button">Konfirmasi Pembayaran</a>
                                      </div>
                                    </div>
                                  </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </section>

@endsection
