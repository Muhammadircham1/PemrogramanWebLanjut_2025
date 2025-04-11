@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('stok/create') }}">Tambah</a>
                <button onclick="modalAction('{{ url('/stok/import') }}')" class="btn btn-info">Import Barang</button>
                <a href="{{ url('/stok/export_excel') }}" class="btn btn-primary"><i class="fa fa-file-excel"></i>Export stok</a>
                <a href="{{ url('/stok/export_pdf') }}" class="btn btn-warning"><i class="fa fa-file-pdf"></i> Export stok</a>
                <button onclick="modalAction('{{ url('/stok/create_ajax') }}')" class="btn btn-sm btn-success mt-1">Tambah Ajax</button>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <table class="table table-bordered table-striped table-hover table-sm" id="table_stok">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" data-width="75%" aria-hidden="true"></div> 
@endsection

@push('css') 
@endpush

@push('js')
    <script>
        function modalAction(url = ''){
            $('#myModal').load(url,function(){
                $('#myModal').modal('show');
            });
        }

        $(document).ready(function() {
            var dataStok = $('#table_stok').DataTable({
                serverSide: true,
                ajax: {
                    "url": "{{ url('stok/list') }}", 
                    "dataType": "json",
                    "type": "POST",
                    "data": function (d) {
                        d._token = "{{ csrf_token() }}"; // Tambahkan CSRF token
                    }
                },
                columns: [
                    {
                        data: "stok_id",
                        className: "text-center",
                        orderable: true, 
                        searchable: false
                    },
                    {
                        data: "barang.nama_barang", // Mengambil nama barang dari relasi
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "jumlah",
                        orderable: true,
                        searchable: false
                    },
                    {
                        data: "keterangan",
                        orderable: false,
                        searchable: true
                    },
                    {
                        data: "created_at",
                        orderable: true,
                        searchable: false
                    },
                    {
                        data: "updated_at",
                        orderable: true,
                        searchable: false
                    },
                    {
                        data: "aksi",
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script> 
@endpush
