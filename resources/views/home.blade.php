<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap">
  <link rel="stylesheet" href="CSS/home_style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/fadd57a8f9.js" crossorigin="anonymous"></script>
</head>
</head>

<body>

  @php
  use App\Models\Event;
  $events = Event::orderBy('created_at', 'desc')->take(3)->get();
  @endphp

  <!-- navbar section -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <img src="ASSETS/logo.png" style=" width: 180px;height: 40px;" />
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/services">Layanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/event">Katalog</a>
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


  <!-- hero section -->

  <section id="hero-section">
    <div class="container">

      <div class="row justify-content-center mt-5">
        <div class="col-lg-6 p-0 col-md-3 mt-4 mb-5  align-content-center text-center text-lg-start ">
          <h1 class="hero-title">
          Cari Sponsor Acara dengan Lebih Lancar!
          </h1>
          <p class="hero-subTitle">
          Sekarang, Anda bisa lebih mudah menemukan sponsor acara. Platform kami telah menyederhanakan prosesnya, membuat Anda dapat dengan cepat terhubung dengan calon sponsor dan mengamankan kemitraan tanpa kesulitan.
          </p>
          <a class="btn btn-primary" href="{{ route('company') }}" style="width: 100px;height:40px; background-color: #053CC9;">Ayo cari</a>
        </div>
  
        <div class="col-lg-4 col-md-6 col-sm-12 justify-center">
          <img src="ASSETS/Gambar_hero.png" />
        </div>
      </div>

    </div>

    <img src="ASSETS/Hero_effect.png" class="effect" style="width:100vw" />
  </section>






  <!-- shortcut servcice section -->
  <section id="shortcut_service mt-5">
    <div class="container">
      <div class="row g-4 justify-content-center">
        <h1 style="text-align: center; margin-top : 70px;margin-bottom : 70px; font-weight : 700; font-size : 40px;">Layanan kami</h1>
        <div class="col-md-4">
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4 align-content-center p-5">
                <img src="ASSETS/icon/upload.png" alt="upload event">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h3 class="card-title" style="font-weight: 700;">Upload Event Ormawa dan UKM</h3>
                  <p class="card-text" style="font-size: 16px;">Unggah eventmu disini dan masuk dalam katalog!</p>
                  <p class="card-text"><a href="/event" style="text-decoration:none">Lihat detail</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
  
        <div class="col-md-4">
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4 align-content-center p-5">
                <img src="ASSETS/icon/katalog.png" alt="upload event">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h3 class="card-title" style="font-weight: 700;">Katalog Event Tel-U Surabaya</h3>
                  <p class="card-text" style="font-size: 16px;">Semua acara pada kampus Tel-U tersedia disini</p>
                  <p class="card-text"><a href="/event" style="text-decoration:none">Lihat detail</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row g-4 justify-content-center mt-2 ">
        <div class="col-md-4">
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4 align-content-center p-5">
                <img src="ASSETS/icon/pengajuan.png" alt="upload event">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h3 class="card-title" style="font-weight: 700;">Pengajuan Sponsor</h3>
                  <p class="card-text" style="font-size: 16px;">Sponsorship dengan perusahaan <br>mitra</p>
                  <p class="card-text"><a href="/company" style="text-decoration:none">Lihat detail</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4 align-content-center p-5">
                <img src="ASSETS/icon/event.png" alt="upload event">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h3 class="card-title" style="font-weight: 700;">Event Owner Dari Kami</h3>
                  <p class="card-text" style="font-size: 16px;">Upload eventmu sekaligus pengajuan sponsorship</p>
                  <p class="card-text"><a href="/event" style="text-decoration:none">Lihat detail</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section cara mendapatkan sponsor -->


  <section id="HowtoSponsor">
    <div class="row justify-content-center m-4 align-content-center">
      <div class="title">
        <h1 style="text-align: center; margin-top: 70px;margin-bottom: 10px; font-weight: 700; font-size: 40px;">Gimana sih cara untuk mengajukan sponsor? </h1>
        <p style="text-align: center; margin-bottom: 70px;color:#737373;">Pengajuan sponsor melewati kami,kami menyediakan list perusahaan yang dapat anda ajukan sponsor.Ikuti langkah-langkah<br>dibawah ini untuk melakukan pengajuan sponsor untuk kegiatan anda</p>
      </div>

      <div class="col-md-4 col-sm-12 m-4" style="width:340px">

        <img src="ASSETS/icon/mitra.png" class="card-img-top" alt="" style="height:110px;width: 110px;margin-bottom:40px;margin-top:40px">
        <h2 class="card-title" style="font-weight:700;margin-bottom:20px">Pilih menu mitra</h2>
        <p class="card-text" style="font-size:16px;margin-bottom:30px">Anda akan ditampilkan list mitra kemudian pilih salah satu mitra dan tekan button pengajuan </p>

        <i class="fa-solid fa-arrow-right" style="color:#053CC9;font-size:30px;margin-bottom:30px"></i>
      </div>

      <div class="col-md-4 col-sm-12 m-4" style="width:340px;background-color:#053CC9">

        <img src="ASSETS/icon/gForm.png" class="card-img-top" alt="" style="height:110px;width: 110px;margin-bottom:40px;margin-top:40px">
        <h2 class="card-title" style="font-weight:700;margin-bottom:20px;color:#ffffff">Isi form Pengajuan</h2>
        <p class="card-text" style="font-size:16px;margin-bottom:30px;color:#ffffff">Silahkan mengisi formulir pengajuan yang bertujuan agar kami dapat mengetahui detail dari kegiatan anda</p>

        <i class="fa-solid fa-arrow-right" style="color:#ffffff;font-size:30px;margin-bottom:30px"></i>
      </div>
      <div class="col-md-4 col-sm-12 m-4" style="width:340px">

        <img src="ASSETS/icon/submit.png" class="card-img-top" alt="" style="height:110px;width: 110px;margin-bottom:40px;margin-top:40px">
        <h2 class="card-title" style="font-weight:700;margin-bottom:20px">Submit form</h2>
        <p class="card-text" style="font-size:16px;margin-bottom:30px">Tekan submit kemudian kami akan berdiskusi dengan mitra terkait pengajuan sponsor yang anda ajukan</p>

        <i class="fa-solid fa-arrow-right" style="color:#053CC9;font-size:30px;margin-bottom:30px"></i>
      </div>
    </div>
    </div>
  </section>



  <section id="HowtoSponsor">
    <div class="row justify-content-center m-4 align-content-center">
      <div class="title">
        <h1 style="text-align: center; margin-top: 70px;margin-bottom: 10px; font-weight: 700; font-size: 40px;">Upload event caranya gimana?</h1>
        <p style="text-align: center; margin-bottom: 70px;color:#737373;">Ayo segera upload event mu disini agar dapat diketahui banyak orang.Ikuti langkah-langkah dibawah ini untuk melakukan<br> pendaftaran event yang ingin anda laksanakan</p>
      </div>
      <div class="col-md-4 col-sm-12 m-4" style="width:340px;background-color:#053CC9">

        <img src="ASSETS/icon/katalog_white.png" class="card-img-top" alt="" style="height:110px;width: 110px;margin-bottom:40px;margin-top:40px">
        <h2 class="card-title" style="font-weight:700;margin-bottom:20px;color:#ffffff">Pilih menu katalog</h2>
        <p class="card-text" style="font-size:16px;margin-bottom:30px;color:#ffffff">Anda akan ditampilkan list katalog event Tel-U,<br>kemudian tekan button event baru.</p>

        <i class="fa-solid fa-arrow-right" style="color:#ffffff;font-size:30px;margin-bottom:30px"></i>
      </div>

      <div class="col-md-4 col-sm-12 m-4" style="width:340px">

        <img src="ASSETS/icon/gForm.png" class="card-img-top" alt="" style="height:110px;width: 110px;margin-bottom:40px;margin-top:40px">
        <h2 class="card-title" style="font-weight:700;margin-bottom:20px">Isi formulir event</h2>
        <p class="card-text" style="font-size:16px;margin-bottom:30px">Silahkan mengisi formulir event yang ingin anda buat,dan buatlah informasi event yang menarik.</p>

        <i class="fa-solid fa-arrow-right" style="color:#053CC9;font-size:30px;margin-bottom:30px"></i>
      </div>

      <div class="col-md-4 col-sm-12 m-4" style="width:340px;background-color:#053CC9">

        <img src="ASSETS/icon/submit_white.png" class="card-img-top" alt="" style="height:110px;width: 110px;margin-bottom:40px;margin-top:40px">
        <h2 class="card-title" style="font-weight:700;margin-bottom:20px;color:#ffffff">Submit form</h2>
        <p class="card-text" style="font-size:16px;margin-bottom:30px;color:#ffffff">Setelah mengisi formulir event baru,tekan submit dan event mu sudah berhasil ditambahkan pada katalog.</p>

        <i class="fa-solid fa-arrow-right" style="color:#ffffff;font-size:30px;margin-bottom:30px"></i>
      </div>
    </div>
    </div>
  </section>






  <!-- Event yang berlangsung -->


  <section id="live_event">
    <div class="row justify-content-center m-4 align-content-center">
      <div class="title">
        <h1 style="text-align: center; margin-top: 70px;margin-bottom: 10px; font-weight: 700; font-size: 40px;">Akan berlangsung</h1>
        <p style="text-align: center; margin-bottom: 70px">Tunggu update kami lainnya!</p>
      </div>
      <div class="row">
        @foreach ($events as $event)
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <img src="{{ asset('storage/' . $event->gambar_acara) }}" class="card-img-top" alt="{{ $event->nama_acara }}" style="height: 300px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title">{{ \Illuminate\Support\Str::limit($event->nama_acara, 35) }}</h5>
              <p class="card-text">{{ \Illuminate\Support\Str::limit($event->deskripsi, 70) }}</p>
              <div style="display: flex; align-items: center; margin-bottom: 20px;">
                <img src="{{ asset('storage/' . $event->user->photo) }}" alt="{{ $event->user->name }}" style="width: 40px; height: 40px; border-radius: 50%; margin-right: 10px;">
                <p style="color:#737373;margin-bottom:0">{{ $event->user->name }}</p>
              </div>
              <a  href="{{ route('detailEvent', ['id' => $event->id]) }}" class="btn btn-primary">Detail</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>


  <!-- Logo section -->
  <section id="logo-section" style="margin-top:120px;margin-bottom:120px">
    <div class="container">
      <div class="col-md-12 m-4 mb-5">
            <h1 style="text-align: left;margin-bottom:30px;font-weight : 600; font-size : 48px;">Mitra Kamip</h1>
            <hr style="border-top: 2px solid #737373;margin-bottom:10px">
          </div>
          <div class="row justify-content-center">
  <div class="col-lg-2 col-md-3 col-sm-4 mt-5 d-flex justify-content-center">
    <img src="ASSETS/logo/bri.png" alt="BRI Logo" class="img-fluid">
  </div>
  <div class="col-lg-2 col-md-3 col-sm-4 mt-5 d-flex justify-content-center">
    <img src="ASSETS/logo/telkom.png" alt="Telkom Logo" class="img-fluid">
  </div>
  <div class="col-lg-2 col-md-3 col-sm-4 mt-5 d-flex justify-content-center">
    <img src="ASSETS/logo/mandiri.png" alt="Mandiri Logo" class="img-fluid">
  </div>
  <div class="col-lg-2 col-md-3 col-sm-4 mt-5 d-flex justify-content-center">
    <img src="ASSETS/logo/pertamina.png" alt="Pertamina Logo" class="img-fluid">
  </div>
  <div class="col-lg-2 col-md-3 col-sm-4 mt-5 d-flex justify-content-center">
    <img src="ASSETS/logo/indofood.png" alt="Indofood Logo" class="img-fluid">
  </div>
  <div class="col-lg-2 col-md-3 col-sm-4 mt-5 d-flex justify-content-center">
    <img src="ASSETS/logo/unilever.png" alt="Unilever Logo" class="img-fluid">
  </div>
</div>

    </div>
  </section>

  <section id="review-section" style="background-color: #053CC9; margin-top:120px;padding : 20px;">

    <div class="title" style="margin-top : 70px;text-align : left;padding-left : 70px;padding-top:10px;">

      <h1 style="font-weight : 700; font-size : 44px; color: white;">Penilaian menurut pengguna <br>sponsor event</h1>
      <p style="font-weight : 300; font-size : 20px; color: white;">Dapatkan inspirasi dari cerita mereka</p>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-4 mb-3 mt-5 align-content-center">
        <div class="card mb-1" style="max-width: 540px;">
          <img src="ASSETS/review_buWachda.png" alt="upload event">
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-3" style="max-width: 540px;">
          <img src="ASSETS/review_jasmine.png" alt="upload event">
        </div>
      </div>
    </div>

    <div class="row justify-content-center" style="margin-bottom: 100px;">
      <div class="col-md-4">
        <div class="card mb-3" style="max-width: 540px;">
          <img src="ASSETS/review_faisa.png" alt="upload event">
        </div>
      </div>
      <div class="col-md-4 align-content-center">
        <div class="card mb-3" style="max-width: 540px;">
          <img src="ASSETS/review_debora.png" alt="upload event">
        </div>
      </div>
    </div>

  </section>


  <footer>

    <div class="row justify-content-center" style="background-color: #000033;">
      <div class="col-md-3 m-4 align-content-center mx-auto">
        <img src="ASSETS/Logo_white.png" alt="Sponsor Event" style="width: 250px; height : 80px;">
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
</body>

</html>