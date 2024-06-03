<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/LoginRegist.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <title>Sign In</title>
    <link rel="icon" href="{{asset('ASSETS/icon/logo.png')}}" type="image/png">
</head>

<body>

<div class="container"  data-aos="fade-up">
    
    <div class="glassmorphism-card">
        <!-- Login Section -->
        <div class="login-section">
            <h2 class="TitleHeader">Selamat datang kembali!</h2>
            <form method="POST" action="{{ route('loginUser') }}">
                 @csrf
                <!-- Username Input -->
                <label for="username">Username:</label>
                <input type="text" name="username" placeholder="Masukkan username organisasi mu" />

                <!-- Password Input -->
                <label for="password">Password:</label>
                <input type="password" name="password" placeholder="Masukkan password" />

                <button type="submit" class="SubmitButton">Sign In</button>
            </form>

            <div class="SignupCTA">
                <span>Belum punya akun? Buat disini <a href="/signup" class="SignUpLink"> Sign up</a> </span>
               
            </div>
        </div>
    </div>
</div>

<script>
  AOS.init({
    duration: 1500, 
    once: true, 
  });
</script>

</body>
</html>