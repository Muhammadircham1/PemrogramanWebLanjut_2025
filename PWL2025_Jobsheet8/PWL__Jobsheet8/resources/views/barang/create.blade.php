@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Barang</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('barang') }}" class="form-horizontal"> 
                @csrf
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Nama Barang</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ old('nama_barang') }}" required>
                        @error('nama_barang')
                            <small class="form-text text-danger">{{ $message }}</small> 
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Harga</label>
                    <div class="col-11">
                        <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga') }}" required>
                        @error('harga')
                            <small class="form-text text-danger">{{ $message }}</small> 
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Stok</label>
                    <div class="col-11">
                        <input type="number" class="form-control" id="stok" name="stok" value="{{ old('stok') }}" required>
                        @error('stok')
                            <small class="form-text text-danger">{{ $message }}</small> 
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label"></label>
                    <div class="col-11">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('barang') }}">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div> 
@endsection 

@push('css') 
@endpush 

@push('js') 
@endpush
