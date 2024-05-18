<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap">
    <link rel="stylesheet" href="../CSS/event_style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/fadd57a8f9.js" crossorigin="anonymous"></script>
    <title>Hasil pencarian</title>
</head>

<body>
    <!-- navbar section -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <img src="../ASSETS/logo.png" />
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/event">Catalog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/company">Company</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                </ul>

                @auth
                <!-- Jika pengguna telah terotentikasi, tampilkan foto profil -->
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="{{ auth()->user()->name }}" style="width: 40px; height: 40px; border-radius: 50%;">
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item" style="color:red">Logout<i class="fa-solid fa-arrow-right-from-bracket" style="color:red;margin-left:10px"></i></button>
                            </form>
                        </li>
                    </ul>
                </div>
                @else
                <!-- Jika pengguna belum terotentikasi, tampilkan tombol login -->
                <a class="btn btn-primary" href="{{ route('login') }}" style="width: 100px; background-color: #053CC9;">Login</a>
                @endauth
            </div>
        </div>
    </nav>



    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="title" style="margin-top: 70px; margin-bottom: 10px; font-weight: 700; font-size: 40px;">List Perusahaan</h1>
            <p style="margin-bottom: 40px;">Anda dapat mengajukan sponsor ke semua perusahaan dibawah ini!</p>
        </div>
        <div class="container d-flex justify-content-center">
            <div class="col-md-6 d-flex mb-4">
                <form id="search-form" class="d-flex w-100" action="{{ route('searchCompany') }}" method="GET">
                    <input type="text" class="form-control" id="search" name="search" placeholder="Masukan nama event">
                    <button class="btn btn-primary ml-2" type="submit" style="background-color: #053CC9;">Search</button>
                </form>
            </div>
        </div>
    </div>

    @if($searchResults->isEmpty())
    <p>No events found.</p>
    @else

    <div class="container">
        <div class="col-md-12 mb-4">
            <h1 style="text-align: left;font-weight : 600; font-size : 28px;">Semua perusahaan</h1>
            <hr style="border-top: 2px solid #737373;margin-bottom:30px">
        </div>
        <div class="row">
            @foreach($searchResults as $perusahaan)
            <div class="col-md-4 col-sm-12 mb-5">
                <div class="card h-100">
                    <img src="{{ asset('storage/' . $perusahaan->gambar_perusahaan) }}" class="card-img-top" alt="{{ $perusahaan->nama_perusahaan }}" style="height: 300px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ \Illuminate\Support\Str::limit($perusahaan->nama_perusahaan, 35) }}</h5>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($perusahaan->alamat_perusahaan, 70) }}</p>
                        <a href="#" class="btn btn-primary">Lihat detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif



    <footer>

        <div class="row justify-content-center" style="background-color: #000033;">
            <div class="col-md-3 m-4 align-content-center mx-auto">
                <img src="../ASSETS/Logo_white.png" alt="Sponsor Event" style="width: 250px; height : 80px;">
                <p style="color: white; margin-top:20px;">Katalog event bagi mahasiswa
                    Telkom University <br>Surabaya dengan
                    penyedia layanan <br>pecarian sponsorship untuk acara.</p>
            </div>

            <div class="col-md-4 m-5  align-content-center" style="color: white;">
                <h2 style="margin-bottom: 20px;">Contact Info</h2>

                <p> <i class="fa-solid fa-location-dot" style="color: #ffffff; margin-right : 10px;"></i>Jl. Ketintang No.156, Ketintang, <br>Kec. Gayungan, Surabaya, Jawa Timur 60231</p>
                <p> <i class="fa-solid fa-phone" style="color: #ffffff;margin-right : 10px;"></i>(330)7891-5568</p>
                <p> <i class="fa-solid fa-envelope" style="color: #ffffff; margin-right : 10px;"></i>sponsorevent@gmail.com</p>
            </div>
        </div>
    </footer>
</body>

</html>