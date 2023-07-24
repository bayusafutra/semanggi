@extends('layouts.admin')
@section('erga')
    <div class="title mb-4">
          <h1 class="text-center" style="font-family:courier new; font-style: initial;">Produk Srikandi Semanggi</h1>
    </div>
    <div class="row ">
        <div class="col-12 grid-margin">
            @if (session()->has('success'))
                <div class="row justify-content-end">
                    <div class="alert alert-success col-lg-3" role="alert">
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-6" style="padding-left: 30px">
                            <h4 class="card-title">Data produk</h4>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-end" style="padding-right: 30px">
                            <a class="btn btn-primary" style="margin-right: 5px; border-radius: 5px; background-color: rgb(11, 136, 156); padding: 12px 27px 12px 27px" href="/dash-buatproduk"><span style="font-size: 20px; color:rgb(245, 230, 17)">+</span> Tambahkan Produk</a>
                        </div>
                    </div>
                    <div class="row justify-content-start">
                        <div class="col-lg-6" style="padding-left: 30px">
                            <strong>Jumlah Produk : {{ $produk->count() }}</strong>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">

                            <thead class="text-center">
                                <tr>
                                    <th>
                                        <strong>No</strong>
                                    </th>
                                    <th> Nama produk </th>
                                    <th> Kategori produk</th>
                                    <th> Dibuat oleh </th>
                                    <th> Harga </th>
                                    <th> Stok Produk </th>
                                    <th> Minimal pembelian </th>
                                    <th> Laku terjual </th>
                                    <th> Status produk </th>
                                </tr>
                            </thead>

                            <tbody class="text-center">
                                @if ($produk->count() == 0)

                            </tbody>
                        </table>
                                <div class="text-center mt-3">
                                    <strong style="color: #6C7293; font-family:courier new">Belum ada produk yang terdaftar</strong>
                                </div>
                                @else

                                    @foreach ($produk as $prog)
                                    <tr>
                                        <td>
                                            <strong>
                                                {{ $produk->firstItem() + $loop->index  }}
                                            </strong>
                                        </td>
                                        <td>
                                            <span class="pl-2">{{ ucwords($prog->nama) }}</span>
                                        </td>
                                        <td> {{ ucwords($prog->kategori->nama)  }} </td>
                                        <td> {{ ucwords($prog->user->name) }} </td>
                                        <td> Rp {{ number_format($prog->harga, 2, ',','.') }} </td>
                                        <td> {{ $prog->stok }} {{ $prog->quantity }}</td>
                                        <td> {{ $prog->minim }} {{ $prog->quantity }} </td>
                                        <td> {{ $prog->terjual }} {{ $prog->quantity }} </td>
                                        <td>
                                            @if ($prog->status == 1)
                                                <div class="badge badge-outline-success" style="padding-left: 15px; padding-right: 15px">Aktif</div>
                                            @else
                                                <div class="badge badge-outline-danger" style="padding-left: 18px; padding-right: 18px">Non-Aktif</div>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                        @endif
                        <br>
                        <div class="erga d-flex justify-content-center">
                            {{ $produk->links() }}
                        </div>
                    <div>
                </div>
            </div>
        </div>
    </div>
@endsection
