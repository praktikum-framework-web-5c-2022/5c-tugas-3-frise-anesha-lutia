@extends('layout')
@section('title','Edit Matakuliah')
@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col-lg-12">
            <h3 style="text-align: center">Edit Matakuliah</h3>
            <div class="row justify-content-center">
                <div class="col-lg-6 mt-3">
                    <form method="post" action="{{ route('matakuliah.update',$matakuliah->id)}}" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="kode_mk" placeholder="FM01" value="{{ old('kode_mk') ?? $matakuliah->kode_mk }}">
                            <label for="floatingInput">Kode MK</label>
                            @error('kode_mk')
                            <p style="color: red">{{ $message }}</p> 
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="nama_mk" placeholder="Framework" value="{{ old('nama_mk') ?? $matakuliah->nama_mk }}">
                            <label for="floatingInput">Nama MK</label>
                            @error('nama_mk')
                            <p style="color: red">{{ $message }}</p> 
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mt-3 mb-3">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection