<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Register </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Xchange -->
    <link rel="shortcut icon" type="image/x-icon" href="/template_Authentification/img/logoxchange.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/template_Authentification/css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="/template_Authentification/css/fontawesome-all.min.css">
    <!-- Vegas CSS -->
    <link rel="stylesheet" href="/template_Authentification/css/vegas.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="/template_Authentification/font/xchange.css">
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
                        <a href="{{ route('register') }}" class="switcher-text1 active">Register</a>
                    </div>
                </div>
                <div class="col-md-6 col-12 fxt-bg-color">
                    <div class="fxt-content">
                        <div class="fxt-header">
                            <a href="{{ route('login') }}" class="fxt-logo"><img
                                    src="/template_Authentification/img/xchange.png" alt="Logo"></a>
                        </div>
                        <div class="fxt-form">
                            <div class="fxt-transformY-50 fxt-transition-delay-1">
                                <h2>Register</h2>
                            </div>
                            <div class="fxt-transformY-50 fxt-transition-delay-2">
                                <p>Create an account free and enjoy it</p>
                            </div>
                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                                        <input id="name" type="text"
                                            class="form-control  @error('name') is-invalid @enderror" placeholder="Name"
                                            name="name" value="{{ old('name') }}" required autocomplete="name"
                                            autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <i class="flaticon-user"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                                        <input id="date_of_birth" type="date" class="form-control"
                                            placeholder="Date of Birth" name="date_of_birth"
                                            value="{{ old('date_of_birth') }}" required>
                                        @error('date_of_birth')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                                        <select id="country" name="country" class="form-control" required>
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $countryCode => $countryName)
                                                <option value="{{ $countryName }}"
                                                    @if ($countryName === 'Tunisia') selected @endif>
                                                    {{ $countryName }}</option>
                                            @endforeach
                                        </select>
                                        @error('country')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <i class="fas fa-globe"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">

                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Email Address" name="email" value="{{ old('email') }}"
                                            required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <i class="flaticon-envelope"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                                        <select id="institut"
                                            class="form-control @error('institut') is-invalid @enderror"
                                            name="institut" required autocomplete="institut" autofocus>
                                            <option value="">Select Institut</option>
                                            <option value="isi_kef">ISI Kef</option>
                                            <option value="isi_ariana">ISI Ariana</option>
                                            <!-- Add more options if needed -->
                                        </select>

                                        @error('institut')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <i class="fas fa-university"></i>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                                        <select id="diploma"
                                            class="form-control @error('diploma') is-invalid @enderror"
                                            placeholder="Diploma" name="diploma" required autocomplete="diploma"
                                            autofocus>
                                            <option value="">Select Diploma</option>
                                        </select>

                                        @error('diploma')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <i class="fas fa-graduation-cap"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">

                                        <label for="inputField" class="btn btn-info">uploid Document</label>
                                        <input type="file" name="image" id="inputField" style="display:none">
                                       
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-2">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Password" name="password" required
                                            autocomplete="new-password">
                                        <span id="password-toggle" class="password-toggle-icon"
                                            onclick="togglePassword('password')">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-2">
                                        <input id="password-confirm" type="password" class="form-control"
                                            placeholder="Confirm Password" name="password_confirmation" required
                                            autocomplete="new-password">
                                        <span id="password-confirm-toggle" class="password-toggle-icon"
                                            onclick="togglePassword('password-confirm')">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-3">
                                        <button type="submit" class="fxt-btn-fill">Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        function togglePassword(inputId) {
            var passwordField = $('#' + inputId);
            var fieldType = passwordField.attr('type');
            if (fieldType === 'password') {
                passwordField.attr('type', 'text');
                $('#' + inputId + '-toggle i').removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                passwordField.attr('type', 'password');
                $('#' + inputId + '-toggle i').removeClass('fa-eye-slash').addClass('fa-eye');
            }
        }
    </script>
<script>
    document.getElementById('institut').addEventListener('change', function() {
        var institut = this.value;
        var diplomaSelect = document.getElementById('diploma');
        // Clear existing options
        diplomaSelect.innerHTML = '<option value="">Select Diploma</option>';

        if (institut === 'isi_kef') {
            var option1 = new Option("Cette Licence Intitulé 'Computer Science' Comprend Deux Spécialités", "computer_science");
            var option2 = new Option("Mastère de Recherche en Systèmes d'Informations et Web", "mastere_si_web");
            diplomaSelect.add(option1);
            diplomaSelect.add(option2);
        } else if (institut === 'isi_ariana') {
            var option1 = new Option("Mastère Co-Construite en Nouvelles Technologies de l’Information et de la Communication dédiées à l'Innovation de l'Agriculture", "mastere_agriculture");
            var option2 = new Option("Mastère Professionnel en Application Web Intelligente", "mastere_web");
            diplomaSelect.add(option1);
            diplomaSelect.add(option2);
        }
        // Add more conditions/options as needed
    });
</script>

</body>

</html>
