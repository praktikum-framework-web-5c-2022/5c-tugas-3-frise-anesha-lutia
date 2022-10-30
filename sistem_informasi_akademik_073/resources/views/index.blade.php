@extends('layout')
@section('title','Dashboard')
@section('active1','active')
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-9">
                  <br>
                    <h3 class="mt-3">Dashboard</h3>
                    <p class="">Halaman ini menampilkan statistik <span style="color:red; ">SIAKAD</span></p>
                </div> 
            </div>
            <div class="kartu col-lg-3">
                <div class="card">
                  <div class="card-header">
                    Dosen
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Jumlah Dosen</h5>
                    <p class="card-text">{{ $dosen }} Dosen</p>
                    <a href="{{ route('dosen.index')}}" class="btn btn-primary">Lihat Data</a>
                  </div>
                </div>
              </div>
            <div class="kartu col-lg-3">
              <div class="card">
                <div class="card-header">
                Mahasiswa
                </div>
                <div class="card-body">
                  <h5 class="card-title">Jumlah Mahasiswa</h5>
                  <p class="card-text">{{ $mahasiswa }} Mahasiswa</p>
                  <a href="{{ route('mahasiswa.index')}}" class="btn btn-primary">Lihat Data</a>
                </div>
              </div>
            </div>
            <div class="kartu col-lg-3">
              <div class="card">
                <div class="card-header">
                  Matakuliah
                </div>
                <div class="card-body">
                  <h5 class="card-title">Jumlah Matakuliah</h5>
                  <p class="card-text">{{ $matakuliah }} Matakuliah</p>
                    <a href="{{ route('matakuliah.index')}}" class="btn btn-primary">Lihat Data</a>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection