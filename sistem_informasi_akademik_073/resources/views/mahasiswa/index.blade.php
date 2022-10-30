@extends('layout')
@section('title','Mahasiswa')
@section('active3','active')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-10">
            <h3>Mahasiswa</h3>
            <p class="">Halaman ini menampilkan data <span style="color:red; ">Mahasiswa</span></p>
        </div>
        <div class="col-sm-2">
            <a class="btn btn-primary" style="background-color: darkred;" href="{{ route('mahasiswa.create')}}">Tambah</a>
        </div>
    </div> 

    <div class="row">
        <div class="col">
            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('message') }}</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
    </div>

    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">NPM</th>
            <th scope="col">Nama Lengkap</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Alamat</th>
            <th scope="col">Tempat, Tanggal Lahir</th>
            <th scope="col">Photo</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
          @foreach ($mahasiswa as $mahasiswa) 
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>
                    <img src="{{ asset('storage/'.$mahasiswa->photo) }}" width="100px" height="100px">
                </td>
                  <td>{{ $mahasiswa->nidn }}</td>
                  <td>{{ $mahasiswa->nama }}</td>
                  <td>{{ $mahasiswa->jenis_kelamin }}</td>
                  <td>{{ $mahasiswa->alamat }}</td>
                  <td>{{ $mahasiswa->tempat_lahir }} , {{ $mahasiswa->tanggal_lahir }}</td>
                  <td>
                      <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST">
                        <a class="btn btn-sm btn-success" href="{{ route('mahasiswa.edit', $mahasiswa->id) }}">Edit</a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                      </form>    
                  </td>
              </tr>
          @endforeach
      </table>

@endsection