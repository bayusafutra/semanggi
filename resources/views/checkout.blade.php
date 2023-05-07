@extends('layouts.mainSC')

@section('content')
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4><a type="button" class="btn p-0 ms-auto btn-lg me-md-2" href="/cart"><i class="bi bi-arrow-left"></i>
                </a>Detail Pengiriman</h4>
                <form action="#">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="checkout__input">
                                <div class="row">
                                    <div class="card">
                                        <div class="card-body">
                                          <h5 class="card-title">Alamat Pengiriman</h5>
                                          <a class="text-uppercase mt-3">Jl. Jaksa Agung Suprapto No.12, Kauman, Kab.Nganjuk</a>
                                          <p class="card-text"><span class="text-success fw-bold">Tasya Rania Arinastia</span>, Jl. Jaksa Agung Suprapto No.12, Kauman, Kec. Nganjuk, Kabupaten Nganjuk, Jawa Timur 64411, Nganjuk, Nganjuk, Jawa Timur, 64411</p>
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
                                                            <input class="form-check-input" type="radio" name="pembayaran" id="pembayaran1">
                                                            <label class="form-check-label" for="pembayaran1">
                                                                <span class="text-success fw-bold">Ambil di tempat</span>
                                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                            </label>
                                                        </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="card">
                                                      <div class="card-body">
                                                          <div class="form-check form">
                                                              <input class="form-check-input" type="radio" name="pembayaran" id="pembayaran2">
                                                              <label class="form-check-label" for="pembayaran2">
                                                                  <span class="text-success fw-bold">Dikirim ke rumah</span>
                                                                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
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
                                <h4>Your Order</h4>
                                <div class="checkout_order_products"><span>Total Produk</span></div>
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
