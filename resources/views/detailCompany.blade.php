<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap">
    <link rel="stylesheet" href="../CSS/services_style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/fadd57a8f9.js" crossorigin="anonymous"></script>
    <title>Detail Event</title>
    <style>
       .event-img {
            width: 100%;
            max-height: 500px; 
            object-fit: cover;
            border-radius: 30px;
            margin-bottom: 50px;
        }
        .vertical-divider {
            display: inline-block;
            width: 1px;
            background-color: black;
            height: 20px;
            margin: 0 10px;
        }

        .event-category {
            background-color: rgba(76, 76, 76, 0.7);
            color: #E2E2E2;
            padding: 5px 10px;
            border-radius: 20px;
            font-weight: 500;
            display: inline-block;
        }

        .event-title {
            font-weight: 700;
            font-size: 28px;
            margin-top: 10px;
        }

        .event-description {
            margin-top: 20px;
            white-space: pre-line;
        }

        .event-syarat_ketentuan {
            margin-top: 20px;
            white-space: pre-line;
        }

        .company-info {
            display: flex;
            align-items: center;
        }

        .user-photo {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .user-name {
            margin-bottom: 0;
        }
        .card-text{
            margin-bottom: 0;
        }
    </style>
</head>

<body>
    <!-- navbar section -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <img src="../ASSETS/logo.png" style=" width: 180px;height: 40px;" />
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/catalog">Catalog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/company">Company</a>
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



    <section id="Detail company" style="margin-top:50px">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12 mb-4">

                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <h1 style="font-weight: 600; font-size: 40px;">{{$detail->nama_perusahaan}}</h1>
                        </div>
                    </div>
                <div class="col-md-12 text-center">
                    <img src="{{ asset('storage/' . $detail->gambar_perusahaan) }}" alt="{{ $detail->nama_perusahaan }}" class="event-img mb-4">
                </div>
                </div>
                <div class="col-md-12 mb-4">
                    <div class="company-info">
                        <i class="fa-solid fa-location-dot" style="color:#939393;margin-right:10px"></i> <p class="card-text" style="font-weight:600">{{ $detail->alamat_perusahaan }}</p>
                        <span class="vertical-divider"></span>
                        <i class="fa-solid fa-envelope"style="color:#939393;margin-right:10px"></i> <p class="card-text" style="font-weight:600">{{ $detail->email }}</p> 
                        <span class="vertical-divider"></span>
                        <i class="fa-solid fa-phone" style="color:#939393;margin-right:10px"></i><p class="card-text" style="font-weight:600">{{ $detail->contact_person }}</p>
                    </div>
                </div>
                <div class="col-md-12 mb-5">
                    <p class="event-description" style="color:#0A0A0A">{{$detail->deskripsi_perusahaan}}</p>
                </div>
                <div class="col-md-12 mb-5">
                    <h1>Syarat dan ketentuan</h1>
                    <p class="event-syarat_ketentuan" style="color:#0A0A0A">{{$detail->syarat_ketentuan}}</p>
                </div>
              <a class="btn btn-primary" href="{{ route('formSponsor', ['id' => $detail->id]) }}" style="margin-bottom:90px">Ajukan sponsor</a>

            </div>

        </div>
        </div>
    </section>
</body>


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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</script>

</html>