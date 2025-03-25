@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body"> 
            @if(empty($stok))
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> 
                    Data yang Anda cari tidak ditemukan.
                </div>
                <a href="{{ url('stok') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
            @else
                <form method="POST" action="{{ url('/stok/'.$stok->stok_id) }}" class="form-horizontal">
                    @csrf
                    {!! method_field('PUT') !!} <!-- Method PUT untuk edit -->
                    
                    <div class="form-group row">
                        <label class="col-2 control-label col-form-label">Barang</label>
                        <div class="col-10">
                            <select class="form-control" id="barang_id" name="barang_id" required>
                                <option value="">- Pilih Barang -</option> 
                                @foreach($barang as $item)
                                    <option value="{{ $item->barang_id }}" 
                                        @if($item->barang_id == $stok->barang_id) selected @endif>
                                        {{ $item->barang_nama }}
                                    </option>
                                @endforeach
                            </select> 
                            @error('barang_id')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 control-label col-form-label">Jumlah Stok</label>
                        <div class="col-10">
                            <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ old('jumlah', $stok->jumlah) }}" required min="1">
                            @error('jumlah')
                                <small class="form-text text-danger">{{ $message }}</small> 
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 control-label col-form-label">Keterangan</label>
                        <div class="col-10">
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ old('keterangan', $stok->keterangan) }}</textarea>
                            @error('keterangan')
                                <small class="form-text text-danger">{{ $message }}</small> 
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 control-label col-form-label"></label>
                        <div class="col-10">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            <a class="btn btn-sm btn-default ml-1" href="{{ url('stok') }}">Kembali</a>
                        </div>
                    </div>
                </form> 
            @endif
        </div>
    </div> 
@endsection

@push('css') 
@endpush

@push('js') 
@endpush
