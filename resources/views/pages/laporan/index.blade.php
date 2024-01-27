@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-2">
                <span class="text-muted fw-light">Dashboard /</span> Laporan
            </h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="table-responsive text-nowrap">
                            <table id="userTable" class="table table-striped">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Penjualan</th>
                                        <th>Pengeluaran</th>
                                        <th>Pendapatan</th>
                                    </tr>
                                </thead>
                                {{-- <tbody class="table-border-bottom-0">
                                    <?php $i = 1; ?>
                                    @foreach ($kategori as $item)
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td>{{ $item->nama_kategori }}</td>
                                            <td>{{ $item->keterangan }}</td>
                                        </tr>
                                    @endforeach
                                </tbody> --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endsection
