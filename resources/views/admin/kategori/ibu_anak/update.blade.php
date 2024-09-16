@extends('layouts.app')

@section('title', 'Edit Data ibu dan anak')

@section('content')
    <div class="container">
        <h4 class="fw-bold py-3 mb-4">Edit Data ibu dan anak</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('admin.kategori.ibu_anak.update', $ibu_anak->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="id_produk" class="form-label">Id Produk</label>
                                <input type="text" class="form-control @error('id_produk') is-invalid @enderror" id="id_produk" name="id_produk"
                                    value="{{ old('id_produk', $ibu_anak->id_produk) }}" required>
                                @error('id_produk')
                                <div class="invalid-feedback">Id Produk sudah ada. Silakan gunakan Id Produk yang berbeda.</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="{{ old('nama', $ibu_anak->nama) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="kategori_id" class="form-label">Kategori</label>
                                <select class="form-select" id="kategori_id" name="kategori_id" required>
                                    <option value="" selected disabled>Pilih Kategori</option>
                                    @foreach($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}" {{ $ibu_anak->kategori_id == $kategori->id ? 'selected' : '' }}>{{ $kategori->kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" class="form-control" id="foto" name="foto" accept="image/png, image/jpeg, image/jpg">
                                {{-- <img src="{{ asset($produk->foto) }}" alt="Foto Produk" class="mt-2" style="max-width: 200px;"> --}}
                            </div>
                            <div class="mb-3">
                                <label for="harga_retail" class="form-label">Harga Retail</label>
                                <input type="text" class="form-control currency" id="harga_retail" name="harga_retail"
                                    value="{{ old('harga_retail', $ibu_anak->harga_retail) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="harga_reseller" class="form-label">Harga Reseller</label>
                                <input type="text" class="form-control currency" id="harga_reseller" name="harga_reseller"
                                    value="{{ old('harga_reseller', $ibu_anak->harga_reseller) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah"
                                    value="{{ old('jumlah', $ibu_anak->jumlah) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="tglbeli" class="form-label">Tanggal Beli</label>
                                <input type="date" class="form-control" id="tglbeli" name="tglbeli"
                                    value="{{ old('tglbeli', $ibu_anak->tglbeli) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi', $ibu_anak->deskripsi) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="berat" class="form-label">Berat (gram)</label>
                                <input type="number" step="0.1" class="form-control" id="berat" name="berat" value="{{ old('berat', $ibu_anak->berat) }}" required>
                            </div>
                            <div class="d-flex justify-content-end mt-2">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                                <a href="{{ route('admin.kategori.ibu_anak.index') }}" class="btn btn-danger ms-3">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const formatNumber = (number) => {
                return number.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            };
        
            const unformatNumber = (number) => {
                return number.replace(/\./g, '');
            };
        
            document.querySelectorAll('.currency').forEach(function (element) {
                element.addEventListener('input', function (e) {
                    let value = unformatNumber(e.target.value);
                    if (!isNaN(value) && value.length > 0) {
                        e.target.value = formatNumber(value);
                    } else {
                        e.target.value = '';
                    }
                });
            });
        
            document.querySelector('form').addEventListener('submit', function (e) {
                document.querySelectorAll('.currency').forEach(function (element) {
                    element.value = unformatNumber(element.value);
                });
            });
        });
        </script>
@endsection
