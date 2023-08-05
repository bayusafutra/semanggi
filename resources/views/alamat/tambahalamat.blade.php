@extends('layouts.alamatlayout')
@section('kontent')
    <section class="checkout spad" style="margin-bottom: 100px">
        <div class="container">
            <div class="checkout__form">
                <h4><a type="button" class="btn p-0 ms-auto btn-lg me-md-2" href=""><i class="bi bi-arrow-left"></i>
                    </a>Ubah Alamat Pengiriman</h4>
                <form action="/createalamat" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-9 col-md-6">
                            @if (session()->has('success'))
                                <div class="row justify-content-center">
                                    <div class="alert alert-success alert-dismissible text-center col-lg-6 fade show"
                                        role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama Penerima</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="nama"
                                    value="{{ old('nama') }}" placeholder="Nama Penerima" required>
                            </div>

                            <label for="exampleFormControlInput1" class="form-label">Nomor Telepon</label><br>
                            <div class="mb-3 input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">+62</span>
                                <input type="text" class="form-control" placeholder="Contoh: 881026108613"
                                    aria-label="Nomor" aria-describedby="addon-wrapping" name="notelp"
                                    value="{{ old('notelp') }}" oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Alamat Lengkap</label>
                                <textarea class="form-control" id="" cols="15" rows="5" placeholder="Nama Jalan, Gedung, No Rumah"
                                    name="alamat" required>{{ old('alamat') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Detail Lainnya</label>
                                <input type="text" class="form-control" name="detail" id="detail"
                                    value="{{ old('detail') }}" placeholder="Contoh: Blok / Unit No., Patokan">
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="inputProvinsi">Provinsi</label>
                                        <select class="form-control" id="inputProvinsi" aria-label="Pilih Provinsi"
                                            name="provinsi" style="width: 100%;" required>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="inputKota">Kota/Kabupaten</label>
                                        <select class="form-control" id="inputKota" name="kota"
                                            aria-label="Pilih Kota/Kabupaten" style="width: 100%" required>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-lg-4 mt-4">
                                    <div class="form-group mb-3">
                                        <label for="inputKecamatan">Kecamatan</label>
                                        <select class="form-control" id="inputKecamatan" name="kecamatan"
                                            aria-label="Pilih Kecamatan" style="width: 100%" required>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 mt-4">
                                    <div class="form-group mb-3">
                                        <label for="inputKelurahan">Kelurahan/Desa</label>
                                        <select class="form-control" id="inputKelurahan" name="kelurahan"
                                            aria-label="Pilih Kelurahan/Desa" style="width: 100%" required>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 mt-4">
                                    <div class="form-group mb-3">
                                        <label for="inputKodePos">Kode Pos</label>
                                        <select class="form-control" id="inputKodePos" name="kodepos"
                                            aria-label="Pilih Kode Pos" style="width: 100%" required>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="button d-flex justify-content-center mt-5">
                                <button type="submit" class="btn btn-lg"
                                    style="background-color: #5B8C51; color: white">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $("#inputProvinsi").select2({
                placeholder: 'Pilih Provinsi',
                ajax: {
                    url: "{{ route('pilihProv') }}",
                    processResults: function({
                        data
                    }) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: item.name
                                }
                            })
                        }
                    }
                }
            });

            $("#inputProvinsi").change(function() {
                let id = $('#inputProvinsi').val();
                let url = "/inputKota/" + id; // Ubah sesuai dengan URL yang benar
                $("#inputKota").select2({
                    placeholder: 'Pilih Kota',
                    ajax: {
                        url: url,
                        processResults: function({
                            data
                        }) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        id: item.id,
                                        text: item.name
                                    };
                                })
                            };
                        }
                    }
                });
            });

            $("#inputKota").change(function() {
                let id = $('#inputKota').val();
                let url = "/inputKecamatan/" + id; // Ubah sesuai dengan URL yang benar
                $("#inputKecamatan").select2({
                    placeholder: 'Pilih Kecamatan',
                    ajax: {
                        url: url,
                        processResults: function({
                            data
                        }) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        id: item.id,
                                        text: item.name
                                    };
                                })
                            };
                        }
                    }
                });
            });

            $("#inputKecamatan").change(function() {
                let id = $('#inputKecamatan').val();
                let url = "/inputKelurahan/" + id; // Ubah sesuai dengan URL yang benar
                $("#inputKelurahan").select2({
                    placeholder: 'Pilih Kelurahan/Desa',
                    ajax: {
                        url: url,
                        processResults: function({
                            data
                        }) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        id: item.id,
                                        text: item.name
                                    };
                                })
                            };
                        }
                    }
                });
            });

            $("#inputKelurahan").change(function() {
                let id = $('#inputKelurahan').val();
                let url = "/inputKodePos/" + id; // Ubah sesuai dengan URL yang benar
                $("#inputKodePos").select2({
                    placeholder: 'Pilih Kode Pos',
                    ajax: {
                        url: url,
                        processResults: function({
                            data
                        }) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        id: item.id,
                                        text: item.name
                                    };
                                })
                            };
                        }
                    }
                });
            });

        });
    </script>
@endsection
