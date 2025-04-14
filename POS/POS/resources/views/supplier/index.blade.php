@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <button onclick="modalAction('{{ url('/supplier/create_ajax') }}')" class="btn btn-success">Tambah Data Supplier</button>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <table class="table table-bordered table-striped table-hover table-sm" id="table_supplier">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Supplier</th>
                        <th>Nama Supplier</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
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
            var dataSupplier = $('#table_supplier').DataTable({
                serverSide: true,
                ajax: {
                    "url": "{{ url('supplier/list') }}", 
                    "dataType": "json",
                    "type": "POST",
                },
                columns: 
                [
                    {
                        data: "DT_RowIndex",
                        className: "text-center",
                        width: "5%",
                        orderable: false, 
                        searchable: false
                    }, {
                        data: "supplier_kode",  
                        className: "",
                        orderable: true,
                        searchable: true
                    }, {
                        data: "supplier_nama",
                        className: "", 
                        orderable: true, 
                        searchable: true
                    }, {
                        data: "supplier_telp",
                        className: "", 
                        orderable: true, 
                        searchable: true
                    }, {
                        data: "supplier_alamat",
                        className: "", 
                        orderable: true, 
                        searchable: true
                    }, {
                        data: "aksi",
                        className: "", 
                        orderable: false, 
                        searchable: false
                    }
                ]
            });
        });
    </script> 
@endpush