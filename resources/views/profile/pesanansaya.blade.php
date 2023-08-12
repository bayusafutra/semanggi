@extends('layouts.profilelayout')
@section('css')
    <style>
        .scroll-container {
            overflow-x: auto;
            white-space: nowrap;
        }

        .produk {
            display: inline-block;
        }

        .produk li {
            display: inline-block;
            margin-right: 10px;
        }
    </style>
@endsection
@section('kontent')
    <div id="snippetContent">
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
        <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <div class="container bootstrap snippets bootdey">
            <div class="row">
                <div class="profile-nav col-md-3">
                    <div class="panel" style="border: white">
                        <div class="user-heading round" style="background-color: #5B8C51">
                            @if (auth()->user()->gambar)
                                <a href="#">
                                    <img class="img-fluid" src="{{ asset('storage/' . auth()->user()->gambar) }}"
                                        alt="">
                                </a>
                            @else
                                <a href="#">
                                    <img class="img-fluid"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAb1BMVEX///8AAACKiorm5uZ/f3/s7OzZ2dlhYWGEhISHh4fh4eHy8vKCgoLHx8f19fV5eXlcXFygoKBISEi+vr6wsLATExMmJiaTk5MbGxtDQ0M0NDRTU1Nzc3PS0tKtra2bm5stLS0iIiJOTk66urpra2u9lQk+AAAFVklEQVR4nO2di1riQAxGGRBQKoiKykXw+v7PuLbdroUWWmj+/Gk35wWc81HnkkkyvR6J7c16OWD9cTyTl/fww4Q9DhDR4jMkfLJHgmH6HTIe2WMBMOmHHOzRiBMtNnm/sGYPSJjt61PYZ84ekiTR/XMo8MwelRy5yWWPjiyHf5e+MsbssUkwnR/Ti3llD68ps93HKb8fllP2GJswuanQS1jt2vrfePrz3OPzbcse7fnsjs4uR5i36qcc9KuNSni6+hqyh16LydVFfimbhXnJ4V0Dv4S56RPHrLFfwv2MLXKMLxG/mC+2SinD+utDNRuDU+tW0C/G3G5nJywYwhtbaZ83ccEQ+mypPC8AwRBu2Vq/LCCCP8sGWyxjChI0E2+MljDDJxubuCNRGBFMBDpw32iMhe/03KPgeRgIOcptRstZsAV7K7DhA1twBBYMYUQ2vCxicQ7szdsn3HDDFYzggiFEVEPsYpjCPSnKHwuL7KiGmGPTPi9UwybB0brcuaEbuqEbuqEbumG4ckM3bMStG7qhG7ohnOvOG/pvKAH3KtgN3dAN/w/Dazd0Qzc8Sa2KAzd0w84b3rihG7qhG3bcEJlbmvFNNVQQDE9MwXsNQ2JCzXCsIhjCmJTurZHTlsHJbdP5RFM4lRcaK0UGZ/etkdOWwclt6/5XKl1xeApOxf5M0ZBUGbxWE2S1I3pVM2Q1QUEUjpbDShPWm2pYyewDNUNa7brWVLOmNVmQ7DFwCl7fM619G6/0SaNiJoZXNTNRMiQW6B02CgTBE4QXkKasiIb4+soYZsAUXeacwix21plqqJXAKoZMQZVdDbcQGNW3JQ+354BGJINb6axw+cS9eur1HuGG7O4mM1z7nZQlvQGfTCPB4/A78aJPUPzOdOjZlDyTxpT0Ihfkg63XQ5dccIstUrDbGm5TjBTs+YLdYSgBasiWS0C2GaL3wUpARk25nVsykP+IRl4TeoAJ2vhIkfeIVjrt4j5TIx8p7rqbffj9ZQgyNNTUG/Mj2vkJUffdhn5CTAaYmU7QKfKhYXJHyALyk42NNtA5pMOK7CBiCbJJ3xafnZPtt2vi5HuAbGK7gRBbgUg0bcGioexsam4m7Unva8ycKnLIhvf5wfwisnFTC3HSQ2RP+lZO93lks4fYndjLkD0j8q8Ni8gGhi2+2S17y2bhVu0QUUEjFxb7dN5QOlRjKkiTIF1eYu99WelUU3uPPEq/A2Fv2yZ9AWXl2ukf8olDxk4XXY8Iox59MhOOGqIKS4w8DoisljVywuh+pkL3s02QlaTvbLkYbF6bhc8UW7Nu4TPt/Cud6OIu/meK7uHC37uhy0iZBaQJ+L4K7HAGviSfO5tOsRNpyjvvpLjdKPjFbDhhqZFWV4yYuf5RcaDR9TLPt+6MM9R4yeqQK73zcKTTaKBIXylDQ689VBGNq2GNF4BPgY4Uf2Fr8erwjIz3P+r0Mqlihcpb3Nrwi1khtgAjrQ1MPTbSW4CJXgfBurxKno2H6JL0y7iT2gLMWAt8NX2JdgQz5gJfzVtjx3t0V4imLJsFchb8Bb6a58sb2Ew/2IOvycdlUYAprjRUnofzHbeaJ3gJ5udtcwZabwJIMq4fBRjYXOCruavnGGm8pYbiukYUQLNbPoKqALJmr3wUp7YAC+sbmHosj20BHvW6yKNZl0UBpnZO8BKsCluAti3w1RzUaLZxha9inBfUfIxDj/w+zvYp91LyAXK7cYom9N2w9bhh+3HD9uOG7ccN248bth83bD9u2H7csP24YfvJG+JfGmGQD+2jmshy2UuZ0nleTJeDPNTRuBs3axnLcZa8+AfDFYLTKKR4FgAAAABJRU5ErkJggg=="
                                        alt="">
                                </a>
                            @endif
                            <h1 class="mt-2" style="color: white">{{ ucwords(auth()->user()->name) }}</h1>
                            <p>{{ auth()->user()->email }}</p>
                        </div>

                        <ul class="nav nav-pills nav-stacked">
                            <li style="width: 100%;">
                                <a class="d-flex align-items-center" style="padding: 10px 15px 10px 15px"
                                    href="/profilpengguna"><i class="fa fa-user"></i>
                                    Profil
                                </a>
                            </li>
                            <li class="active" style="width: 100%">
                                <a class="d-flex align-items-center justify-content-between" href="#"
                                    style="padding: 0px 15px 0px 15px"><i class="fa fa-cube" style="color: #89817F">
                                        Pesanan Saya</i>
                                    <span class="label pull-right r-activity m-2"
                                        style="background: #5B8C51; color: white; padding: 1px 10px 1px 10px;">
                                        @php
                                            use App\Models\Pesanan;
                                            $pesanan = Pesanan::where('user_id', auth()->user()->id)->get();
                                            echo $pesanan->count();
                                        @endphp
                                    </span>
                                </a>
                            </li>
                            <li style="width: 100%">
                                <a class="d-flex align-items-center justify-content-between" href=""
                                    style="padding: 0px 15px 0px 15px"><i class="fa fa-star-o" style="color: #89817F">
                                        Penilaian Saya</i>
                                    <span class="label pull-right r-activity m-2"
                                        style="background: #5B8C51; color: white; padding: 1px 10px 1px 10px;">0</span>
                                </a>
                            </li>
                            <li style="width: 100%">
                                <a class="d-flex align-items-center" href="/editprofile"
                                    style="padding: 10px 15px 10px 15px"><i class="fa fa-edit"
                                        style="color: #89817F"></i>Edit Profile
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="profile-info col-md-9">
                    <div class="panel">
                        <div class="bio-graph-heading" style="font-style: normal; font-weight: 900">
                            DATA PESANAN
                        </div>
                        <div class="panel-body bio-graph-info container py-3" style="background-color: white">
                            <section id="listproduk">
                                <div class="container-xxl py-5">
                                    <div class="container portofolio">
                                        <div class="row g-0 gx-5 d-flex justify-content-center mb-5">
                                            <div class="col-lg-12 text-start text-lg-end wow slideInCenter"
                                                data-wow-delay="100">
                                                <div class="scroll-container">
                                                    <ul
                                                        class="produk nav nav-pills d-flex mx-auto justify-content-center mb-3">

                                                        <li class="nav-item me-2 mb-2">
                                                            <a class="btn btn-outline-primary border-2 active"
                                                                data-bs-toggle="pill" href="#tab-1">Belum Checkout</a>
                                                        </li>

                                                        <li class="nav-item me-2 mb-2">
                                                            <a class="btn btn-outline-primary border-2"
                                                                data-bs-toggle="pill" href="#tab-8">Belum Bayar</a>
                                                        </li>

                                                        <li class="nav-item me-2 mb-2">
                                                            <a class="btn btn-outline-primary border-2"
                                                                data-bs-toggle="pill" href="#tab-2">Verifikasi</a>
                                                        </li>

                                                        <li class="nav-item me-2 mb-2">
                                                            <a class="btn btn-outline-primary border-2"
                                                                data-bs-toggle="pill" href="#tab-3">Dikemas</a>
                                                        </li>

                                                        <li class="nav-item me-2 mb-2">
                                                            <a class="btn btn-outline-primary border-2"
                                                                data-bs-toggle="pill" href="#tab-4">Dikirim</a>
                                                        </li>

                                                        <li class="nav-item me-2 mb-2">
                                                            <a class="btn btn-outline-primary border-2"
                                                                data-bs-toggle="pill" href="#tab-5">Menunggu
                                                                Pengambilan</a>
                                                        </li>

                                                        <li class="nav-item me-2 mb-2">
                                                            <a class="btn btn-outline-primary border-2"
                                                                data-bs-toggle="pill" href="#tab-6">Selesai</a>
                                                        </li>

                                                        <li class="nav-item me-2 mb-2">
                                                            <a class="btn btn-outline-primary border-2"
                                                                data-bs-toggle="pill" href="#tab-7">Batal</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-content">
                                            <div id="tab-1" class="tab-pane fade show p-0 active">
                                                <div class="row g-4 d-flex justify-content-center">
                                                    @if ($belumco->count())
                                                        @foreach ($belumco as $bel)
                                                            <div class="col-10">
                                                                <div class="card p-3"
                                                                    style="border: none; background-color: #F1F2F7">
                                                                    <div class="card-title">
                                                                        <div class="row d-flex justify-content-between">
                                                                            <div class="col-7">
                                                                                <strong class="fw-bold fs-5"><a
                                                                                        title="Lihat detail pesanan"
                                                                                        style="color: black"
                                                                                        href="/detailpesanan/{{ $bel->slug }}">#{{ $bel->nomer }}</a></strong>
                                                                            </div>
                                                                            <div class="col-5 text-end">
                                                                                <small
                                                                                    style="color: black">{{ \Carbon\Carbon::parse($bel->created_at)->translatedFormat('l, d F Y H:i') }}</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-2">
                                                                                <img src="{{ asset('storage/' . $bel->detail[0]->barang->gambar) }}"
                                                                                    style="height: 77px; width: 77px"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="col-10">
                                                                                <span
                                                                                    style="color:black; 500; font-size: 20px font-family: Verdana, Geneva, Tahoma, sans-serif;">{{ ucwords($bel->detail[0]->barang->nama) }}</span><br>
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        <span
                                                                                            style="color: black">{{ $bel->detail[0]->barang->berat }}</span>
                                                                                    </div>
                                                                                    <div class="col-6 text-end">
                                                                                        <span
                                                                                            style="color: black">x{{ $bel->detail[0]->qtyitem }}
                                                                                            {{ $bel->detail[0]->barang->quantity }}</span>
                                                                                    </div>
                                                                                    <div class="col-12 text-end">
                                                                                        <span style="color: #F68037">Rp
                                                                                            {{ number_format($bel->detail[0]->barang->harga, 2, ',', '.') }}</span>
                                                                                    </div>

                                                                                    @if ($bel->detail()->count() > 1)
                                                                                        <hr class="my-2"
                                                                                            style="border: 1px solid rgb(91, 91, 91)">
                                                                                        <div class="col-12 text-center">
                                                                                            <a href="">Tampilkan
                                                                                                produk pembelian lainnya</a>
                                                                                        </div>
                                                                                    @endif

                                                                                    <hr class="my-2"
                                                                                        style="border: 1px solid rgb(91, 91, 91)">
                                                                                    <div class="col-6">
                                                                                        <span
                                                                                            style="color: black">{{ $bel->detail()->count() }}
                                                                                            Produk</span>
                                                                                    </div>
                                                                                    <div class="col-6 text-end">
                                                                                        <strong style="color: black">Jumlah
                                                                                            Harus Dibayar: </strong><span
                                                                                            style="color: #F68037">Rp
                                                                                            {{ number_format($bel->total, 2, ',', '.') }}</span>
                                                                                    </div>
                                                                                    <hr class="my-2"
                                                                                        style="border: 1px solid rgb(91, 91, 91)">
                                                                                    <div
                                                                                        class="col-7 d-flex align-items-center">
                                                                                        <span style="color: black">Segera
                                                                                            lakukan checkout pesanan
                                                                                            Anda</span>
                                                                                    </div>
                                                                                    <div class="col-5 text-end">
                                                                                        <a href="/detailpesanan/{{ $bel->slug }}"
                                                                                            class="btn"
                                                                                            style="background-color: #5B8C51; color: white">Checkout
                                                                                            Sekarang</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="pesan d-flex justify-content-center">
                                                            <div class="row text-center">
                                                                <div class="col-12 mb-2">
                                                                    <img src="img/order.png"
                                                                        style="height: 50px; width: 50px"
                                                                        alt=""><br>
                                                                </div>
                                                                <div class="col-12">
                                                                    <strong>Belum Ada Pesanan</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div id="tab-8" class="tab-pane fade show p-0">
                                                <div class="row g-4 d-flex justify-content-center">
                                                    @if ($belumbayar->count())
                                                        @foreach ($belumbayar as $bel)
                                                            <div class="col-10">
                                                                <div class="card p-3"
                                                                    style="border: none; background-color: #F1F2F7">
                                                                    <div class="card-title">
                                                                        <div class="row d-flex justify-content-between">
                                                                            <div class="col-7">
                                                                                <strong class="fw-bold fs-5"><a
                                                                                        title="Lihat detail pesanan"
                                                                                        style="color: black"
                                                                                        href="">#{{ $bel->nomer }}</a></strong>
                                                                            </div>
                                                                            <div class="col-5 text-end">
                                                                                <small
                                                                                    style="color: black">{{ \Carbon\Carbon::parse($bel->created_at)->translatedFormat('l, d F Y H:i') }}</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-2">
                                                                                <img src="{{ asset('storage/' . $bel->detail[0]->barang->gambar) }}"
                                                                                    style="height: 77px; width: 77px"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="col-10">
                                                                                <span
                                                                                    style="color:black; 500; font-size: 20px font-family: Verdana, Geneva, Tahoma, sans-serif;">{{ ucwords($bel->detail[0]->barang->nama) }}</span><br>
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        <span
                                                                                            style="color: black">{{ $bel->detail[0]->barang->berat }}</span>
                                                                                    </div>
                                                                                    <div class="col-6 text-end">
                                                                                        <span
                                                                                            style="color: black">x{{ $bel->detail[0]->qtyitem }}
                                                                                            {{ $bel->detail[0]->barang->quantity }}</span>
                                                                                    </div>
                                                                                    <div class="col-12 text-end">
                                                                                        <span style="color: #F68037">Rp
                                                                                            {{ number_format($bel->detail[0]->barang->harga, 2, ',', '.') }}</span>
                                                                                    </div>

                                                                                    @if ($bel->detail()->count() > 1)
                                                                                        <hr class="my-2"
                                                                                            style="border: 1px solid rgb(91, 91, 91)">
                                                                                        <div class="col-12 text-center">
                                                                                            <a href="">Tampilkan
                                                                                                produk pembelian lainnya</a>
                                                                                        </div>
                                                                                    @endif

                                                                                    <hr class="my-2"
                                                                                        style="border: 1px solid rgb(91, 91, 91)">
                                                                                    <div class="col-6">
                                                                                        <span
                                                                                            style="color: black">{{ $bel->detail()->count() }}
                                                                                            Produk</span>
                                                                                    </div>
                                                                                    <div class="col-6 text-end">
                                                                                        <strong style="color: black">Jumlah
                                                                                            Harus Dibayar: </strong><span
                                                                                            style="color: #F68037">Rp
                                                                                            {{ number_format($bel->subtotal, 2, ',', '.') }}</span>
                                                                                    </div>
                                                                                    <hr class="my-2"
                                                                                        style="border: 1px solid rgb(91, 91, 91)">
                                                                                    <div
                                                                                        class="col-8 d-flex align-items-center">
                                                                                        <span style="color: black">Bayar
                                                                                            sebelum
                                                                                            {{ \Carbon\Carbon::parse($bel->deadlinePaid)->translatedFormat('l, d F Y H:i') }}</span>
                                                                                    </div>
                                                                                    @if ($bel->pembayaran->status == 2)
                                                                                        <div class="col-4 text-end">
                                                                                            <a href="/pembayaran/{{ $bel->pembayaran->slug }}"
                                                                                                class="btn"
                                                                                                style="background-color: #5B8C51; color: white">Bayar
                                                                                                Sekarang</a>
                                                                                        </div>
                                                                                    @else
                                                                                        <div class="col-4 text-end">
                                                                                            <a href="/revisipembayaran/{{ $bel->pembayaran->slug }}"
                                                                                                class="btn"
                                                                                                style="background-color: #5B8C51; color: white">Bayar
                                                                                                Sekarang</a>
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="pesan d-flex justify-content-center">
                                                            <div class="row text-center">
                                                                <div class="col-12 mb-2">
                                                                    <img src="img/order.png"
                                                                        style="height: 50px; width: 50px"
                                                                        alt=""><br>
                                                                </div>
                                                                <div class="col-12">
                                                                    <strong>Belum Ada Pesanan</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div id="tab-2" class="tab-pane fade show p-0">
                                                <div class="row g-4 d-flex justify-content-center">
                                                    @if ($verifikasi->count())
                                                        @foreach ($verifikasi as $bel)
                                                            <div class="col-10">
                                                                <div class="card p-3"
                                                                    style="border: none; background-color: #F1F2F7">
                                                                    <div class="card-title">
                                                                        <div class="row d-flex justify-content-between">
                                                                            <div class="col-7">
                                                                                <strong class="fw-bold fs-5"><a
                                                                                        title="Lihat detail pesanan"
                                                                                        style="color: black"
                                                                                        href="">#{{ $bel->nomer }}</a></strong>
                                                                            </div>
                                                                            <div class="col-5 text-end">
                                                                                <small
                                                                                    style="color: black">{{ \Carbon\Carbon::parse($bel->created_at)->translatedFormat('l, d F Y H:i') }}</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-2">
                                                                                <img src="{{ asset('storage/' . $bel->detail[0]->barang->gambar) }}"
                                                                                    style="height: 77px; width: 77px"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="col-10">
                                                                                <span
                                                                                    style="color:black; 500; font-size: 20px font-family: Verdana, Geneva, Tahoma, sans-serif;">{{ ucwords($bel->detail[0]->barang->nama) }}</span><br>
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        <span
                                                                                            style="color: black">{{ $bel->detail[0]->barang->berat }}</span>
                                                                                    </div>
                                                                                    <div class="col-6 text-end">
                                                                                        <span
                                                                                            style="color: black">x{{ $bel->detail[0]->qtyitem }}
                                                                                            {{ $bel->detail[0]->barang->quantity }}</span>
                                                                                    </div>
                                                                                    <div class="col-12 text-end">
                                                                                        <span style="color: #F68037">Rp
                                                                                            {{ number_format($bel->detail[0]->barang->harga, 2, ',', '.') }}</span>
                                                                                    </div>

                                                                                    @if ($bel->detail()->count() > 1)
                                                                                        <hr class="my-2"
                                                                                            style="border: 1px solid rgb(91, 91, 91)">
                                                                                        <div class="col-12 text-center">
                                                                                            <a href="">Tampilkan
                                                                                                produk pembelian lainnya</a>
                                                                                        </div>
                                                                                    @endif

                                                                                    <hr class="my-2"
                                                                                        style="border: 1px solid rgb(91, 91, 91)">
                                                                                    <div class="col-6">
                                                                                        <span
                                                                                            style="color: black">{{ $bel->detail()->count() }}
                                                                                            Produk</span>
                                                                                    </div>
                                                                                    <div class="col-6 text-end">
                                                                                        <strong style="color: black">Jumlah
                                                                                            Harus Dibayar: </strong><span
                                                                                            style="color: #F68037">Rp
                                                                                            {{ number_format($bel->subtotal, 2, ',', '.') }}</span>
                                                                                    </div>
                                                                                    <hr class="my-2"
                                                                                        style="border: 1px solid rgb(91, 91, 91)">
                                                                                    <div
                                                                                        class="col-6 d-flex align-items-center">
                                                                                        <span style="color: black">Waktu
                                                                                            Pembayaran:
                                                                                            <br>{{ \Carbon\Carbon::parse($bel->paidTime)->translatedFormat('l, d F Y H:i') }}</span>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-6 d-flex align-items-center justify-content-end">
                                                                                        <span
                                                                                            style="color: #1a7532">Menunggu
                                                                                            verifikasi pembayaran</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="pesan d-flex justify-content-center">
                                                            <div class="row text-center">
                                                                <div class="col-12 mb-2">
                                                                    <img src="img/order.png"
                                                                        style="height: 50px; width: 50px"
                                                                        alt=""><br>
                                                                </div>
                                                                <div class="col-12">
                                                                    <strong>Belum Ada Pesanan</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div id="tab-3" class="tab-pane fade show p-0">
                                                <div class="row g-4 d-flex justify-content-center">
                                                    @if ($dikemas->count())
                                                        @foreach ($dikemas as $bel)
                                                            <div class="col-10">
                                                                <div class="card p-3"
                                                                    style="border: none; background-color: #F1F2F7">
                                                                    <div class="card-title">
                                                                        <div class="row d-flex justify-content-between">
                                                                            <div class="col-7">
                                                                                <strong class="fw-bold fs-5"><a
                                                                                        title="Lihat detail pesanan"
                                                                                        style="color: black"
                                                                                        href="">#{{ $bel->nomer }}</a></strong>
                                                                            </div>
                                                                            <div class="col-5 text-end">
                                                                                <small
                                                                                    style="color: black">{{ \Carbon\Carbon::parse($bel->created_at)->translatedFormat('l, d F Y H:i') }}</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-2">
                                                                                <img src="{{ asset('storage/' . $bel->detail[0]->barang->gambar) }}"
                                                                                    style="height: 77px; width: 77px"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="col-10">
                                                                                <span
                                                                                    style="color:black; 500; font-size: 20px font-family: Verdana, Geneva, Tahoma, sans-serif;">{{ ucwords($bel->detail[0]->barang->nama) }}</span><br>
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        <span
                                                                                            style="color: black">{{ $bel->detail[0]->barang->berat }}</span>
                                                                                    </div>
                                                                                    <div class="col-6 text-end">
                                                                                        <span
                                                                                            style="color: black">x{{ $bel->detail[0]->qtyitem }}
                                                                                            {{ $bel->detail[0]->barang->quantity }}</span>
                                                                                    </div>
                                                                                    <div class="col-12 text-end">
                                                                                        <span style="color: #F68037">Rp
                                                                                            {{ number_format($bel->detail[0]->barang->harga, 2, ',', '.') }}</span>
                                                                                    </div>

                                                                                    @if ($bel->detail()->count() > 1)
                                                                                        <hr class="my-2"
                                                                                            style="border: 1px solid rgb(91, 91, 91)">
                                                                                        <div class="col-12 text-center">
                                                                                            <a href="">Tampilkan
                                                                                                produk pembelian lainnya</a>
                                                                                        </div>
                                                                                    @endif

                                                                                    <hr class="my-2"
                                                                                        style="border: 1px solid rgb(91, 91, 91)">
                                                                                    <div class="col-6">
                                                                                        <span
                                                                                            style="color: black">{{ $bel->detail()->count() }}
                                                                                            Produk</span>
                                                                                    </div>
                                                                                    <div class="col-6 text-end">
                                                                                        <strong style="color: black">Total
                                                                                            Pesanan: </strong><span
                                                                                            style="color: #F68037">Rp
                                                                                            {{ number_format($bel->subtotal, 2, ',', '.') }}</span>
                                                                                    </div>
                                                                                    <hr class="my-2"
                                                                                        style="border: 1px solid rgb(91, 91, 91)">
                                                                                    <div
                                                                                        class="col-9 d-flex align-items-center">
                                                                                        <span style="color: black">Paket
                                                                                            dikirim
                                                                                            sebelum
                                                                                            <strong>{{ \Carbon\Carbon::parse($bel->timebataskirim)->translatedFormat('l, d F Y') }}</strong></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="pesan d-flex justify-content-center">
                                                            <div class="row text-center">
                                                                <div class="col-12 mb-2">
                                                                    <img src="img/order.png"
                                                                        style="height: 50px; width: 50px"
                                                                        alt=""><br>
                                                                </div>
                                                                <div class="col-12">
                                                                    <strong>Belum Ada Pesanan</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div id="tab-4" class="tab-pane fade show p-0">
                                                <div class="row g-4 d-flex justify-content-center">
                                                    @if ($dikirim->count())
                                                        @foreach ($dikirim as $bel)
                                                            <div class="col-10">
                                                                <div class="card p-3"
                                                                    style="border: none; background-color: #F1F2F7">
                                                                    <div class="card-title">
                                                                        <div class="row d-flex justify-content-between">
                                                                            <div class="col-7">
                                                                                <strong class="fw-bold fs-5"><a
                                                                                        title="Lihat detail pesanan"
                                                                                        style="color: black"
                                                                                        href="">#{{ $bel->nomer }}</a></strong>
                                                                            </div>
                                                                            <div class="col-5 text-end">
                                                                                <small
                                                                                    style="color: black">{{ \Carbon\Carbon::parse($bel->created_at)->translatedFormat('l, d F Y H:i') }}</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-2">
                                                                                <img src="{{ asset('storage/' . $bel->detail[0]->barang->gambar) }}"
                                                                                    style="height: 77px; width: 77px"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="col-10">
                                                                                <span
                                                                                    style="color:black; 500; font-size: 20px font-family: Verdana, Geneva, Tahoma, sans-serif;">{{ ucwords($bel->detail[0]->barang->nama) }}</span><br>
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        <span
                                                                                            style="color: black">{{ $bel->detail[0]->barang->berat }}</span>
                                                                                    </div>
                                                                                    <div class="col-6 text-end">
                                                                                        <span
                                                                                            style="color: black">x{{ $bel->detail[0]->qtyitem }}
                                                                                            {{ $bel->detail[0]->barang->quantity }}</span>
                                                                                    </div>
                                                                                    <div class="col-12 text-end">
                                                                                        <span style="color: #F68037">Rp
                                                                                            {{ number_format($bel->detail[0]->barang->harga, 2, ',', '.') }}</span>
                                                                                    </div>

                                                                                    @if ($bel->detail()->count() > 1)
                                                                                        <hr class="my-2"
                                                                                            style="border: 1px solid rgb(91, 91, 91)">
                                                                                        <div class="col-12 text-center">
                                                                                            <a href="">Tampilkan
                                                                                                produk pembelian lainnya</a>
                                                                                        </div>
                                                                                    @endif

                                                                                    <hr class="my-2"
                                                                                        style="border: 1px solid rgb(91, 91, 91)">
                                                                                    <div class="col-6">
                                                                                        <span
                                                                                            style="color: black">{{ $bel->detail()->count() }}
                                                                                            Produk</span>
                                                                                    </div>
                                                                                    <div class="col-6 text-end">
                                                                                        <strong style="color: black">Total
                                                                                            Pesanan: </strong><span
                                                                                            style="color: #F68037">Rp
                                                                                            {{ number_format($bel->subtotal, 2, ',', '.') }}</span>
                                                                                    </div>
                                                                                    <hr class="my-2"
                                                                                        style="border: 1px solid rgb(91, 91, 91)">
                                                                                    <div class="col-6 d-flex align-items-center">
                                                                                        <span style="color: black">Pesanan Dikirim pada {{ \Carbon\Carbon::parse($bel->timekirim)->translatedFormat('l, d F Y H:i') }}</span>
                                                                                    </div>
                                                                                    <div class="col-6 text-end">
                                                                                        <a href="" class="btn"
                                                                                            style="background-color: #5B8C51; color: white">Pesanan
                                                                                            Diterima</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="pesan d-flex justify-content-center">
                                                            <div class="row text-center">
                                                                <div class="col-12 mb-2">
                                                                    <img src="img/order.png"
                                                                        style="height: 50px; width: 50px"
                                                                        alt=""><br>
                                                                </div>
                                                                <div class="col-12">
                                                                    <strong>Belum Ada Pesanan</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div id="tab-5" class="tab-pane fade show p-0">
                                                <div class="row g-4 d-flex justify-content-center">
                                                    @if ($ambil->count())
                                                        @foreach ($ambil as $bel)
                                                            <div class="col-10">
                                                                <div class="card p-3"
                                                                    style="border: none; background-color: #F1F2F7">
                                                                    <div class="card-title">
                                                                        <div class="row d-flex justify-content-between">
                                                                            <div class="col-7">
                                                                                <strong class="fw-bold fs-5"><a
                                                                                        title="Lihat detail pesanan"
                                                                                        style="color: black"
                                                                                        href="">#{{ $bel->nomer }}</a></strong>
                                                                            </div>
                                                                            <div class="col-5 text-end">
                                                                                <small
                                                                                    style="color: black">{{ \Carbon\Carbon::parse($bel->created_at)->translatedFormat('l, d F Y H:i') }}</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-2">
                                                                                <img src="{{ asset('storage/' . $bel->detail[0]->barang->gambar) }}"
                                                                                    style="height: 77px; width: 77px"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="col-10">
                                                                                <span
                                                                                    style="color:black; 500; font-size: 20px font-family: Verdana, Geneva, Tahoma, sans-serif;">{{ ucwords($bel->detail[0]->barang->nama) }}</span><br>
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        <span
                                                                                            style="color: black">{{ $bel->detail[0]->barang->berat }}</span>
                                                                                    </div>
                                                                                    <div class="col-6 text-end">
                                                                                        <span
                                                                                            style="color: black">x{{ $bel->detail[0]->qtyitem }}
                                                                                            {{ $bel->detail[0]->barang->quantity }}</span>
                                                                                    </div>
                                                                                    <div class="col-12 text-end">
                                                                                        <span style="color: #F68037">Rp
                                                                                            {{ number_format($bel->detail[0]->barang->harga, 2, ',', '.') }}</span>
                                                                                    </div>

                                                                                    @if ($bel->detail()->count() > 1)
                                                                                        <hr class="my-2"
                                                                                            style="border: 1px solid rgb(91, 91, 91)">
                                                                                        <div class="col-12 text-center">
                                                                                            <a href="">Tampilkan
                                                                                                produk pembelian lainnya</a>
                                                                                        </div>
                                                                                    @endif

                                                                                    <hr class="my-2"
                                                                                        style="border: 1px solid rgb(91, 91, 91)">
                                                                                    <div class="col-6">
                                                                                        <span
                                                                                            style="color: black">{{ $bel->detail()->count() }}
                                                                                            Produk</span>
                                                                                    </div>
                                                                                    <div class="col-6 text-end">
                                                                                        <strong style="color: black">Total
                                                                                            Pesanan: </strong><span
                                                                                            style="color: #F68037">Rp
                                                                                            {{ number_format($bel->subtotal, 2, ',', '.') }}</span>
                                                                                    </div>
                                                                                    <hr class="my-2"
                                                                                        style="border: 1px solid rgb(91, 91, 91)">
                                                                                    <div
                                                                                        class="col-7 d-flex align-items-center">
                                                                                        <span style="color: black">Silahkan
                                                                                            ambil
                                                                                            pesanan Anda di Kampung
                                                                                            Semanggi</span>
                                                                                    </div>
                                                                                    <div class="col-5 text-end">
                                                                                        <a href="" class="btn"
                                                                                            style="background-color: #5B8C51; color: white">Pesanan
                                                                                            Diterima</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="pesan d-flex justify-content-center">
                                                            <div class="row text-center">
                                                                <div class="col-12 mb-2">
                                                                    <img src="img/order.png"
                                                                        style="height: 50px; width: 50px"
                                                                        alt=""><br>
                                                                </div>
                                                                <div class="col-12">
                                                                    <strong>Belum Ada Pesanan</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div id="tab-6" class="tab-pane fade show p-0">
                                                <div class="row g-4 d-flex justify-content-center">
                                                    @if ($selesai->count())
                                                        @foreach ($selesai as $bel)
                                                            <div class="col-10">
                                                                <div class="card p-3"
                                                                    style="border: none; background-color: #F1F2F7">
                                                                    <div class="card-title">
                                                                        <div class="row d-flex justify-content-between">
                                                                            <div class="col-7">
                                                                                <strong class="fw-bold fs-5"><a
                                                                                        title="Lihat detail pesanan"
                                                                                        style="color: black"
                                                                                        href="">#{{ $bel->nomer }}</a></strong>
                                                                            </div>
                                                                            <div class="col-5 text-end">
                                                                                <small
                                                                                    style="color: black">{{ \Carbon\Carbon::parse($bel->created_at)->translatedFormat('l, d F Y H:i') }}</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-2">
                                                                                <img src="{{ asset('storage/' . $bel->detail[0]->barang->gambar) }}"
                                                                                    style="height: 77px; width: 77px"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="col-10">
                                                                                <span
                                                                                    style="color:black; 500; font-size: 20px font-family: Verdana, Geneva, Tahoma, sans-serif;">{{ ucwords($bel->detail[0]->barang->nama) }}</span><br>
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        <span
                                                                                            style="color: black">{{ $bel->detail[0]->barang->berat }}</span>
                                                                                    </div>
                                                                                    <div class="col-6 text-end">
                                                                                        <span
                                                                                            style="color: black">x{{ $bel->detail[0]->qtyitem }}
                                                                                            {{ $bel->detail[0]->barang->quantity }}</span>
                                                                                    </div>
                                                                                    <div class="col-12 text-end">
                                                                                        <span style="color: #F68037">Rp
                                                                                            {{ number_format($bel->detail[0]->barang->harga, 2, ',', '.') }}</span>
                                                                                    </div>

                                                                                    @if ($bel->detail()->count() > 1)
                                                                                        <hr class="my-2"
                                                                                            style="border: 1px solid rgb(91, 91, 91)">
                                                                                        <div class="col-12 text-center">
                                                                                            <a href="">Tampilkan
                                                                                                produk pembelian lainnya</a>
                                                                                        </div>
                                                                                    @endif

                                                                                    <hr class="my-2"
                                                                                        style="border: 1px solid rgb(91, 91, 91)">
                                                                                    <div class="col-6">
                                                                                        <span
                                                                                            style="color: black">{{ $bel->detail()->count() }}
                                                                                            Produk</span>
                                                                                    </div>
                                                                                    <div class="col-6 text-end">
                                                                                        <strong style="color: black">Total
                                                                                            Pesanan: </strong><span
                                                                                            style="color: #F68037">Rp
                                                                                            {{ number_format($bel->subtotal, 2, ',', '.') }}</span>
                                                                                    </div>
                                                                                    <hr class="my-2"
                                                                                        style="border: 1px solid rgb(91, 91, 91)">
                                                                                    <div
                                                                                        class="col-7 d-flex align-items-center">
                                                                                        <span style="color: black">Nilai
                                                                                            produk
                                                                                            sebelum
                                                                                            <strong>{{ \Carbon\Carbon::parse($bel->timebatasnilai)->translatedFormat('l, d F Y') }}</strong></span>
                                                                                    </div>
                                                                                    <div class="col-5 text-end">
                                                                                        <a href="" class="btn"
                                                                                            style="background-color: #5B8C51; color: white">Beri
                                                                                            Penilaian</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="pesan d-flex justify-content-center">
                                                            <div class="row text-center">
                                                                <div class="col-12 mb-2">
                                                                    <img src="img/order.png"
                                                                        style="height: 50px; width: 50px"
                                                                        alt=""><br>
                                                                </div>
                                                                <div class="col-12">
                                                                    <strong>Belum Ada Pesanan</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div id="tab-7" class="tab-pane fade show p-0">
                                                <div class="row g-4 d-flex justify-content-center">
                                                    @if ($batal->count())
                                                        @foreach ($batal as $bel)
                                                            <div class="col-10">
                                                                <div class="card p-3"
                                                                    style="border: none; background-color: #F1F2F7">
                                                                    <div class="card-title">
                                                                        <div class="row d-flex justify-content-between">
                                                                            <div class="col-7">
                                                                                <strong class="fw-bold fs-5"><a
                                                                                        title="Lihat detail pesanan"
                                                                                        style="color: black"
                                                                                        href="">#{{ $bel->nomer }}</a></strong>
                                                                            </div>
                                                                            <div class="col-5 text-end">
                                                                                <small
                                                                                    style="color: black">{{ \Carbon\Carbon::parse($bel->created_at)->translatedFormat('l, d F Y H:i') }}</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-2">
                                                                                <img src="{{ asset('storage/' . $bel->detail[0]->barang->gambar) }}"
                                                                                    style="height: 77px; width: 77px"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="col-10">
                                                                                <span
                                                                                    style="color:black; 500; font-size: 20px font-family: Verdana, Geneva, Tahoma, sans-serif;">{{ ucwords($bel->detail[0]->barang->nama) }}</span><br>
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        <span
                                                                                            style="color: black">{{ $bel->detail[0]->barang->berat }}</span>
                                                                                    </div>
                                                                                    <div class="col-6 text-end">
                                                                                        <span
                                                                                            style="color: black">x{{ $bel->detail[0]->qtyitem }}
                                                                                            {{ $bel->detail[0]->barang->quantity }}</span>
                                                                                    </div>
                                                                                    <div class="col-12 text-end">
                                                                                        <span style="color: #F68037">Rp
                                                                                            {{ number_format($bel->detail[0]->barang->harga, 2, ',', '.') }}</span>
                                                                                    </div>

                                                                                    @if ($bel->detail()->count() > 1)
                                                                                        <hr class="my-2"
                                                                                            style="border: 1px solid rgb(91, 91, 91)">
                                                                                        <div class="col-12 text-center">
                                                                                            <a href="">Tampilkan
                                                                                                produk pembelian lainnya</a>
                                                                                        </div>
                                                                                    @endif

                                                                                    <hr class="my-2"
                                                                                        style="border: 1px solid rgb(91, 91, 91)">
                                                                                    <div class="col-6">
                                                                                        <span
                                                                                            style="color: black">{{ $bel->detail()->count() }}
                                                                                            Produk</span>
                                                                                    </div>
                                                                                    <div class="col-6 text-end">
                                                                                        <strong style="color: black">Total
                                                                                            Pesanan: </strong><span
                                                                                            style="color: #F68037">Rp
                                                                                            {{ number_format($bel->subtotal, 2, ',', '.') }}</span>
                                                                                    </div>
                                                                                    <hr class="my-2"
                                                                                        style="border: 1px solid rgb(91, 91, 91)">

                                                                                    <div
                                                                                        class="col-7 d-flex align-items-center">
                                                                                        @if ($bel->pesanbatal)
                                                                                            <span
                                                                                                style="color: black">Dibatalkan
                                                                                                oleh Anda
                                                                                            </span>
                                                                                        @else
                                                                                            <span
                                                                                                style="color: black">Dibatalkan
                                                                                                secara otomatis oleh
                                                                                                sistem
                                                                                            </span>
                                                                                        @endif
                                                                                    </div>

                                                                                    <div class="col-5 text-end">
                                                                                        @if ($bel->detail()->count() > 1)
                                                                                            <a href="/cart"
                                                                                                class="btn px-5"
                                                                                                style="background-color: #5B8C51; color: white">Beli
                                                                                                Lagi
                                                                                            </a>
                                                                                        @else
                                                                                            <a href="/detailproduk/{{ $bel->detail[0]->barang->slug }}"
                                                                                                class="btn px-5"
                                                                                                style="background-color: #5B8C51; color: white">Beli
                                                                                                Lagi
                                                                                            </a>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="pesan d-flex justify-content-center">
                                                            <div class="row text-center">
                                                                <div class="col-12 mb-2">
                                                                    <img src="img/order.png"
                                                                        style="height: 50px; width: 50px"
                                                                        alt=""><br>
                                                                </div>
                                                                <div class="col-12">
                                                                    <strong>Belum Ada Pesanan</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script type="text/javascript"></script>
        <style>
            #bsaHolder {
                right: 10px;
                position: absolute;
                top: 0;
                width: 345px;
                z-index: 10
            }

            #bsa_closeAd {
                width: 15px;
                height: 15px;
                overflow: hidden;
                position: absolute;
                top: 10px;
                right: 110px;
                border: none !important;
                z-index: 1;
                text-decoration: none !important;
                background: url(https://bootdey.com/img/x_icon.png) red no-repeat
            }
        </style>
    </div>
@endsection
