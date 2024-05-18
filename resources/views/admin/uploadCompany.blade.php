<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap">
    <link rel="stylesheet" href="/CSS/services_style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/fadd57a8f9.js" crossorigin="anonymous"></script>
    <title>Upload Company</title>
</head>

<body>
    <!-- navbar section -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <img src="../ASSETS/logo.png" style="width: 180px;height: 40px;"" />
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('adminHome')}}">Home</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link active" href="">Company</a>
                    </li>

                </ul>

                @auth
                <!-- Jika pengguna telah terotentikasi, tampilkan foto profil -->
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="{{ auth()->user()->name }}" style="width: 40px; height: 40px; border-radius: 50%;object-fit:cover">
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
            <h1 class="title" style="margin-top: 50px; margin-bottom: 50px; font-weight: 700; font-size: 40px;">Upload Perusahaan</h1>
        </div>
        <form action="{{ route('uploadCompany')}}" method="POST" enctype="multipart/form-data" style="font-size:20px;font-weight:600;">
            @csrf
            <div class="mb-5">
                <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" placeholder="Masukan nama perusahaan" required>
            </div>

            <div class="mb-5">
                <label for="email" class="form-label">Email Perusahaan</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Masukan email perusahaan" required>
            </div>

            <div class="mb-5">
                <label for="contact_person" class="form-label">Contact Person</label>
                <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Masukan contact person perusahaan" required>
            </div>
            <!-- Tambahkan area pratinjau gambar -->
            <div class="mb-5">
                <label for="gambar_perusahaan" class="form-label">Gambar perusahaan</label>
                <p style="color:#939393;font-size:14px">Ps : Disarankan menggunakan gambar dengan rasio 16:9</p>
                <div class="input-group" style="height: 500px;">
                    <input type="file" class="form-control visually-hidden" id="gambar_perusahaan" name="gambar_perusahaan" accept="image/*" aria-describedby="inputGroupFileAddon">
                    <label class="input-group-text" for="gambar_perusahaan" style="height: 100%; width: 100%; display: flex; justify-content: center; align-items: center;">
                        <i class="fas fa-cloud-upload-alt" style="margin-right:10px"></i> Drag & Drop or Click to Upload
                    </label>
                </div>
                <!-- Area untuk menampilkan pratinjau gambar -->
                <div id="preview-container" class="mt-3">
                    <img id="preview-image" src="#" alt="Preview" style="max-width: 100%; max-height: 100%;">
                </div>
            </div>

            <div class="mb-5">
                <label for="deskripsi_perusahaan" class="form-label">Deskripsi Perusahaan</label>
                <textarea class="form-control" id="deskripsi_perusahaan" name="deskripsi_perusahaan" rows="3" placeholder="Masukkan deskripsi perusahaan" required></textarea>
            </div>
            <div class="mb-5">
                <label for="syarat_ketentuan" class="form-label">Syarat dan Ketentuan</label>
                <textarea class="form-control" id="syarat_ketentuan" name="syarat_ketentuan" rows="3" placeholder="Masukkan syarat dan ketentuan event " required></textarea>
            </div>

            <div class="mb-5">
                <label for="alamat_perusahaan" class="form-label">Alamat Perusahaan</label>
                <input type="text" class="form-control" id="alamat_perusahaan" name="alamat_perusahaan" placeholder="Masukan alamat perusahaan" required>
            </div>
            <div class="col-md-12">

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
</script>


</html>