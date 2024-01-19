@extends('layouts.main')
@section('content')
    @include('component.sweetAlert')

    <style>
        .tampil-bayar {
            font-size: 5em;
            text-align: center;
            height: 100px;
        }

        .tampil-terbilang {
            padding: 10px;
            background: #f0f0f0;
        }

        .table-penjualan tbody tr:last-child {
            display: none;
        }

        @media(max-width: 768px) {
            .tampil-bayar {
                font-size: 3em;
                height: 70px;
                padding-top: 5px;
            }
        }
    </style>

    <div class="content-wrapper">

        <div class="container-xxl flex-grow-1 container-p-y">

            <h4 class="fw-bold py-3 mb-2">
                <span class="text-muted fw-light">Dashboard / Produk /</span> {{ $title }}
            </h4>
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form class="form-produk">
                            @csrf

                            <div class="form-group row">
                                <label for="id_produk" class="form-label">Pilih Produk:</label>
                                <div class="col-lg-5">
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                            placeholder="klik tombol untuk menambahkan produk"
                                            aria-label="klik tombol untuk menambahkan produk"
                                            aria-describedby="button-addon2" />
                                        <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#produkList">
                                            <i class='bx bxs-right-arrow-circle'></i>
                                        </button>

                                    </div>

                                </div>
                            </div>
                        </form>

                        <br>

                        <div class="table-responsive text-nowrap">
                            <table id="userTable" class="table table-striped">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Harga Jual</th>
                                        <th>QTY</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php $i = 1; ?>
                                    <tr id="selectedRow">
                                        <td><?= $i++ ?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="tampil-bayar bg-primary"></div>
                                <div class="tampil-terbilang"></div>
                            </div>
                            <div class="col-lg-4">
                                <form action="{{ route('transaksi.store') }}" method="POST" class="form-penjualan">
                                    @csrf
                                    <input type="hidden" name="id_penjualan" value="">
                                    <input type="hidden" name="total" id="total">
                                    <input type="hidden" name="total_item" id="total_item">
                                    <input type="hidden" name="bayar" id="bayar">
                                    <input type="hidden" name="id_member" id="id_member" value="">

                                    <div class="mb-3">
                                        <label for="totalrp" class="col-lg-2 control-label">Total</label>
                                        <div class="col-lg-12">
                                            <input type="text" id="totalrp" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="diskon" class="col-lg-2 control-label">Diskon</label>
                                        <div class="col-lg-12">
                                            <input type="number" name="diskon" id="diskon" class="form-control"
                                                value="" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="bayar" class="col-lg-2 control-label">Bayar</label>
                                        <div class="col-lg-12">
                                            <input type="text" id="bayarrp" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="diterima" class="col-lg-2 control-label">Diterima</label>
                                        <div class="col-lg-12">
                                            <input type="number" id="diterima" class="form-control" name="diterima"
                                                value="">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kembali" class="col-lg-2 control-label">Kembali</label>
                                        <div class="col-lg-12">
                                            <input type="text" id="kembali" name="kembali" class="form-control"
                                                value="0" readonly>
                                        </div>
                                    </div>
                                </form>

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary btn-sm btn-flat pull-right btn-simpan"><i
                                            class="fa fa-floppy-o"></i> Simpan Transaksi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    {{-- Modal Produk --}}
    <div class="modal fade" id="produkList" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel4">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-bordered table-produk">
                        <thead>
                            <th width="5%">No</th>
                            <th>Nama</th>
                            <th>Harga Jual</th>
                            <th>
                                <i class='bx bxs-cog'></i>
                            </th>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($produk as $item)
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td>{{ $item->nama_produk }}</td>
                                    <td>{{ $item->harga_jual }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-xs btn-flat"
                                            onclick="pilihProduk('{{ $item->id_produk }}', '{{ $item->nama_produk }}', '{{ $item->harga_jual }}')">
                                            <i class="fa fa-check-circle"></i>
                                            Pilih
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal Produk --}}

    <script>
        function pilihProduk(id, nama, harga) {
            // Update the content of the main table with the selected data
            document.getElementById('selectedRow').innerHTML = `
            <td>${id}</td>
            <td>${nama}</td>
            <td>${harga}</td>
            <td>1</td>
            <td>Aksi</td>
        `;

            // Close the modal (optional)
            $('#produkList' + id).modal('hide');
        }
    </script>
@endsection
