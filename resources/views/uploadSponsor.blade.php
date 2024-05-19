<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap">
    <link rel="stylesheet" href="/CSS/services_style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/fadd57a8f9.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Pengajuan Sponsor</title>
</head>

<body>
    <!-- navbar section -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <img src="/ASSETS/logo.png" />
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

    <div class="container mt-5" style="margin-bottom:50px">
        <div class="col-md-12 text-center">
            <h1 class="title" style="margin-top: 50px; margin-bottom: 50px; font-weight: 700; font-size: 40px;">Pengajuan Sponsor</h1>
        </div>
        <form action="{{ route('storeSponsor') }}" method="POST" enctype="multipart/form-data" style="font-size:20px;font-weight:600;">
            @csrf
            <div class="mb-5">
                <label for="id_user" class="form-label">Pengaju sponsor</label>
                <input type="hidden" id="id_user" name="id_user" value="{{ auth()->user()->id }}">
                <input type="text" class="form-control" id="pengaju_sponsor" name="pengaju_sponsor" value="{{ auth()->user()->name }}" disabled>
            </div>

            <div class="mb-5">
                <label for="id_perusahaan" class="form-label">Nama Perusahaan</label>
                <input type="hidden" id="id_perusahaan" name="id_perusahaan" value="{{ $Perusahaan->id }}">
                <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="{{ $Perusahaan->nama_perusahaan }}" disabled>
            </div>

            <div class="mb-5">
                <label for="nama_acara" class="form-label">Nama Acara</label>
                <input type="text" class="form-control" id="nama_acara" name="nama_acara" required>
            </div>

            <div class="mb-5">
                <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
            </div>

            <div class="mb-5">
                <label for="tanggal_berakhir" class="form-label">Tanggal Berakhir</label>
                <input type="date" class="form-control" id="tanggal_berakhir" name="tanggal_berakhir" required>
            </div>

            <div class="mb-5">
                <label for="nama_penerima" class="form-label">Nama Penerima</label>
                <input type="text" class="form-control" id="nama_penerima" name="nama_penerima" required>
            </div>

            <div class="mb-5">
                <label for="nominal" class="form-label">Nominal</label>
                <input type="text" class="form-control" id="nominal" name="nominal" required>
            </div>

            <div class="mb-5">
                <label for="rekening" class="form-label">Rekening</label>
                <input type="text" class="form-control" id="rekening" name="rekening" required>
            </div>

            <div class="mb-5">
                <label for="proposal_kegiatan" class="form-label">Proposal Kegiatan</label>
                <input type="file" class="form-control" id="proposal_kegiatan" name="proposal_kegiatan">
            </div>

            <div class="mb-5">
                <label for="surat_pengantar" class="form-label">Surat Pengantar</label>
                <input type="file" class="form-control" id="surat_pengantar" name="surat_pengantar">
            </div>

            <div class="mb-5">
                <label for="proposal_sponsor" class="form-label">Proposal Sponsor</label>
                <input type="file" class="form-control" id="proposal_sponsor" name="proposal_sponsor">
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary" style="width:100%;font-size:20px">Submit</button>
            </div>
        </form>


    </div>
    

    @if (session('message'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: "{{ session('message') }}",
            timer: 2000,
            showConfirmButton: false
        }).then(function() {
            window.location.href = "{{ route('company') }}";
        });
    </script>
    @endif

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


<script>
    const dropArea = document.querySelector('.input-group');
    const inputField = document.getElementById('gambar_perusahaan');
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

    new AutoNumeric('#nominal', {
            digitGroupSeparator: '.',
            decimalCharacter: ',',
            decimalPlaces: 0,
            currencySymbol: 'Rp ',
            unformatOnSubmit: true
        });
</script>


</html>