<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Xmee | Login and Register Form Html Templates</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/template_Authentification/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/template_Authentification/css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="/template_Authentification/css/fontawesome-all.min.css">
    <!-- Vegas CSS -->
    <link rel="stylesheet" href="/template_Authentification/css/vegas.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="/template_Authentification/font/flaticon.css">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/template_Authentification/style.css">
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <div id="preloader" class="preloader">
        <div class='inner'>
            <div class='line1'></div>
            <div class='line2'></div>
            <div class='line3'></div>
        </div>
    </div>
    <section class="fxt-template-animation fxt-template-layout29">
        <div class="container-fluid">
            <div class="row">
                <div class="vegas-container col-md-6 col-12 fxt-bg-img" id="vegas-slide"
                    data-vegas-options='{"delay":5000, "timer":false,"animation":"kenburns", "transition":"swirlLeft", "slides":[{"src": "/image1.jpg"}, {"src": "/image2.jpg"}, {"src": "/image3.jpg"}]}'>
                    <div class="fxt-page-switcher">
                        <a href="{{ route('login') }}" class="switcher-text1">Login</a>
                        <a href="{{ route('register') }}" class="switcher-text1">Register</a>
                    </div>
                </div>
                <div class="col-md-6 col-12 fxt-bg-color">
                    <div class="fxt-content">
                        <div class="fxt-header">
                            <a href="{{ route('login') }}" class="fxt-logo"><img
                                    src="/template_Authentification/img/logo-29.png" alt="Logo"></a>
                        </div>
                        <div class="fxt-form">
                            <div class="fxt-transformY-50 fxt-transition-delay-1">
                                <h2>Forgot Password</h2>
                            </div>
                            <div class="fxt-transformY-50 fxt-transition-delay-2">
                                <p>For recover your password</p>
                            </div>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Email Address" name="email" value="{{ old('email') }}"
                                            required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <i class="flaticon-envelope"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-3">
                                        <button type="submit" class="fxt-btn-fill">Send Me Email</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- jquery-->
    <!-- jquery-->
    <script src="/template_Authentification/js/jquery-3.5.0.min.js"></script>
    <!-- Bootstrap js -->
    <script src="/template_Authentification/js/bootstrap.min.js"></script>
    <!-- Imagesloaded js -->
    <script src="/template_Authentification/js/imagesloaded.pkgd.min.js"></script>
    <!-- Vegas js -->
    <script src="/template_Authentification/js/vegas.min.js"></script>
    <!-- Validator js -->
    <script src="/template_Authentification/js/validator.min.js"></script>
    <!-- Custom Js -->
    <script src="/template_Authentification/js/main.js"></script>

</body>

</html>
