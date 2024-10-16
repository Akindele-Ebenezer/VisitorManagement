<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN | Daily Visitor Entry</title>
    <link rel="stylesheet" href="{{ asset('Css/Styles.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,600" />
</head>
<body class="Login">
    <img class="company-logo" src="{{ 'Images/LTT -DEPASA Logo.png' }}" alt="">
    <div class="loader">
        <img src="{{ 'Images/loader-x.gif' }}" alt="">
    </div>
    <div class="container-wrapper">
        <img src="{{ 'Images/login-dp.webp' }}" alt="">
        <div class="container">
            <form class="LoginForm">
                @csrf
                <h1>Login</h1>
                <p class="Error"></p>
                <div class="input-box">
                    <input type="email" name="Email" placeholder="Email">
                    <i class='bx bx-envelope'></i>
                </div>

                <div class="input-box">
                    <input type="password" name="Password" placeholder="Password">
                    <i class='bx bx-lock-alt' ></i>
                </div>
                <div class="remember"> 
                    <a href="#">L.T.T | DEPASA MARINE INT'L</a>
                </div>
            </form>
            <button class="btn LoginButton">Login</button>
            <div class="register">
                <p>Security Department <br><br> <a href="#">DAILY VISITOR ENTRY</a></p>
            </div>
        </div>
    </div>
    <script src="{{ asset('Js/Loader.js') }}"></script>
    <script src="{{ asset('Js/Login.js') }}"></script>
</body>
</html>