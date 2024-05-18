<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/LoginRegist.css">
    <title>Sign In</title>
</head>

<body>

<div class="container">
    
    <div class="glassmorphism-card">
        <!-- Login Section -->
        <div class="login-section">
            <h2 class="TitleHeader">Welcome Back!</h2>
            <form method="POST" action="{{ route('loginUser') }}">
                 @csrf
                <!-- Username Input -->
                <label for="username">Username:</label>
                <input type="text" name="username" placeholder="Enter your username" />

                <!-- Password Input -->
                <label for="password">Password:</label>
                <input type="password" name="password" placeholder="Enter your password" />

                <button type="submit" class="SubmitButton">Sign In</button>
            </form>

            <div class="SignupCTA">
                <span>Don’t have an account? Create now  <a href="/signup" class="SignUpLink"> Sign up</a> </span>
               
            </div>
        </div>
    </div>
</div>


</body>
</html>