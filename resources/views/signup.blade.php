<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <link rel="icon" href="{{asset('ASSETS/icon/logo.png')}}" type="image/png">
    <style>
        body {
            background-image: url('/ASSETS/bg_login.png');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        .glassmorphism-card {
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            background: rgba(249, 249, 249, 0.9);
            border-radius: 12px;
            padding: 30px;
         
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.8);
            width: 100%;
            max-width: 500px;
        }
        .form-control {
            margin-bottom: 15px;
            font-size: 16px;
            padding: 15px;
        }

        .TitleHeader {
            font-size: 30px;
            color: #333;
            text-align: center;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .SubmitButton {
            font-size: 16px;
            padding: 15px;
            background-color: #0B77FA;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .SubmitButton:hover {
            background-color: #005bb5;
        }

        .SignupCTA {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }

        .SignUpLink {
            color: #007bff;
            text-decoration: underline;
            cursor: pointer;
            margin-left: 5px;
        }

        #preview {
            max-width: 100px; 
            max-height: 100px; 
            margin-top: 10px;
        }
    </style>
    <title>Sign Up</title>
</head>

<body>
    <div class="container" data-aos="fade-up">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6">
                <div class="glassmorphism-card">
                    <!-- Login Section -->
                    <div class="login-section">
                        <h2 class="TitleHeader">Sign Up</h2>
                        <form action="{{ route('storeUser') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <!-- Name input -->
                            <div class="form-group">
                                <label for="name">Nama organisasi:</label>
                                <input type="text" class="form-control" name="name" placeholder="Masukkan nama organisasi kamu" />
                            </div>
                            <!-- Username input -->
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" name="username" placeholder="Masukkan username organisasi kamu" />
                            </div>
                            <!-- Email input -->
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" name="email" placeholder="Masukkan email organisasi kamu" />
                            </div>
                            <!-- Password input -->
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required />
                                @if ($errors->has('password'))
                                    <span class="error-message" style="color:red">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <!-- Profile Picture input -->
                            <div class="form-group">
                                <label for="profile_picture">Logo Organisasi:</label>
                                <input type="file" class="form-control" name="profile_picture" accept="image/*" id="profile_picture_input" onchange="previewImage(event)">
                            </div>
                            <!-- Preview gambar -->
                            <img id="preview" src="" alt="Preview Image">
                            <button type="submit" class="btn btn-primary SubmitButton">Sign Up</button>
                        </form>
                        <div class="SignupCTA">
                            <span>Sudah punya akun? sign in sekarang <a href="/" class="SignUpLink">Sign In</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var preview = document.getElementById('preview');
                preview.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

    </script>
</body>

</html>
