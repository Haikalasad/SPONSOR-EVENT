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
    <title>Sign In</title>
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
            text-align: center;
            color: #333;
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
    </style>
</head>

<body>
<div class="container" data-aos="fade-up">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="glassmorphism-card">
                <!-- Login Section -->
                <div class="login-section">
                    <h2 class="TitleHeader">Selamat datang kembali!</h2>
                    <form method="POST" action="{{ route('loginUser') }}">
                        @csrf
                        <!-- Username Input -->
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" name="username" placeholder="Masukkan username organisasi mu" />
                            @if ($errors->has('username'))
                                <span class="error-message" style="color:red;font-size:14px">{{ $errors->first('username') }}</span>
                            @endif
                        </div>
                        <!-- Password Input -->
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="password" placeholder="Masukkan password" />
                        </div>
                        <button type="submit" class="btn btn-primary SubmitButton">Sign In</button>
                        
                    </form>
                    <div class="SignupCTA">
                        <span>Belum punya akun? Buat disini <a href="/signup" class="SignUpLink">Sign up</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
  AOS.init({
    duration: 1500, 
    once: true, 
  });
</script>
</body>
</html>
