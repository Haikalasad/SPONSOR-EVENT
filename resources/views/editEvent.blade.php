<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap">
    <link rel="stylesheet" href="/CSS/services_style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/fadd57a8f9.js" crossorigin="anonymous"></script>
    <title>Upload Event</title>
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
                        <a class="nav-link" aria-current="page" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/event">Catalog</a>
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

    <div class="container mt-5">
    <h2 style="text-align:center">Edit Event</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('updateEvent', $event->id) }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-5">
            <label for="nama_acara">Nama Acara:</label>
            <input type="text" class="form-control" name="nama_acara" value="{{ old('nama_acara', $event->nama_acara) }}" required>
        </div>

        <div class="form-group mb-5">
            <label for="penyelenggara">Penyelenggara:</label>
            <input type="text" class="form-control" name="penyelenggara" value="{{ old('penyelenggara', $event->penyelenggara) }}" required>
        </div>

        <div class="form-group mb-5">
            <label for="waktu_pelaksanaan">Waktu Pelaksanaan:</label>
            <input type="datetime-local" class="form-control" name="waktu_pelaksanaan" value="{{ old('waktu_pelaksanaan', $event->waktu_pelaksanaan) }}" required>
        </div>

        <div class="form-group mb-5">
            <label for="lokasi">Lokasi:</label>
            <input type="text" class="form-control" name="lokasi" value="{{ old('lokasi', $event->lokasi) }}" required>
        </div>

        <div class="form-group mb-5">
            <label for="deskripsi">Deskripsi:</label>
            <textarea class="form-control" name="deskripsi" required>{{ old('deskripsi', $event->deskripsi) }}</textarea>
        </div>

        <div class="form-group mb-5">
            <label for="syarat_ketentuan">Syarat & Ketentuan:</label>
            <textarea class="form-control" name="syarat_ketentuan" required>{{ old('syarat_ketentuan', $event->syarat_ketentuan) }}</textarea>
        </div>

        <div class="mb-5">
                <label for="kategori_acara" class="form-label">Kategori Acara</label>
                <select class="form-select" id="kategori_acara" name="kategori_acara"  value="{{ old('kategori_acara', $event->categories->kategori) }}">
                    <option value="1">Workshop</option>
                    <option value="2">Seminar</option>
                    <option value="3">Kuliah Tamu</option>
                    <option value="4">Sosialisasi</option>
                    <option value="5">Lomba</option>
                    <option value="6">Open Recruitment</option>
                    <option value="7">Pemira</option>
                    <option value="8">Ospek Jurusan</option>
                </select>
            </div>



       

        <div class="form-group mb-5">
            <label for="gambar_acara">Gambar Acara:</label>
            <input type="file" class="form-control" name="gambar_acara">
            @if ($event->gambar_acara)
                <img src="{{ asset('storage/' . $event->gambar_acara) }}" alt="Event Image" style="max-width: 200px; margin-top: 10px;">
            @endif
        </div>

        <div class="col-md-12 mb-5">

<button type="submit" class="btn btn-primary" style="width:100%;font-size:20px">Submit</button>
</div>
    </form>
</div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
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




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


<script>
    const dropArea = document.querySelector('.input-group');
    const inputField = document.getElementById('gambar_acara');
    const previewImage = document.getElementById('preview-image');

    dropArea.addEventListener('dragover', (event) => {
        event.preventDefault();
        dropArea.classList.add('drag-over');
    });

    dropArea.addEventListener('dragleave', () => {
        dropArea.classList.remove('drag-over');
    });

    dropArea.addEventListener('drop', (event) => {
        event.preventDefault();
        dropArea.classList.remove('drag-over');

        const file = event.dataTransfer.files[0];
        inputField.files = event.dataTransfer.files;
        previewFile(file);
    });

    // Tampilkan pratinjau gambar saat dipilih
    inputField.addEventListener('change', () => {
        const file = inputField.files[0];
        previewFile(file);
    });

    function previewFile(file) {
        const reader = new FileReader();

        reader.onload = function(event) {
            previewImage.src = event.target.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            previewImage.src = '#';
        }
    }


</script>


</html>