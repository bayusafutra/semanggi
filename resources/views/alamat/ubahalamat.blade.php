@extends('layouts.mainSC')

@section('content')
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4><a type="button" class="btn p-0 ms-auto btn-lg me-md-2" href="/checkout"><i class="bi bi-arrow-left"></i>
                    </a>Ubah Alamat Pengiriman</h4>
                <form action="#">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama Penerima</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Lengkap">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nomor Telepon">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Alamat Lengkap</label>
                                <textarea name="" class="form-control" id="" cols="15" rows="5" placeholder="Nama Jalan, Gedung, No Rumah"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Detail Lainnya</label>
                                <input type="text" class="form-control" name="" id="" placeholder="Contoh: Blok / Unit No., Patokan">
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="inputProvinsi">Provinsi</label>
                                        <select id="inputProvinsi" class="form-control">
                                            <option selected>Pilih Provinsi</option>
                                            <option>Jawa Timur</option>
                                            <option>Jawa Tengah</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="inputKota">Kota/Kabupaten</label>
                                        <select id="inputKota" class="form-control">
                                            <option selected>Pilih Kota/Kabupaten</option>
                                            <option>Surabaya</option>
                                            <option>Sidoarjo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 mt-4">
                                    <div class="form-group mb-3">
                                        <label for="inputProvinsi">Kecamatan</label>
                                        <select id="inputProvinsi" class="form-control">
                                            <option selected>Pilih Kecamatan</option>
                                            <option>Wonocolo</option>
                                            <option>Semampir</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 mt-4">
                                    <div class="form-group mb-3">
                                        <label for="inputProvinsi">Kelurahan/Desa</label>
                                        <select id="inputProvinsi" class="form-control">
                                            <option selected>Pilih Kelurahan/Desa</option>
                                            <option>Jemur Wonosari</option>
                                            <option>Wonokusumo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 mt-4">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Kode Pos</label>
                                        <input type="email" class="form-control" id="exampleFormControlInput1">
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="checkout__input">
                                <p>Alamat<span>*</span></p>
                                <input type="text" placeholder="Street Address" class="checkout_input_add">
                            </div>
                            <div class="checkout__input">
                                <p>Kota/Kabupaten<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input">
                                <p>Kode Pos<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Nomor Handphone<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout_input_checkbox">
                                <label for="diff-acc">
                                    Kirim untuk seseorang ?
                                    <input type="checkbox" id="diff-acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input">
                                <p>Catatan<span>*</span></p>
                                <input type="text"
                                    placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div> --}}
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
