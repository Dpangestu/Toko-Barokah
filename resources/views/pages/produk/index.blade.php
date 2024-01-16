@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4">Produk</h4>

            @include('component.sweetAlert')
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <div class="add-button-container">
                            <h4>Data Produk</h4>
                            <a href="/produk/create" class="btn btn-primary add-button">
                                <span class="tf-icons bx bx-plus-circle"></span>&nbsp;Tambah Produk
                            </a>
                        </div>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-striped table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Merk</th>
                                    <th>Harga Beli</th>
                                    <th>Diskon</th>
                                    <th>Harga Jual</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php $i = 1; ?>
                                @foreach ($produk as $item)
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td>{{ $item->nama_produk }}</td>
                                        <td>{{ $item->merk }}</td>
                                        <td>{{ $item->harga_beli }}</td>
                                        <td>{{ $item->diskon }}</td>
                                        <td>{{ $item->harga_jual }}</td>
                                        <td>{{ $item->stok }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="/produk/edit/{{ $item->id_produk }}"><i
                                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <form id="deleteForm{{ $item->id_produk }}"
                                                        action="/produk/delete/{{ $item->id_produk }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="#" class="dropdown-item"
                                                            onclick="confirmDelete({{ $item->id_produk }})"><i
                                                                class="bx bx-trash me-1"></i>Delete</a>
                                                        </a>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
