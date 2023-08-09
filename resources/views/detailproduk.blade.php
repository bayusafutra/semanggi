@extends('layouts.navbarHome')
@section('css')
    <style>
        #bi-quote::before {
            transform: rotate(180deg);
        }
    </style>
@endsection
@section('content')
    <!-- Features Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center wow fadeInUp">
                <div class="col-lg-6" data-wow-delay="0.1s">
                    <div class="rounded overflow-hidden">
                        <div class="row g-0" data-wow-delay="0.1s">
                            @if ($produk[0]->gambar)
                                <a data-wow-delay="0.1s"><img src="{{ asset('storage/' . $produk[0]->gambar) }}"
                                        width="500" height="500" data-wow-delay="0.1s" alt=""></a>
                            @else
                                <a data-wow-delay="0.1s"><img src="{{ asset('img/food.png') }}" width="500"
                                        height="500" data-wow-delay="0.1s" alt="{{ $produk[0]->nama }}"></a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="mb-2">{{ ucwords($produk[0]->nama) }}</h1>
                    <p class="bg-white text-start text-primary ">Kategori {{ ucwords($produk[0]->kategori->nama) }}</p>
                    <h4 class="mb-4"><b>Rp {{ number_format($produk[0]->harga, 2, ',', '.') }}</b></h4>
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
                        <li>Minimum Pembelian {{ $produk[0]->minim }} {{ $produk[0]->quantity }}</li>
                        <li>Stok Produk {{ $produk[0]->stok }} {{ $produk[0]->quantity }}</li>
                    </ul>

                    <h6>Deskripsi Produk :</h6>
                    <p class="pb-2"><i class="bi bi-quote" style="color: #F68037"></i> {{ $produk[0]->deskripsi }}
                        <i
                            class="bi bi-quote" id="bi-quote" style="color: #F68037">
                        </i>
                    </p>

                    <div class="row pb-3">
                        <div class="col d-grid">
                            <button type="submit" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#confirmationModal">Pesan Sekarang</button>
                        </div>

                        <div class="modal fade" id="confirmationModal" tabindex="-1"
                            aria-labelledby="confirmationModalLabel"aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <form action="/pesanproduk" method="POST">
                                        @csrf
                                        <div class="modal-header d-flex align-items-start">
                                            <div class="row" style="width: 100%">
                                                <div class="col-3">
                                                    @if ($produk[0]->gambar)
                                                        <a data-wow-delay="0.1s"><img
                                                                src="{{ asset('storage/' . $produk[0]->gambar) }}"
                                                                width="150" height="150" data-wow-delay="0.1s"
                                                                alt=""></a>
                                                    @else
                                                        <a data-wow-delay="0.1s"><img src="{{ asset('img/food.png') }}"
                                                                width="150" height="150" data-wow-delay="0.1s"
                                                                alt="{{ $produk[0]->nama }}"></a>
                                                    @endif
                                                </div>
                                                <div class="col-9">
                                                    <div class="nama">
                                                        <h5 class="modal-title">{{ ucwords($produk[0]->nama) }}</h5>
                                                    </div>
                                                    <div class="rincian" style="margin-top: 9%">
                                                        <span style="font-size: 18px; font-weight: 600; color: #5E9D7B">Rp
                                                            {{ number_format($produk[0]->harga, 2, ',', '.') }}</span><br>
                                                        <strong>Minimum Pembelian : </strong>{{ $produk[0]->minim }}
                                                        {{ $produk[0]->quantity }} <br>
                                                        <strong>Stok : </strong>{{ $produk[0]->stok }}
                                                        {{ $produk[0]->quantity }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="close">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                        </div>
                                        <div class="modal-body align-items-center">
                                            <div class="card mb-3">
                                                <div class="card-body shadow-sm">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="input-group mb-3">
                                                                        <button class="btn btn-outline-secondary minus-btn"
                                                                            type="button">-</button>
                                                                        <input type="text"
                                                                            style="background-color: white"
                                                                            class="form-control numeric-input text-center fs-5"
                                                                            min="{{ $produk[0]->minim }}"
                                                                            max="{{ $produk[0]->stok }}" name="quantity"
                                                                            value="{{ $produk[0]->minim }}" readonly>
                                                                        <button class="btn btn-outline-secondary plus-btn"
                                                                            type="button"
                                                                            style="border-radius: 0 7px 7px 0">+</button>
                                                                        <input type="hidden" class="stok-produk"
                                                                            value="{{ $produk[0]->stok }}">
                                                                        <input type="hidden" class="minim-produk"
                                                                            value="{{ $produk[0]->minim }}"
                                                                            data-item-id="{{ $produk[0]->id }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <h5 class="card-text mb-5" style="color: #5E9D7B">Total :
                                                                <span class="subtotal"
                                                                    style="border: none; color: #5E9D7B">Rp
                                                                    {{ number_format($produk[0]->harga * $produk[0]->minim, 2, ',', '.') }}</span>
                                                            </h5>
                                                            <input type="hidden" name="barang" value="{{ $produk[0]->id }}">
                                                            <input type="hidden" class="price" value="{{ $produk[0]->harga }}">
                                                            <input type="hidden" class="harga" id="harga"
                                                                name="hayo" value="{{ $produk[0]->harga }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col d-grid">
                            <form action="/cart" method="POST">
                                @csrf
                                <input type="hidden" name="total"
                                    value="{{ $produk[0]->harga * $produk[0]->minim }}">
                                <input type="hidden" name="barang" value="{{ $produk[0]->id }}">
                                <input type="hidden" name="quantity" value="{{ $produk[0]->minim }}">
                                <button type="submit" class="btn btn-warning"
                                    style="padding-left: 82px; padding-right: 82px">Tambahkan ke keranjang</button>
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
    @section('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const minusBtns = document.querySelectorAll('.minus-btn');
                const plusBtns = document.querySelectorAll('.plus-btn');
                const numericInputs = document.querySelectorAll('.numeric-input');
                const stokProduks = document.querySelectorAll('.stok-produk');
                const minimun = document.querySelectorAll('.minim-produk');
                const subtotals = document.querySelectorAll('.subtotal');
                const hargas = document.querySelectorAll('.price');

                function updateCart(item_id, quantity, price) {
                    axios.post('/update-cart', {
                            item_id: item_id,
                            quantity: quantity,
                            price: price
                        })
                        .then(function(response) {
                            // Di sini Anda dapat menangani respons jika diperlukan
                            console.log(response.data);
                        })
                        .catch(function(error) {
                            // Di sini Anda dapat menangani kesalahan jika diperlukan
                            console.error(error);
                        });
                }

                minusBtns.forEach(function(minusBtn, index) {
                    minusBtn.addEventListener('click', function() {
                        if (numericInputs[index].value > minimun[index].value * 1) {
                            numericInputs[index].value = parseInt(numericInputs[index].value) - 1;
                            updateSubtotal(index);
                            updateCart(minimun[index].dataset.itemId, numericInputs[index]
                                .value, parseInt(numericInputs[index].value * hargas[index].value));
                        }
                    });
                });

                plusBtns.forEach(function(plusBtn, index) {
                    plusBtn.addEventListener('click', function() {
                        if (numericInputs[index].value < stokProduks[index].value * 1) {
                            numericInputs[index].value = parseInt(numericInputs[index].value) + 1;
                            updateSubtotal(index);
                            updateCart(minimun[index].dataset.itemId, numericInputs[index]
                                .value, parseInt(numericInputs[index].value * hargas[index].value));
                        }
                    });
                });

                function updateSubtotal(index) {
                    const quantity = parseInt(numericInputs[index].value);
                    const price = parseFloat(hargas[index].value);
                    const subtotalValue = quantity * price;

                    subtotals[index].textContent = subtotalValue.toLocaleString('id-ID', {
                        style: 'currency',
                        currency: 'IDR'
                    });
                    const hargaInput = document.querySelector('#harga');
                    hargaInput.value = subtotalValue;

                    updateTotalKeranjang();
                    updateSubItem();

                    updateTotalKeranjang(); // Memanggil fungsi untuk mengupdate nilai total keranjang

                    // Memperbarui nilai pada input hidden dengan ID "totalharga"
                    const totalKeranjangValue = getTotalKeranjangValue();
                    const totalHargaInput = document.querySelector('#totalharga');
                    totalHargaInput.value = totalKeranjangValue / 100;
                }

                function getTotalKeranjangValue() {
                    const totalKeranjangElement = document.querySelector('#totalKeranjang');
                    const totalKeranjangValue = parseFloat(totalKeranjangElement.textContent.replace(/[^0-9]/g, ''));
                    return totalKeranjangValue;
                }

                function updateSubItem() {
                    let SubItem = 0;

                    const subitemElements = document.querySelectorAll('.numeric-input');
                    subitemElements.forEach(function(subitemElement) {
                        const subitemValue = parseFloat(subitemElement
                            .value); // Menggunakan parseFloat() karena nilai dari input mungkin berupa desimal
                        if (!isNaN(subitemValue)) {
                            SubItem += subitemValue; // Pastikan hanya nilai numerik yang dijumlahkan
                        }
                    });

                    const totalSubitemElement = document.querySelector('#subItem');
                    totalSubitemElement.textContent = SubItem;
                }


                function updateTotalKeranjang() {
                    let totalKeranjang = 0;

                    // Mengambil seluruh elemen subtotal dan menjumlahkannya
                    const subtotalElements = document.querySelectorAll('.subtotal');
                    subtotalElements.forEach(function(subtotalElement) {
                        const subtotalValue = parseFloat(subtotalElement.textContent.replace(/[^0-9]/g, ''));
                        totalKeranjang += subtotalValue / 100;
                    });

                    // Tampilkan kembali totalKeranjang
                    const totalKeranjangElement = document.querySelector('#totalKeranjang');
                    totalKeranjangElement.textContent = totalKeranjang.toLocaleString('id-ID', {
                        style: 'currency',
                        currency: 'IDR'
                    });
                }
            });
        </script>
    @endsection
