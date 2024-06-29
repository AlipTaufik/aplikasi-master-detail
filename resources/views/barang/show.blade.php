@extends('layouts.default')
@section('content')
<!--start breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Master Data</div>
        <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0 align-items-center">
            
            <li class="breadcrumb-item active" aria-current="page">Delete Data</li>
            </ol>
        </nav>
        </div>
        
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-header">
            <h6 class="mb-0">Delete Barang</h6>
        </div>
        <div class="card-body">
            @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('barang.destroy',$barang->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            
                <div class="mb-3">
                    <label class="form-label">kode_barang:</label>
                    <input type="text" name="kode_barang" value="{{ $barang->kode_barang }}" class="form-control" 
                    placeholder="kode_barang" disabled="" readonly="">
                    @error('kode_barang')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">nama_barang:</label>
                    <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}" class="form-control" 
                    placeholder="nama_barang" disabled="" readonly="">
                    @error('nama_barang')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">harga:</label>
                    <input type="text" name="harga" value="{{ $barang->harga }}" class="form-control" 
                    placeholder="harga" disabled="" readonly="">
                    @error('harga')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">kategori:</label>
                    <input type="text" name="kategori" value="{{ $barang->kategori }}" class="form-control" 
                    placeholder="kategori" disabled="" readonly="">
                    @error('kategori')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-danger ml-3">Delete</button>
                </div>
            </form>
        </div>
    </div>
@endsection