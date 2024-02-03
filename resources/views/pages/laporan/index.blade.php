@extends('layouts.main')
@php
    $active = 'Laporan';
@endphp

@section('title')
    Laporan Pendapatan {{ tanggal_indonesia($tanggalAwal, false) }} s/d {{ tanggal_indonesia($tanggalAkhir, false) }}
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-2">
                <span class="text-muted fw-light">Dashboard /</span> Laporan
            </h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="add-button-container">
                                    {{-- <button type="button" class="btn btn-primary add-button" data-bs-toggle="modal"
                                        data-bs-target="#modal-form">
                                        <span class="tf-icons bx bxs-calendar-edit"></span>&nbsp; Ubah Periode
                                    </button>
                                    <button type="button" class="btn btn-primary add-button" data-bs-toggle="modal"
                                        data-bs-target="#exportPdfModal">
                                        <span class="tf-icons bx bxs-file-archive"></span>&nbsp; Export PDF
                                    </button> --}}
                                    <h4>Data Laporan</h4>
                                </div>
                                <!-- Add any additional elements here -->
                            </div>
                        </div>
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
                                <tbody class="table-border-bottom-0">
                                    <?php $i = 1; ?>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $item['tanggal'] }}</td>
                                            <td>{{ $item['transaksi'] }}</td>
                                            <td>{{ $item['gudang'] }}</td>
                                            <td>{{ $item['pendapatan'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (!isset($tanggalAwal))
        @php
            $tanggalAwal = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
        @endphp
    @endif
    @includeIf('laporan.form')
@endsection

@push('scripts')
    <script src="{{ asset('/AdminLTE-2/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}">
    </script>
    <script>
        let table;

        $(function() {
            table = $('.table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('laporan.data', [$tanggalAwal, $tanggalAkhir]) }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'tanggal'
                    },
                    {
                        data: 'penjualan'
                    },
                    {
                        data: 'pengeluaran'
                    },
                    {
                        data: 'pendapatan'
                    }
                ],
                dom: 'Brt',
                bSort: false,
                bPaginate: false,
            });

            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            });
        });

        function updatePeriode() {
            $('#modal-form').modal('show');
        }
    </script>
@endpush

<!-- Export PDF Modal -->
<div class="modal fade" id="exportPdfModal" tabindex="-1" aria-labelledby="exportPdfModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exportPdfModalLabel">Export PDF Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to export the PDF?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="{{ route('laporan.export_pdf', ['awal' => $tanggalAwal, 'akhir' => $tanggalAkhir]) }}"
                    class="btn btn-primary">Export PDF</a>
            </div>
        </div>
    </div>
</div>
