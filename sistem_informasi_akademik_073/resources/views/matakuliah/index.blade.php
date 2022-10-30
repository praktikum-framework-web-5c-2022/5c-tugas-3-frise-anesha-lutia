@extends('layout')
@section('title','Matakuliah')
@section('active4','active')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-10">
            <h3>Mata Kuliah</h3>
            <p class="">Halaman ini menampilkan data <span style="color:red; ">Mata Kuliah</span></p>
        </div>
        <div class="col-sm-2">
            <a class="btn btn-primary" style="background-color: darkred;" href="{{ route('matakuliah.create')}}">Tambah</a>
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
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode Mata Kuliah</th>
                        <th scope="col">Nama Mata Kuliah</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                      @foreach ($matakuliah as $matakuliah) 
                          <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                              <td>{{ $matakuliah->kode_mk }}</td>
                              <td>{{ $matakuliah->nama_mk }}</td>
                              <td>
                                  <form action="{{route('matakuliah.destroy', $matakuliah->id) }}" method="POST">
                                    <a href="{{route('matakuliah.destroy',['matakuliah' => $matakuliah->id])}}"
                                    class="btn btn-sm btn-success">Edit</a>
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                  </form>    
                              </td>
                          </tr>
                      @endforeach
                  </table>
            </div>
        </div>
    </div>

@endsection