@extends('layouts.mainSC')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('content')
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4><a type="button" class="btn p-0 ms-auto btn-lg me-md-2" href="/pesanansaya"><i class="bi bi-arrow-left"></i>
                </a>Pembayaran Pesanan</h4>
                <form action="#">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="list-group list-group-flush">
                                <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                                  Bank BRI
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">Bank BCA</a>
                                <a href="#" class="list-group-item list-group-item-action">Bank Permata</a>
                                <a href="#" class="list-group-item list-group-item-action">Bank Mandiri</a>
                              </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="checkout__order">
                                <h4>Pesanan Anda</h4>
                                <div class="row d-flex justify-content-between">
                                    <div class="col-7">
                                        <strong>No Pesanan : #{{ $bayar->pesanan->nomer }}</strong><br>
                                    </div>
                                    <div class="col-5">
                                        <small class=""
                                            style="font-size: 15px">{{ \Carbon\Carbon::parse($bayar->pesanan->created_at)->translatedFormat('l, d F Y H:i') }}</small>
                                    </div>
                                </div>
                                <div class="checkout_order_subtotal my-3">
                                    <div class="row d-flex justify-content-between">
                                        <span class="text-start">Rincian Produk</span>
                                        @foreach ($bayar->pesanan->detail()->get() as $pro)
                                            <div class="row">
                                                <div class="col-8">
                                                    <span class="col-7">{{ ucwords($pro->barang->nama) }}
                                                        (x{{ $pro->qtyitem }})
                                                    </span>
                                                </div>
                                                <div class="col-4">
                                                    <span class="text-end">Rp
                                                        {{ number_format($pro->barang->harga * $pro->qtyitem, 2, ',', '.') }}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <hr>

                                <div class="checkout_order_subtotal mb-2">
                                    <div class="row d-flex justify-content-between">
                                        <div class="row">
                                            <div class="col-8">
                                                <span class="text-start">Subtotal Produk</span>
                                            </div>
                                            <div class="col-4">
                                                <span class="text-end">Rp
                                                    {{ number_format($bayar->pesanan->subtotal, 2, ',', '.') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if ($bayar->pesanan->alamat_id)
                                    <div class="checkout_order_subtotal mb-2" id="ongkir">
                                        <div class="row d-flex justify-content-between">
                                            <div class="row">
                                                <div class="col-8">
                                                    <span class="text-start">Ongkos Kirim</span>
                                                </div>
                                                <div class="col-4">
                                                    <span class="text-end">Rp 7.000,00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="checkout_order_subtotal mb-2">
                                    <div class="row d-flex justify-content-between">
                                        <div class="row">
                                            <div class="col-8">
                                                <span class="text-start fw-bold">Total Biaya</span>
                                            </div>
                                            <div class="col-4">
                                                <span class="fw-bold">Rp
                                                    {{ number_format($bayar->pesanan->subtotal, 2, ',', '.') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container mt-4">
                                    <div class="row">
                                        <div class="col text-center">
                                            <button type="submit" class="site-btn" role="button">Checkout</button>
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
