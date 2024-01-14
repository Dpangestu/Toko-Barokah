@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4">Edit Produk</h4>

            @include('component.sweetAlert')
            <div class="row">

                <div class="card">

                    <div class="card-body">
                        <form action="/produk/update/{{ $produk->id_produk }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nama Produk</label>
                                <input type="text" class="form-control" name="nama_produk"
                                    value="{{ $produk->nama_produk }}" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Merk</label>
                                <input type="text" class="form-control" name="merk" value="{{ $produk->merk }}" />
                            </div>
                            <div class="mb-3">
                                <label for="defaultSelect" class="form-label">Kategori</label>
                                <select class="form-select mt-1" name="id_ketegori">
                                    <option selected disabledabled>-- Pilih Ketegori ---</option>
                                    @foreach ($kategori as $kat)
                                        <option value="{{ $kat->id_kategori }}"
                                            @if ($kat->id_kategori == $produk->id_kategori) selected @endif>{{ $kat->nama_kategori }}
                                        </option>
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Diskon</label>
                                <input type="text" class="form-control" name="diskon" value="{{ $produk->diskon }}" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Harga Beli</label>
                                <input type="text" class="form-control" name="harga_beli"
                                    value="{{ $produk->harga_beli }}" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Harga Jual</label>
                                <input type="text" class="form-control" name="harga_jual"
                                    value="{{ $produk->harga_jual }}" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Stok</label>
                                <input type="text" class="form-control" name="stok" value="{{ $produk->stok }}" />
                            </div>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
