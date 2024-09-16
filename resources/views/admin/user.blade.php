@extends('layouts.app')
@section('title', 'Data Customers')
@section('content')
    <div class="card">
        <h5 class="card-header">Data Customers</h5>
        <div class="d-flex justify-content-start ms-4">
           
        </div>
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Id Customer</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telp</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($customers as $customer)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $customer->id_user }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->telp }}</td>
                            <td>{{ $customer->alamat }}</td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ url('https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css') }}">
@endpush

@push('addon-script')
    <script src="{{ url('https://code.jquery.com/jquery-3.5.1.js') }}"></script>
    <script src="{{ url('https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js') }}"></script>
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
