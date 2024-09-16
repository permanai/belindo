@extends('layouts.app')

@section('title', 'Tambah Data kategori')

@section('content')
    <div class="container"> 
        <h4 class="fw-bold py-3 mb-4">Tambah Data Kategori</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('admin.kategori.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div id="notification" class="alert" style="display:none;"></div>
                            
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <input type="text" class="form-control" id="kategori" name="kategori" value="{{ old('kategori') }}" required>
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
    <script>
        @if ($errors->any())
            // Menampilkan pesan kesalahan validasi
            var errorHTML = "<ul>";
            @foreach ($errors->all() as $error)
                errorHTML += "<li>{{ $error }}</li>";
            @endforeach
            errorHTML += "</ul>";
            document.getElementById('notification').innerHTML = errorHTML;
            document.getElementById('notification').classList.add('alert-danger');
            document.getElementById('notification').style.display = 'block';
        @endif
    
        @if (session('success'))
            // Menampilkan pesan sukses
            document.getElementById('notification').innerHTML = "{{ session('success') }}";
            document.getElementById('notification').classList.add('alert-success');
            document.getElementById('notification').style.display = 'block';
        @endif
    </script>
    
@endsection
