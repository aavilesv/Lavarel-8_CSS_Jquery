<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="http://quantikaecuador.com/images/blog_5.jpg" type="image/x-icon" />
    <style>

    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/login.css" />
    <title>Qüántika. Sign in & Signerer up Form</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">

                <form method="POST" class="sign-in-form">
                    @csrf
                    <h2 class="title">Recuperar Contraseña</h2>
                    @if (Session::has('status'))
                        <hr />
                        <div class='text-success'>
                            {{ Session::get('status') }}
                        </div>
                        <hr />
                    @endif
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="Email" />
                    </div>
                    @error('email')
                        <small>{{ $message }}</small>
                    @enderror

                    <input type="submit" class="btn" value="Sign up" />
                    <a href="login">
                        <i class="fas fa-arrow-left"></i> Regresar
                    </a>
                    <p class="social-text">Nuestras plataformas sociales</p>
                    <div class="social-media">
                        <a href="https://www.facebook.com/quantikaEcuador" " target=" _blank" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="index" class="social-icon" " target=" _blank">
                            <i class="fab fa-twitter"></i>
                        </a>

                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
            </div>
            </form>

        </div>
    </div>

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h1>Qüántika</h1>
                <h1>
                    <p>
                        @quantikaEcuador · Empresa de telecomunicaciones
                    </p>
                </h1>
                <h3><i class="fas fa-phone"> 099 009 0242</i></h3>


            </div>
            <img src="img/log1.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3>One of us ?</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
                    laboriosam ad deleniti.
                </p>
                <button class="btn transparent" id="sign-in-btn">
                    Sign in
                </button>
            </div>
            <img src="img/register.svg" class="image" alt="" />
        </div>
    </div>
    </div>

    <script src="login.js"></script>
</body>

</html>
