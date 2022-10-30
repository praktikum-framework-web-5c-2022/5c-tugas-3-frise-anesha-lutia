@extends('layout')
@section('title','Edit Dosen')
@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col-lg-12">
            <h3 style="text-align: center">Edit Mahasiswa</h3>
            <div class="row justify-content-center">
                <div class="col-lg-6 mt-3">
                    <form method="post" action="{{ route('mahasiswa.update',$mahasiswa->id)}}" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="npm" placeholder="20106311700XX" value="{{ old('npm') ?? $mahasiswa->npm }}">
                            <label for="floatingInput">NPM</label>
                            @error('npm')
                            <p style="color: red">{{ $message }}</p> 
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="nama" placeholder="Nama Lengkap" value="{{ old('nama') ?? $mahasiswa->nama}}" >
                            <label for="floatingInput">Nama</label>
                            @error('nama')
                            <p style="color: red">{{ $message }}</p> 
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" name="jenis_kelamin" aria-label="Floating label select example">
                                <option {{ old('jenis_kelamin') ?? $mahasiswa->jenis_kelamin == 'laki-laki' ? 'selected' : '' }} value="laki-laki">Laki-laki</option>
                                <option {{ old('jenis_kelamin') ?? $mahasiswa->jenis_kelamin == 'perempuan' ? 'selected' : '' }} value="perempuan">Perempuan</option>
    
                            </select>
                            <label for="floatingSelect">Jenis Kelamin</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="alamat" placeholder="Alamat Lengkap" id="floatingInput" style="height: 100px" value="{{ old('alamat') ?? $mahasiswa->alamat }}">
                            <label for="floatingInput">Alamat</label>
                            @error('alamat')
                            <p style="color: red">{{ $message }}</p> 
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="tempat_lahir" placeholder="" value="{{ old('tempat_lahir') ?? $mahasiswa->tempat_lahir}}">
                            <label for="floatingInput">Tempat Lahir</label>
                            @error('tempat_lahir')
                            <p style="color: red">{{ $message }}</p> 
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="startDate" name="tanggal_lahir" placeholder="" value="{{ old('tanggal_lahir') ?? $mahasiswa->tanggal_lahir}}">
                            <label for="startDate">Tanggal Lahir</label>    
                            @error('tanggal_lahir')
                            <p style="color: red">{{ $message }}</p> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <img src="{{ asset('storage/'.$mahasiswa->photo) }}" width="291px" height="400px" alt="{{ $mahasiswa->nama }}" class="mt-1">
                            </div>
                            <div class="row">
                                <label for="formFile" class="form-label">Ubah Foto</label>
                                <input class="form-control" type="file" name="photo" id="formFile">
                            </div>
                            @error('photo')
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