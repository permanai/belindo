@extends('layouts.app')

@section('title', 'Edit Data kategori')

@section('content')
    <div class="container">
        <h4 class="fw-bold py-3 mb-4">Edit Data kategori</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
        
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <input type="text" class="form-control" id="kategori" name="kategori"
                                    value="{{ old('kategori', $kategori->kategori) }}" required>
                            </div>
                            <div class="d-flex justify-content-end mt-2">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                                <a href="{{ route('admin.kategori.index') }}" class="btn btn-danger ms-3">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
