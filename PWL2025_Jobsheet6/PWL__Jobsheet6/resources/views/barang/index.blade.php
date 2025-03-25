@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Barang</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('barang/create') }}">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <table class="table table-bordered table-striped table-hover table-sm" id="table_barang">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Tanggal Dibuat</th>
                        <th>Tanggal Diperbarui</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data- backdrop="static" data-keyboard="false" data-width="75%" aria-hidden="true"></div>
        @endsection

@push('css') 
@endpush

@push('js')
    <script>
          <script>
        function modalAction(url = ''){
            $('#myModal').load(url,function(){
                $('#myModal').modal('show');
            });
        }
        $(document).ready(function() {
            var dataBarang = $('#table_barang').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('barang/list') }}", 
                    type: "POST",
                    data: function (d) {
                        d._token = "{{ csrf_token() }}"; // Tambahkan CSRF token
                    }
                },
                columns: [
                    {
                        data: "barang_id",
                        className: "text-center",
                        orderable: true, 
                        searchable: true
                    },
                    {
                        data: "nama_barang",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "harga",
                        className: "text-right",
                        orderable: true,
                        searchable: false,
                        render: $.fn.dataTable.render.number(',', '.', 0, 'Rp ')
                    },
                    {
                        data: "stok",
                        className: "text-center",
                        orderable: true,
                        searchable: false
                    },
                    {
                        data: "created_at",
                        className: "text-center",
                        orderable: true,
                        searchable: false,
                        render: function(data) {
                            return new Date(data).toLocaleDateString('id-ID');
                        }
                    },
                    {
                        data: "updated_at",
                        className: "text-center",
                        orderable: true,
                        searchable: false,
                        render: function(data) {
                            return new Date(data).toLocaleDateString('id-ID');
                        }
                    },
                    {
                        data: "aksi",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script> 
@endpush
