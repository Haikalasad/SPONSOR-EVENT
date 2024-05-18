<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/LoginRegist.css">
    <style>
        #preview {
            max-width: 100px; 
            max-height: 100px; 
            margin-top: 10px;
        }
    </style>
    <title>Sign Up</title>
</head>

<body>

    <div class="container">
        <div class="glassmorphism-card">
            <!-- Login Section -->
            <div class="login-section">
                <h2 class="TitleHeader">Sign Up</h2>
                <form action="{{ route('storeUser')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <!-- name input -->
                    <label for="name">Name:</label>
                    <input type="text" name="name" placeholder="Enter your name" />

                    <!-- username input -->
                    <label for="username">Username:</label>
                    <input type="text" name="username" placeholder="Enter your username" />

                    <!-- email input -->
                    <label for="email">Email:</label>
                    <input type="text" name="email" placeholder="Enter your email" />

                    <!-- Password Input -->
                    <label for="password">Password:</label>
                    <input type="password" name="password" placeholder="Enter your password" />

                    <!-- Profile Picture Input -->
                    <label for="profile_picture">Profile Picture:</label>
                    <input type="file" name="profile_picture" accept="image/*" id="profile_picture_input" onchange="previewImage(event)">
                    <!-- Preview gambar -->
                    <img id="preview" src="" alt="Preview Image">

                    <button type="submit" class="SubmitButton">Sign Up</button>
                </form>

                <div class="SignupCTA">
                    <span>Already have an account? Sign In now <a href="/" class="SignUpLink"> Sign In</a></span>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var preview = document.getElementById('preview');
                preview.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>

</html>
