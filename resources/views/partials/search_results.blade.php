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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <title>Hasil pencarian</title>
    <link rel="icon" href="{{asset('ASSETS/icon/logo.png')}}" type="image/png">
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


  <div class="row" data-aos="fade-up">
    <div class="col-md-12 text-center">
      <h1 class="title" style="margin-top: 70px; margin-bottom: 10px; font-weight: 700; font-size: 40px;">List Event</h1>
      <p style="margin-bottom: 40px;">Tunggu update kami lainnya!</p>
    </div>
    <div class="container d-flex justify-content-center">
      <div class="col-md-6 d-flex mb-4">
        <form id="search-form" class="d-flex w-100" action="{{ route('searchEvent') }}" method="GET">
          <input type="text" class="form-control" id="search" name="search" placeholder="Masukan nama event">
          <button class="btn btn-primary ml-2" type="submit" style="background-color: #053CC9;">Search</button>
        </form>
      </div>
    </div>
  </div>
  
  @if($searchResults->isEmpty())
  <p>No events found.</p>
  @else
  <div class="container" data-aos="fade-up">
      <div class="row">
          @foreach($searchResults as $event)
          <div class="col-md-4 col-sm-12 mb-4">
                <div class="card h-100">
                  <img src="{{ asset('storage/' . $event->gambar_acara) }}" class="card-img-top" alt="{{ $event->nama_acara }}" style="height: 300px; object-fit: cover;">
                  <div class="card-body">
                    <h5 class="card-title">{{ \Illuminate\Support\Str::limit($event->nama_acara, 35) }}</h5>
                    <p class="card-text">{{ \Illuminate\Support\Str::limit($event->deskripsi, 70) }}</p>
                    <div style="display: flex; align-items: center;margin-bottom:20px">
                      <img src="{{ asset('storage/' . $event->user->photo) }}" alt="{{ $event->user->name }}" style="width: 40px; height: 40px; border-radius: 50%; margin-right: 10px;">
                      <p style="color:#737373;margin-bottom:0">{{ $event->user->name }}</p>
                    </div>
                    <a href="{{ route('detailEvent', ['id' => $event->id]) }}" class="btn btn-primary">Lihat detail</a>
                  </div>
                </div>
              </div>
          @endforeach
      </div>
  </div>
  @endif



</body>
<footer style="background-color: #000033;">
    <div class="container p-4">
      <div class="row mt-4 m-3 justify-content-center">
        <hr style="border-top: 4px solid #FFFFFF !important;margin-bottom:20px">
        <div class="col-md-3 align-content-center ">
          <img src="ASSETS/Logo_white.png" alt="Sponsor Event" style="width: 250px; height : 80px;">
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




<script>
  AOS.init({
    duration: 1500, 
    once: true, 
  });
</script>

</html>

