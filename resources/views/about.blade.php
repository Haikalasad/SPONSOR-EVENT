<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap">
    <link rel="stylesheet" href="/CSS/about_style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/fadd57a8f9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
</head>
</head>

<body>


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
                        <a class="nav-link" aria-current="page" href="/home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/event">Katalog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/company">Mitra</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/about">Tentang</a>
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

    <section id="hero-section" style="margin-bottom:80px" data-aos="fade-up">
        <div class="container mt-5">
            <div class="row mb-5 p-5 g-5 justify-content-center">
                <div class="col-lg-6 col-md-6 align-content-center">
                    <h1 style="margin-bottom:37px;font-size:48px">
                        Ajukan sponsor dan promosikan acara Anda.
                    </h1>
                    <p style="margin-bottom:37px;font-size:20px">
                        Temukan sponsor yang cocok dan maksimalkan promosi acara Anda dengan bantuan kami! Dapatkan kemitraan yang tepat dan jangkau audiens yang luas dengan platform kami yang efisien.
                    </p>
                    <a class="btn btn-primary" href="{{route('company')}}"  type="submit" style=" width:max-content; height: max-content; font-size: 20px;">Apply now</a>
                </div>

                <div class="col-lg-6 col-md-6 mt-5  align-content-center">
                    <img src="ASSETS/about_hero.png" class="img-fluid" />
                </div>
            </div>
        </div>
    </section>

    <section id="achievments" style="margin-bottom:80px;background-color:#F5F7FA">
        <div class="container" data-aos="fade-up">
            <div class="row mt-5 p-5">
                <div class="col-lg-6 col-md-12 mt-4 align-content-center">
                    <h2 style="margin-bottom:37px;font-size:24px">
                        Membantu mahasiswa untuk mendapatkan dana sponsor dan promosi event
                    </h2>
                    <p style="margin-bottom:37px;font-size:16px">
                        Kami telah sampai pada titik ini dengan semua kerja keras dan dedikasi.
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 d-flex flex-column align-items-center mb-3">
                    <div class="card mb-3" style="max-width: 280px; border:none; background:none;">
                        <div class="d-flex align-items-center">
                            <div class="p-3">
                                <img src="ASSETS/icon/people.png" alt="1500 orang" class="img-fluid" style="max-width:50px">
                            </div>
                            <div>
                                <div class="card-body text-left">
                                    <h4 class="card-title" style="font-weight: 700;color:#4D4D4D">1.500</h4>
                                    <p class="card-text" style="font-size: 14px;color:#717171">Pengguna terdaftar</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3" style="max-width: 280px; border:none; background:none;">
                        <div class="d-flex align-items-center">
                            <div class="p-3">
                                <img src="ASSETS/icon/point.png" alt="100 event" class="img-fluid">
                            </div>
                            <div>
                                <div class="card-body text-left">
                                    <h4 class="card-title" style="font-weight: 700;color:#4D4D4D">100</h4>
                                    <p class="card-text" style="font-size: 14px;color:#717171">Event yang terdaftar</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 d-flex flex-column align-items-center mb-3">
                    <div class="card mb-3" style="max-width: 280px; border:none; background:none;">
                        <div class="d-flex align-items-center">
                            <div class="p-3">
                                <img src="ASSETS/icon/tigaTangan.png" alt="100 perusahaan" class="img-fluid">
                            </div>
                            <div>
                                <div class="card-body text-left">
                                    <h4 class="card-title" style="font-weight: 700;color:#4D4D4D">100</h4>
                                    <p class="card-text" style="font-size: 14px;color:#717171">Perusahaan terdaftar</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3" style="max-width: 280px; border:none; background:none;">
                        <div class="d-flex align-items-center">
                            <div class="p-3">
                                <img src="ASSETS/icon/card.png" alt="50 juta dana sponsor" class="img-fluid">
                            </div>
                            <div>
                                <div class="card-body text-left">
                                    <h4 class="card-title" style="font-weight: 700;color:#4D4D4D">50 juta</h4>
                                    <p class="card-text" style="font-size: 14px;color:#717171">Total dana sponsor</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="latar_belakang" style="margin-bottom:60px">
        <div class="container" data-aos="fade-up">
            <div class="row mt-5 p-5">
                <div class="col-lg-6 col-md-6 col-sm-12 align-content-center">
                    <img src="ASSETS/about_latar.png" class="img-fluid" />
                </div>
                <div class="col-lg-6 col-md-3 mt-4 align-content-center">
                    <h1 style="margin-bottom:37px;font-size:48px;font-weight:700">
                        Latar belakang
                    </h1>
                    <p style="margin-bottom:37px;font-size:20px">
                        Kami sering mengalami tantangan dengan kurangnya antusiasme dan dana saat mengikuti kepanitiaan. Untuk mengatasi hal ini, kami membuat website berisi katalog acara internal kampus dan formulir pengajuan sponsorship. Tujuannya adalah mempermudah mahasiswa mengetahui acara yang akan diadakan dan mendapatkan sponsor.
                    </p>

                </div>
            </div>
        </div>
    </section>




    <section id="recomendations" style="margin-bottom:80px;background-color:#F5F7FA">
        <div class="container" data-aos="fade-up">
            <div class="row mt-5 p-5">
                <div class="col-lg-8 col-md-3 me-5 align-content-center">
                    <p style="margin-bottom:20px;font-size:20px;font-weight:400;color:#111827">
                        “Sebelum ada website ini tu banyak anak SI yang gak tau kalo prodinya ada acara jadi ga ada peserta. Tapi setelah upload disini gak cuman SI aja prodi lain juga tau bahkan ikut partisipasi juga. Pokoknya mah, ini worth it parah!!!.”
                    </p>
                    <h3 style="margin-bottom:20px;font-size:22px;font-weight:700;color:#0066CC">
                        Jazmine Lazuardi.
                    </h3>
                    <p style="margin-bottom:20px;font-size:20px;color:#89939E">
                        Sistem Informasi 2021
                    </p>
                    <img src="ASSETS/list_icon_event.png" /><a href="/event" style="color:#0066CC;text-decoration:none;margin-left:40px;font-size:20px;font-weight:600">Lihat semua event</a><i class="fa-solid fa-arrow-right" style="font-size:18px;margin:10px;color:#0066CC"></i>
                </div>

                <div class="col-lg-2 col-md-4 col-sm-4 align-self-center">
                    <img src="ASSETS/about_comment.png" />
                </div>
            </div>
        </div>
    </section>


    <section style="margin-bottom:80px" data-aos="fade-up">
    <div class="container">
        <div class="title">
            <h1 style="text-align: center; margin-top: 70px;margin-bottom: 10px; font-weight: 700; font-size: 40px;">Tim Sponsor Event</h1>
    
        </div>
        <div class="col-md-12 " style="padding:80px">
            <img src="ASSETS/tim_section.png" style="width:100%;margin-right:130px">
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


<script>
  AOS.init({
    duration: 1500, 
    once: true, 
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>