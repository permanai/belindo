@extends('layouts.app')
@section('title', 'kategori')
@section('content')
    <div class="card">
        <h5 class="card-header">Data kategori</h5>
        <div class="d-flex justify-content-start ms-4">
            <a href="{{ route('admin.kategori.create') }}" class="btn btn-primary">Tambah Data</a>
        </div>
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @isset($kategoris)
                        @foreach ($kategoris as $kategori)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                
                                <td>{{ $kategori->kategori }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('admin.kategori.edit', $kategori->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <form action="{{ route('admin.kategori.destroy', $kategori->id) }}" method="POST">
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
                    @endisset
                </tbody>
            </table>
        </div>
    </div>
@endsection
