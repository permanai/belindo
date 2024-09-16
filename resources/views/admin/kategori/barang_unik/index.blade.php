@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
    <div class="container">
        <h4 class="fw-bold py-3 mb-4">Daftar barang unik</h4>
        <div class="card">
            <h5 class="card-header">Data barang unik</h5>
            <div class="d-flex justify-content-start ms-4">
                <a href="{{ route('admin.kategori.barang_unik.create') }}" class="btn btn-primary">Tambah Data</a>
            </div>
            <div class="table-responsive text-nowrap p-4">
                <table class="table table-hover" id="table">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Id Produk</th>
                            <th>Nama</th>
                            <th>Foto</th>
                            <th>Kategori</th>
                            <th>Harga Retail</th>
                            <th>Harga Reseller</th>
                            <th>Jumlah</th>
                            <th>Tanggal Beli</th>
                            <th>Deskripsi</th>
                            <th>Berat (gram)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($barang_uniks as $barang_unik)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $barang_unik->id_produk }}</td>
                                <td>{{ $barang_unik->nama }}</td>
                                <td>
                                    @if ($barang_unik->foto)
                                        <img src="{{ asset('storage/images/' . $barang_unik->foto) }}" alt="{{ $barang_unik->nama }}"
                                            style="max-width: 50px; max-height: 50px;">
                                    @else
                                        <span>Gambar Tidak Tersedia</span>
                                    @endif
                                </td>
                                {{-- <td>{{ $barang_unik->kategori ? $barang_unik->kategori->kategori : 'Tidak Ada Kategori' }}</td> --}}
                                <td>{{ $barang_unik->kategori ? $barang_unik->kategori->kategori : 'Tidak Ada Kategori' }}</td>
                                <td>{{ number_format($barang_unik->harga_retail, 0, ',', '.') }}</td>
                                <td>{{ number_format($barang_unik->harga_reseller, 0, ',', '.') }}</td>
                                <td>{{ $barang_unik->jumlah }}</td>
                                <td>{{ $barang_unik->tglbeli }}</td>
                                <td>{{ $barang_unik->deskripsi }}</td>
                                <td>{{ $barang_unik->berat }} g</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('admin.kategori.barang_unik.edit', $barang_unik->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <form action="{{ route('admin.kategori.barang_unik.destroy', $barang_unik->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item"><i class="bx bx-trash me-1"></i>
                                                    Delete</button>
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
@endsection

@push('addon-style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endpush

@push('addon-script')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                searching: true,
                columnDefs: [
                    { targets: [0], searchable: true }
                ]
            });
        });
    </script>
@endpush
