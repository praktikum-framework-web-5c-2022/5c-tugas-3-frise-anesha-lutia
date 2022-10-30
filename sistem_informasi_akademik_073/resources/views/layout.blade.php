<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-danger">
        <div class="container">
          <img src="/img/unsika.png" width="30px" height="30px" alt="unsika" class="img">
          <a class="navbar-brand" href="/">Sistem Informasi Akademik UNSIKA</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link @yield('active1')" aria-current="page" href="/">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link @yield('active2')" href="{{ route('dosen.index') }}">Dosen</a>
              </li>
              <li class="nav-item">
                <a class="nav-link @yield('active3')" href="{{ route('mahasiswa.index') }}">Mahasiswa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link @yield('active4')" href="{{ route('matakuliah.index') }}">Matakuliah</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      @yield('content')

      <script>
        let startDate = document.getElementById('startDate')
        let endDate = document.getElementById('endDate')
        startDate.addEventListener('change',(e)=>{
          let startDateVal = e.target.value
          document.getElementById('startDateSelected').innerText = startDateVal
        })
        endDate.addEventListener('change',(e)=>{
          let endDateVal = e.target.value
          document.getElementById('endDateSelected').innerText = endDateVal
        })  
      </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>