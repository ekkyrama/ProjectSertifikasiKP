@extends('adminlte::page')

@section('title', 'Edit Data')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Data</h1>
@stop

@section('content')
    <form action="{{route('analogs.update', $analogs)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputName">Nama Film</label>
                        <input type="text" class="form-control @error('nama_film') is-invalid @enderror" id="exampleInputName" placeholder="Nama Film" name="nama_film" value="{{old('nama_film')}}">
                        @error('nama_film') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputKet">Keterangan Cuci</label>
                        <input type="text" class="form-control @error('keterangan_cuci') is-invalid @enderror" id="exampleInputKet" placeholder="Masukkan Keterangan Cuci" name="keterangan_cuci" value="{{old('keterangan_cuci')}}">
                        @error('keterangan_cuci') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTotal">Total Harga</label>
                        <input type="text" class="form-control @error('total_harga') is-invalid @enderror" id="exampleInputTotal" placeholder="Total Harga" name="total_harga" value="{{old('total_harga')}}">
                        @error('total_harga') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputLink">Link Album</label>
                        <input type="text" class="form-control @error('link_album') is-invalid @enderror" id="exampleInputLink" placeholder="Link Album Film" name="link_album" value="{{old('link_album')}}">
                        @error('link_album') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('analogs.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
