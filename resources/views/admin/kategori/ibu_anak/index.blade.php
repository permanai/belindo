@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
    <div class="container">
        <h4 class="fw-bold py-3 mb-4">Daftar ibu dan anak</h4>
        <div class="card">
            <h5 class="card-header">Data ibu dan anak</h5>
            <div class="d-flex justify-content-start ms-4">
                <a href="{{ route('admin.kategori.ibu_anak.create') }}" class="btn btn-primary">Tambah Data</a>
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
                        @foreach ($ibu_anaks as $ibu_anak)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ibu_anak->id_produk }}</td>
                                <td>{{ $ibu_anak->nama }}</td>
                                <td>
                                    @if ($ibu_anak->foto)
                                        <img src="{{ asset('storage/images/' . $ibu_anak->foto) }}" alt="{{ $ibu_anak->nama }}"
                                            style="max-width: 50px; max-height: 50px;">
                                    @else
                                        <span>Gambar Tidak Tersedia</span>
                                    @endif
                                </td>
                                {{-- <td>{{ $ibu_anak->kategori ? $ibu_anak->kategori->kategori : 'Tidak Ada Kategori' }}</td> --}}
                                <td>{{ $ibu_anak->kategori ? $ibu_anak->kategori->kategori : 'Tidak Ada Kategori' }}</td>
                                <td>{{ number_format($ibu_anak->harga_retail, 0, ',', '.') }}</td>
                                <td>{{ number_format($ibu_anak->harga_reseller, 0, ',', '.') }}</td>
                                <td>{{ $ibu_anak->jumlah }}</td>
                                <td>{{ $ibu_anak->tglbeli }}</td>
                                <td>{{ $ibu_anak->deskripsi }}</td>
                                <td>{{ $ibu_anak->berat }} g</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('admin.kategori.ibu_anak.edit', $ibu_anak->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <form action="{{ route('admin.kategori.ibu_anak.destroy', $ibu_anak->id) }}" method="POST">
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
