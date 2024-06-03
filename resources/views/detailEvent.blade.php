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
    <link rel="icon" href="{{asset('ASSETS/icon/logo.png')}}" type="image/png">
    <style>
        .event-img {
            width: 100%;
            height: 600px;
            border-radius: 30px;
            object-fit:contain;
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
            font-size: 26px;
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


        .user-photo {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .user-name {
            margin-bottom: 0;
        }
    </style>
</head>

<body>
    <!-- navbar section -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
        <img src="{{asset('ASSETS/Logo.png')}}" style=" width: 180px;height: 40px;" />
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/services">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/event">Katalog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/company">Mitra</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">Tentang</a>
                    </li>
                </ul>

                @auth
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
                <a class="btn btn-primary" href="{{ route('login') }}" style="width: 100px; background-color: #053CC9;">Login</a>
                @endauth
            </div>
        </div>
    </nav>




    <section id="Detail events" style="margin-top:50px">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    
                    <div class="col-md-12 text-center mb-5">
                        <img src="{{ asset('storage/' . $detail->gambar_acara) }}" alt="{{ $detail->nama_acara }}" class="event-img mb-2">
                    </div>
                    <div class="row justify-content-between align-items-center mb-5">
                        <div class="col-auto">
                            <h1 style="font-weight: 600; font-size: 30px;">{{$detail->nama_acara}}</h1>
                        </div>
                        <div class="col-auto" style="margin-bottom:0px;align-items:center">
                            <p style="color: #E2E2E2; font-weight:500;font-size:18px;width: 100%;padding:7px ;background-color: rgba(76, 76, 76, 0.7); text-align: center; border: solid none rgba(76, 76, 76, 0.2); border-radius: 10px">
                                {{ $detail->categories->kategori }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-4">
                    <div class="row justify-content-between align-items-center">

                        <div class="col-auto" style="display:flex;align-items: center;">
                            <img src="{{ asset('storage/' . $detail->user->photo) }}" alt="{{ $detail->user->name }}" class="user-photo">
                            <p class="user-name" style="font-weight:600">{{ $detail->user->name }}</p>
                            <span class="vertical-divider"></span>
                            <i class="fa-solid fa-clock-rotate-left" style="color:#939393;margin-right:10px"></i> <p class="card-text" style="color:#939393; font-size: 16px;">{{ $detail->time_ago }}</p> 
                        </div>
                        <div class="col-auto">
                            @if(auth()->check() && auth()->user()->id === $detail->id_user)
                                <a href="{{ route('editEvent', $detail->id) }}"><i class="fa-solid fa-pen-to-square" style="color:#939393;font-size:20px"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-5">
                    <p class="event-description" style="color:#0A0A0A">{{$detail->deskripsi}}</p>
                </div>
                <div class="col-md-12 mb-5">
                    <h1>Benefit</h1>
                    <p class="event-syarat_ketentuan" style="color:#0A0A0A">{{$detail->syarat_ketentuan}}</p>
                </div>
            </div>
        </div>
        </div>
    </section>
</body>







<footer style="background-color: #000033;">
    <div class="container p-4">
      <div class="row mt-4 m-3 justify-content-center">
        <hr style="border-top: 4px solid #FFFFFF !important;margin-bottom:20px">
        <div class="col-md-3 align-content-center ">
          <img src="/ASSETS/Logo_white.png" alt="Sponsor Event" style="width: 250px; height : 80px;">
          <p style="color: white; margin-top:20px;">Katalog event bagi mahasiswa
            Telkom University <br>Surabaya dengan
            penyedia layanan <br>pecarian sponsorship untuk acara.</p>
        </div>
        <div class="col-md-2 align-content-center" style="color: white;">
          <P><a href="/home" style="text-decoration: none; "><small class="text-body-secondary" style="color:#2959D3 !important;font-size:16px">Beranda</small></a></P>
          <P><a href="/services" style="text-decoration: none; "><small class="text-body-secondary" style="color:#ffffff !important;font-size:16px">Layanan Kami</small></a></p>
          <P><a href="/event" style="text-decoration: none; "><small class="text-body-secondary" style="color:#ffffff !important;font-size:16px">Event Berlangsung</small></a></p>
          <P><a href="/home#review-section" style="text-decoration: none; "><small class="text-body-secondary" style="color:#ffffff !important;font-size:16px">Testimoni</small></a></p>
        </div>
        <div class="col-md-2 align-content-center">
          <p><a href="/about" style="text-decoration: none;"><small class="text-body-secondary" style="color:#2959D3 !important; font-size:16px;">Tentang kami</small></a></p>
          <p><a href="/about#latar_belakang" style="text-decoration: none;"><small class="text-body-secondary" style="color:#ffffff !important; font-size:16px;">Latar Belakang</small></a></p>
          <p><a href="#" style="text-decoration: none;"><small class="text-body-secondary" style="color:#000033 !important; font-size:16px;">___</small></a></p>
          <p><a href="#" style="text-decoration: none;"><small class="text-body-secondary" style="color:#000033 !important; font-size:16px;">___</small></a></p>
        </div>
        <div class="col-md-2 align-content-center">
          <p><a href="/services" style="text-decoration: none;"><small class="text-body-secondary" style="color:#2959D3 !important; font-size:16px;">Layanan Kami</small></a></p>
          <p><a href="/home#HowtoSponsor" style="text-decoration: none;"><small class="text-body-secondary" style="color:#ffffff !important; font-size:16px;">Pengajuan Sponsorship</small></a></p>
          <p><a href="/home#HowtoEvent" style="text-decoration: none;"><small class="text-body-secondary" style="color:#ffffff !important; font-size:16px;">Promosi Acara</small></a></p>
          <p><a href="#" style="text-decoration: none;"><small class="text-body-secondary" style="color:#000033 !important; font-size:16px;color:#000033">___</small></a></p>
        </div>

        <div class="col-md-3 align-content-center" style="color: white;">
          <p><a href="#" style="text-decoration: none;"><small class="text-body-secondary" style="color:#2959D3 !important; font-size:16px;">Info kontak</small></a></p>
          <p><i class="fa-solid fa-phone" style="color: #ffffff;margin-right : 10px;"></i><a href="#" style="text-decoration: none;"><small class="text-body-secondary" style="color:#ffffff !important; font-size:16px;">: 081359563203</small></a></p>
          <p><i class="fa-solid fa-location-dot" style="color: #ffffff; margin-right : 10px;"></i><a href="#" style="text-decoration: none;"><small class="text-body-secondary" style="color:#ffffff !important; font-size:16px;">: Jalan Ketintang No.156, Ketintang, Kec.Gayungan, Surabaya, Jawa Timur 60231</small></a></p>
        </div>
      </div>
    </div>

    <div class="row p-3 justify-content-center" style="background-color:#ffffff">
      <div class="col-md-12 align-content-end" style="background-color:#ffffff">
        <p style="color:#5E6E89 !important;margin-left:80px;font-weight:600">©SponsorEvent All Rights Reserved.</p>
      </div>
    </div>

  </footer>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</script>

</html>