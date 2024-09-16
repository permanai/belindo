@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
    <div class="container">
        <h4 class="fw-bold py-3 mb-4">Daftar Alat tulis kantor</h4>
        <div class="card">
            <h5 class="card-header">Data Alat tulis kantor</h5>
            <div class="d-flex justify-content-start ms-4">
                <a href="{{ route('admin.kategori.alat_tulis_kantor.create') }}" class="btn btn-primary">Tambah Data</a>
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
                        @foreach ($alat_tulis_kantors as $alat_tulis_kantor)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $alat_tulis_kantor->id_produk }}</td>
                                <td>{{ $alat_tulis_kantor->nama }}</td>
                                <td>
                                    @if ($alat_tulis_kantor->foto)
                                        <img src="{{ asset('storage/images/' . $alat_tulis_kantor->foto) }}" alt="{{ $alat_tulis_kantor->nama }}"
                                            style="max-width: 50px; max-height: 50px;">
                                    @else
                                        <span>Gambar Tidak Tersedia</span>
                                    @endif
                                </td>
                                {{-- <td>{{ $alat_tulis_kantor->kategori ? $alat_tulis_kantor->kategori->kategori : 'Tidak Ada Kategori' }}</td> --}}
                                <td>{{ $alat_tulis_kantor->kategori ? $alat_tulis_kantor->kategori->kategori : 'Tidak Ada Kategori' }}</td>
                                <td>{{ number_format($alat_tulis_kantor->harga_retail, 0, ',', '.') }}</td>
                                <td>{{ number_format($alat_tulis_kantor->harga_reseller, 0, ',', '.') }}</td>
                                <td>{{ $alat_tulis_kantor->jumlah }}</td>
                                <td>{{ $alat_tulis_kantor->tglbeli }}</td>
                                <td>{{ $alat_tulis_kantor->deskripsi }}</td>
                                <td>{{ $alat_tulis_kantor->berat }} g</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('admin.kategori.alat_tulis_kantor.edit', $alat_tulis_kantor->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <form action="{{ route('admin.kategori.alat_tulis_kantor.destroy', $alat_tulis_kantor->id) }}" method="POST">
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
