@extends('layouts.main')
@section('content')
    @include('component.sweetAlert')
    <div class="content-wrapper">

        <div class="container-xxl flex-grow-1 container-p-y">

            <h4 class="fw-bold py-3 mb-2">
                <span class="text-muted fw-light">Dashboard / Produk /</span> {{ $title }}
            </h4>
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('transaksi.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="id_produk" class="form-label">Pilih Produk:</label>
                                <select class="form-select" name="id_produk" required>
                                    @foreach ($produk as $produk)
                                        <option value="{{ $produk->id_produk }}">{{ $produk->nama_produk }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="quantity" class="form-label">Jumlah Barang:</label>
                                <input type="number" class="form-control" name="quantity" value="1" min="1"
                                    required>
                            </div>

                            <div class="row mb-3 py-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary me-2">Simpan</button>
                                    <button type="reset" class="btn btn-danger me-2">Reset</button>
                                    <a href="/produk" class="btn btn-warning me-2">Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
