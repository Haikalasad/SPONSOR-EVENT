<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap">
  <link rel="stylesheet" href="CSS/services_style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/fadd57a8f9.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <title>Event</title>

  <style>
    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.6);
      border-radius: 30px;
      /* Warna gelap dengan transparansi */
    }

    .overlay-content {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      border-radius: 30px;
      padding: 20px;
      color: white;

    }

    .user-info {
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

    .card-img-top {
      height: 380px;
      object-fit: cover;
      border: none;
    }
  </style>
</head>

<body>
  <!-- navbar section -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <img src="ASSETS/logo.png" style=" width: 180px;height: 40px;"/>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link"  href="/home">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/services">Layanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="">Katalog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/company">Mitra</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/about">Tentang</a>
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

  <div class="row" data-aos="fade-up">
    <div class="col-md-12 text-center">
      <h1 class="title" style="margin-top: 70px; margin-bottom: 10px; font-weight: 700; font-size: 40px;">List Event</h1>
      <p style="margin-bottom: 40px;">Tunggu update kami lainnya!</p>
    </div>
    <div class="container d-flex justify-content-center">
      <div class="col-md-6 d-flex mb-4">
        <form id="search-form" class="d-flex w-100" action="{{ route('searchEvent') }}" method="GET">
          <input type="text" class="form-control" id="search" name="search" placeholder="Masukan nama event">
          <button class="btn btn-primary ml-2" type="submit" style="background-color: #053CC9;margin-left:20px;font-weight:500;">Search</button>
        </form>
      </div>
    </div>
  </div>

  <section id="New events" data-aos="fade-up">
    <div class="container mt-5">
      <div class="col-md-12 mb-4">
        <div class="container">
          <div class="row justify-content-between align-items-center">
            <div class="col-auto">
              <h1 style="font-weight: 600; font-size: 28px;">Event terbaru</h1>
            </div>
            <div class="col-auto">
              <a class="btn btn-primary" href="/uploadEvent" style="background-color: #053CC9;">Upload Event</a>
            </div>
          </div>
          <hr style="border-top: 2px solid #737373; margin-bottom: 30px;">
        </div>
      </div>



      <div class="row" data-aos="fade-up">
        @foreach ($newEvents as $event)
        <div class="col-md-6 mb-4">
          <div class="card h-100 position-relative"  style="border-radius: 30px;">
            <a class="stretched-link" href="{{ route('detailEvent', ['id' => $event->id]) }}"></a>
            <img src="{{ asset('storage/' . $event->gambar_acara) }}" class="card-img-top" alt="{{ $event->nama_acara }}" style="border-radius:30px">
            <div class="overlay"></div>
            <div class="card-body overlay-content">
              <p class="card-text" style="color: #E2E2E2; font-weight:500;font-size:14px;width: 150px; background-color: rgba(76, 76, 76, 0.7); text-align: center; border: solid 1px rgba(76, 76, 76, 0.7); border-radius: 20px">
                {{ $event->categories->kategori }}
              </p>
              <h3 class="card-title">{{ $event->nama_acara }}</h3>
              <p class="card-text" style="color:#E2E2E2">{{ \Illuminate\Support\Str::limit($event->deskripsi, 150) }}</p>
              <div class="user-info">
                <img src="{{ asset('storage/' . $event->user->photo) }}" alt="{{ $event->user->name }}" class="user-photo">
                <p class="user-name" style="font-weight:600">{{ $event->user->name }}</p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>



  <section id="All events" style="margin-top:50px">
    <div class="container">
      <div class="col-md-12 mb-4">
        <h1 style="text-align: left;font-weight : 600; font-size : 28px;">Semua event</h1>
        <hr style="border-top: 2px solid #737373;margin-bottom:30px">
      </div>

      <div class="row">

        @foreach ($events as $event)
        <div class="col-md-4 col-sm-12 mb-5">
          <div class="card h-100"  style="border-radius: 30px;">
            <img src="{{ asset('storage/' . $event->gambar_acara) }}" class="card-img-top" alt="{{ $event->nama_acara }}" style="height: 300px; object-fit: cover;">
            <div class="card-body">
            <p class="card-text" style="color: #E2E2E2; width: 150px; background-color: rgba(76, 76, 76, 0.6); text-align: center; border: solid 1px rgba(76, 76, 76, 0.1); border-radius: 10px">
                {{ $event->categories->kategori }}
              </p>
              <h5 class="card-title">{{ \Illuminate\Support\Str::limit($event->nama_acara, 35) }}</h5>
              
              <p class="card-text">{{ \Illuminate\Support\Str::limit($event->deskripsi, 70) }}</p>
              <div style="display: flex; align-items: center;margin-bottom:20px">
                <img src="{{ asset('storage/' . $event->user->photo) }}" alt="{{ $event->user->name }}" style="width: 40px; height: 40px; border-radius: 50%; margin-right: 10px;">
                <p style="color:#737373;margin-bottom:0">{{ $event->user->name }}</p>
              </div>
            </div>
            <a class="btn btn-primary" href="{{ route('detailEvent', ['id' => $event->id]) }}">Lihat Detail</a>

          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>


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



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
  $(document).ready(function() {
    $('#search-form').on('submit', function(e) {
      e.preventDefault();

      var query = $('#search').val();

      $.ajax({
        url: "{{ route('searchEvent') }}",
        type: 'GET',
        data: {
          search: query
        },
        success: function(data) {
          $('#search-results').html(data);
        },
        error: function() {
          alert('An error occurred. Please try again.');
        }
      });
    });
  });
</script>


<script>
  AOS.init({
    duration: 1500, 
    once: true, 
  });
</script>

</html>