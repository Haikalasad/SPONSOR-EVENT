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
  <title>Services</title>
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
            <a class="nav-link active" aria-current="page" href="">Layanan</a>
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


  <section id="jumbotron" style="background-color:#0A4BF0;">
  <div class="container">


    <div class="row g-5 justify-content-around">
      <div class="col-md-3 align-content-center" data-aos="fade-up">
        <img src="ASSETS/pict1.png" class="responsive-image" style="width: 300px; height : 570px;" />
      </div>
      <div class="col-md-5 mt-5" style="text-align: center;" data-aos="fade-up">

        <ul style="font-size : 22px;font-weight : 500;color : #9EA3B5;justify-content:center; display:flex;margin-top:30px">
          <p style="padding: 20px;margin: 10px">Event</p>
          <li style="padding: 20px;margin: 10px">
            <p>Sponsor</p>
          </li>
          <li style="padding: 20px;margin: 10px">Deal</li>
        </ul>
        <h1 style="color : white;font-size : 48px; font-weight : 700;">
          Mau promosi event kamu dan dapat sponsor? Kami bisa bantu
        </h1>

        <ul style="font-size : 22px;font-weight : 500;color : #ffffff;justify-content:center; display:flex;margin-top:50px">
          <P style="margin-right:30px;"><i class="fa-solid fa-check " style="margin-right : 10px;"></i>Proses cepat</P>
          <P><i class="fa-solid fa-check " style="margin-right : 10px;"></i>Terpercaya</P>
        </ul>

        <a href="https://wa.me/6282233379945" class="btn btn-primary" href="#" style="width: 200px;font-size:20px;justify-content:center;margin-top:30px; padding:10px; background-color: #012D9F;color:#ffffff">Selengkapnya<i class="fa-solid fa-phone" style="margin-left:8px"></i></a>
        <ul style="font-size : 20px;font-weight : 500;color : #ffffff;justify-content:center; display:flex;margin-top:70px;align-items:center;">
          <i class="fa-regular fa-heart" style="margin-right:10px;background-color:#012D9F;padding:15px;border-radius:50%"></i>
          <P style="margin-right:30px;">Kepuasan <br>terjamin</P>

          <i class="fa-regular fa-clock" style="margin-right:10px;margin-left:10px;background-color:#012D9F;padding:15px;border-radius:50%"></i>
          <P style="margin-right:40px;">Tersedia <br>24 jam</P>

          <i class="fa-solid fa-location-dot" style="margin-right:10px;background-color:#012D9F;padding:15px;border-radius:60%"></i>
          <P>Akses dimana<br>saja</P>
        </ul>
      </div>
      <div class="col-md-3 align-content-center" data-aos="fade-up">
        <img src="ASSETS/pict2.png"class="responsive-image" style="width: 300px; height : 570px" />
      </div>
    </div>
  </div>
    <img src="ASSETS/services.png" style="width:100vw;margin-bottom:0px" />
  </section>

  <!-- hero section -->

  <section id="hero-section" style="margin-top:120px" >
  <div class="container" data-aos="fade-up">

    <div class="row justify-content-center m-5">
      <div class="col-lg-6 col-md-4 mt-4 align-content-center">
        <h1 style="font-size:48px;font-weight:600;margin-bottom:30px">
          Kenapa sponsor event?
        </h1>
        <p style="font-size:18px;">
          Sponsor event tidak hanya menjadi penghubung antara organisasi/kepanititaan untuk mencari sponsor,namun sposnsor event juga menjadi wadah untuk mempromosikan event- event yang didaftarkan
        </p>
        <div style="display:flex;color:#012D9F;font-size:20px;margin-bottom:30px">
          <div class="features" style="margin-right:40px">
            <li style="list-style: none;">
              <P><i class="fa-solid fa-check " style="margin-right : 10px;"></i>Promosi gratis</P>
            </li>
            <li style="list-style: none;">
              <P><i class="fa-solid fa-check " style="margin-right : 10px;"></i>Mengajukan sponsor</P>
            </li>
            <li style="list-style: none;">
              <P><i class="fa-solid fa-check " style="margin-right : 10px;"></i>Membuat event</P>
            </li>
          </div>
          <div class="features">
            <li style="list-style: none;">
              <P><i class="fa-solid fa-check " style="margin-right : 10px;"></i>Proses sponsor cepat</P>
            </li>
            <li style="list-style: none;">
              <P><i class="fa-solid fa-check " style="margin-right : 10px;"></i>Fee terjangkau</P>
            </li>
            <li style="list-style: none;">
              <P><i class="fa-solid fa-check " style="margin-right : 10px;"></i>Detail perusahaan</P>
            </li>
          </div>
        </div>
        <a href="https://wa.me/6282233379945" class="btn btn-primary" type="submit" style="background-color: #012D9F;">Kami membuat pelayanan cepat. Anda dapat <br>menghubungi kami disini</a>
      </div>

      <div class="col-md-6 col-sm-12 mt-4 align-content-center">
        <img src="ASSETS/services_hero.png" class="img-fluid" />
      </div>
    </div>

  </div>


  </section>


  <!-- shortcut servcice section -->
  <section id="shortcut_service mt-5" style="margin-top:120px;padding:20px" data-aos="fade-up">
  <div class="container" data-aos="fade-up">
  <div class="col-md-12 m-4 mb-5">
    <h1 style="text-align: left;margin-bottom:30px;font-weight : 600; font-size : 48px;">Katalog Event Kampus</h1>
    <hr style="border-top: 2px solid #737373;margin-bottom:10px">
  </div>
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4 align-content-center p-5">
              <img src="ASSETS/icon/upload.png" alt="upload event">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h3 class="card-title" style="font-weight: 700;">Upload Event Ormawa dan UKM</h3>
                <p class="card-text" style="font-size: 16px;color:#737373;font-weight:500">Unggah eventmu disini dan masuk dalam katalog!</p>
                <a href="#" class="card-text" style="text-decoration: none; "><small class="text-body-secondary" style="color:#0A4BF0 !important;">Read More</small></a>
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
                <p class="card-text" style="font-size: 16px;color:#737373;font-weight:500">Semua acara pada kampus Tel-U tersedia disini</p>
                <a href="#" class="card-text" style="text-decoration: none; "><small class="text-body-secondary" style="color:#0A4BF0 !important;">Read More</small></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center mt-2 ">
      <div class="col-md-4">
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4 align-content-center p-5">
              <img src="ASSETS/icon/coint.png" alt="upload event">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h3 class="card-title" style="font-weight: 700;">Fee yang terjangkau</h3>
                <p class="card-text" style="font-size: 16px;color:#737373;font-weight:500">Cukup dengan 100 ribu aja, <br>acaramu udah terupload!</p>
                <a href="#" class="card-text" style="text-decoration: none; "><small class="text-body-secondary" style="color:#0A4BF0 !important;">Read More</small></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4 align-content-center p-5">
              <img src="ASSETS/icon/megaphone.png" alt="upload event">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h3 class="card-title" style="font-weight: 700;">Promosikan eventmu !</h3>
                <p class="card-text" style="font-size: 16px;color:#737373;font-weight:500">Event yang kamu daftarkan <br>akan dilihat semua orang loh!</p>
                <a href="#" class="card-text" style="text-decoration: none; "><small class="text-body-secondary" style="color:#0A4BF0 !important;">Read More</small></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 m-4 d-flex justify-content-center">
      <a class="btn btn-primary" href="{{route('showEvent')}}"  type="submit" style="background-color: #012D9F; width: 100%; height: 60px; font-size: 24px; margin-top: 40px;">Apply now</a>
  </div>
    </div>


  </div>
  </section>


  <section id="shortcut_service mt-5" style="margin-top:70px;padding:20px">
  <div class="container" data-aos="fade-up">
    <div class="col-md-12 m-4 mb-5">
      <h1 style="text-align: left;margin-bottom:30px;font-weight : 600; font-size : 48px;">Pengajuan Sponsorship</h1>
      <hr style="border-top: 2px solid #737373;margin-bottom:10px">
    </div>
      <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="card mb-3" style="max-width: 600px;">
            <div class="row g-0">
              <div class="col-md-4 align-content-center p-5">
                <img src="ASSETS/icon/checklist.png" alt="upload event">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h3 class="card-title" style="font-weight: 700;">Daftar Mitra</h3>
                  <p class="card-text" style="font-size: 14px;color:#737373;font-weight:500">Kami telah bekerja sama dengan mitra-mitra terpercaya seperti Telkom Indonesia,BCA,Indofood,dan lainnya.</p>
                  <p class="card-text"><small class="text-body-secondary">Read More</small></p>
                </div>
              </div>
            </div>
          </div>
        </div>
  
        <div class="col-md-4">
          <div class="card mb-3" style="max-width: 600px;">
            <div class="row g-0">
              <div class="col-md-4 align-content-center p-5">
                <img src="ASSETS/icon/fee.png" alt="upload event">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h3 class="card-title" style="font-weight: 700;">Biaya admin 5%</h3>
                  <p class="card-text" style="font-size: 14px;color:#737373;font-weight:500">Setiap dana sponsorhip yang didapatkan akan terkena potongan 5% untuk biaya admin</p>
                  <p class="card-text "><small class="text-body-secondary">Read More</small></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 m-4 d-flex justify-content-center">
        <a class="btn btn-primary" href="{{route('company')}}"  type="submit" style="background-color: #012D9F; width: 100%; height: 60px; font-size: 24px; margin-top: 40px;">Apply now</a>
  </div>
      </div>
     
  </div>
  </section>

  <section id="shortcut_service mt-5" style="margin-top:90px">
  <div class="container" data-aos="fade-up">
    <div class="col-md-12 m-4 mb-5">
        <h1 style="text-align: left;margin-bottom:30px;font-weight : 600; font-size : 48px;">Pengajuan Sponsorship</h1>
        <hr style="border-top: 2px solid #737373;margin-bottom:10px">
      </div>
      <div class="container">
        <div class="row align-items-center gx-3 gy-5 py-5">
          <div class="col-12 col-md-12 col-lg-5">
            <img src="assets/person.jpg" class="img-fluid mx-auto d-block" alt="person" style="width: 500px; height: 500px; margin-right: 20px;" />
          </div>
          <div class="col-md-12 text-center text-lg-start col-lg-7">
            <h2 class="fw-bold fs-1 pb-3" style="font-size: 40px;margin-bottom:20px">Daftarkan event anda dan ajukan sponsorship!</h2>
            <p class="about-text" style="font-size: 20px;margin-bottom:40px">
              Kamu bisa mendaftarkan event yang kamu buat sekaligus melakukan pengajuan sponsorship dari website kami.<br>
              Kamu tinggal tunggu beres!!!, enak kan? Tunggu apalagi, segera daftarkan!!!
            </p>
            <a class="btn btn-primary" href="{{ route('showEvent') }}" style="width: 180px;justify-content:center;align-items:center; background-color: #053CC9;">Apply Now</a>
          </div>
        </div>
      </div>

  </div>


  </section>


  <!-- Logo section -->
  <section id="logo-section" style="margin-top:120px;margin-bottom:120px">
    <div class="container" data-aos="fade-up">
      <div class="col-md-12 m-4 mb-5">
            <h1 style="text-align: left;margin-bottom:30px;font-weight : 600; font-size : 48px;">Pengajuan Sponsorship</h1>
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


  <footer>

    <div class="row justify-content-center" style="background-color: #000033;" data-aos="fade-up">
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


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>



<script>
  AOS.init({
    duration: 1500, 
    once: true, 
  });
</script>
</html>