@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4">Tambah Produk</h4>

            <div class="row">

                <div class="card">

                    <div class="card-body">
                        <form action="/produk/store" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nama Produk</label>
                                <input type="text" class="form-control" name="nama_produk" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Merk</label>
                                <input type="text" class="form-control" name="merk" />
                            </div>
                            <div class="mb-3">
                                <label for="defaultSelect" class="form-label">Kategori</label>
                                <select class="form-select mt-1" name="id_kategori">
                                    <option selected disabledabled>-- Pilih Kategori ---</option>
                                    @foreach ($kategori as $kat)
                                        <option value="{{ $kat->id_kategori }}">{{ $kat->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Diskon</label>
                                <input type="text" class="form-control" name="diskon" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Harga Beli</label>
                                <input type="text" class="form-control" name="harga_beli" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Harga Jual</label>
                                <input type="text" class="form-control" name="harga_jual" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Stok</label>
                                <input type="text" class="form-control" name="stok" />
                            </div>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
