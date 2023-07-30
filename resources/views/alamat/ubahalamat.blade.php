@extends('layouts.mainSC')
@section('css')
<style>
    .scrollable-select {
        max-height: 200px; /* Atur tinggi maksimum sesuai kebutuhan */
        overflow-y: scroll;
    }
</style>
@endsection

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
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Nama Lengkap">
                            </div>
                            <label for="exampleFormControlInput1" class="form-label">Nomor Telepon</label><br>
                            <div class="mb-3 input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">+62</span>
                                <input type="text" class="form-control" placeholder="Contoh: 881026108613"
                                    aria-label="Nomor" aria-describedby="addon-wrapping"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Alamat Lengkap</label>
                                <textarea name="" class="form-control" id="" cols="15" rows="5"
                                    placeholder="Nama Jalan, Gedung, No Rumah"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Detail Lainnya</label>
                                <input type="text" class="form-control" name="" id=""
                                    placeholder="Contoh: Blok / Unit No., Patokan">
                            </div>

                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="inputProvinsi">Provinsi</label>
                                        <select id="inputProvinsi" class="form-control">
                                            <option selected="selected" disabled="disabled">Pilih Provinsi</option>
                                            @foreach ($provinsi as $pro)
                                                <option>{{ ucwords($pro->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="inputKota">Kota/Kabupaten</label>
                                        <select id="inputKota" class="form-control" style="max-height: 200px; overflow-y: auto;">
                                            <option selected>Pilih Kota/Kabupaten</option>
                                            <option>Surabaya</option>
                                            <option>Sidoarjo</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-lg-4 mt-4">
                                    <div class="form-group mb-3">
                                        <label for="inputKecamatan">Kecamatan</label>
                                        <select id="inputKecamatan" class="form-control"
                                            style="max-height: 200px; overflow-y: auto;">
                                            <option selected>Pilih Kecamatan</option>
                                            <option>Wonocolo</option>
                                            <option>Semampir</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 mt-4">
                                    <div class="form-group mb-3">
                                        <label for="inputKelurahan">Kelurahan/Desa</label>
                                        <select id="inputKelurahan" class="form-control"
                                            style="max-height: 200px; overflow-y: auto;">
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
                                            <a class="site-btn" href="/pembayaran" role="button">Lanjutkan
                                                Pembayaran</a>
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
