<!doctype html>
<html class="no-js" lang="">

<head>
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
    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    <!-- Preloader and other body elements -->
    <section class="fxt-template-animation fxt-template-layout29">
        <div class="container-fluid">
            <div class="row">
                <!-- Background Image Container -->
                <div class="vegas-container col-md-6 col-12 fxt-bg-img" id="vegas-slide"
                    data-vegas-options='{"delay":5000, "timer":false,"animation":"kenburns", "transition":"swirlLeft", "slides":[{"src": "/template_Authentification/img/figure/bg29-l-1.jpg"}, {"src": "/template_Authentification/img/figure/bg29-l-2.jpg"}, {"src": "/template_Authentification/img/figure/bg29-l-3.jpg"}]}'>
                    <!-- Page Switcher -->
                    <div class="fxt-page-switcher">
                        <a href="{{ route('login') }}" class="switcher-text1">Login</a>
                        <a href="{{ route('register') }}" class="switcher-text1 active">Register</a>
                    </div>
                </div>
                <!-- Registration Form Container -->
                <div class="col-md-6 col-12 fxt-bg-color">
                    <div class="fxt-content">
                        <div class="fxt-header">
                            <!-- Logo -->
                        </div>
                        <div class="fxt-form">
                            <h2>Enter Verification Code</h2>
                            <!-- Verification Code Form -->
                            <form id="verificationForm" method="POST" action="{{ route('verify.code') }}">
                                @csrf
                                <!-- Verification Code Input -->
                                <div class="form-group">
                                    <input id="verification_code" type="password"
                                        class="form-control @error('verification_code') is-invalid @enderror"
                                        placeholder="Enter Verification Code" name="verification_code"
                                        value="{{ old('verification_code') }}" required>
                                    @error('verification_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <i class="flaticon-key"></i>
                                </div>
                                <!-- Submit Button -->
                                <div class="form-group">
                                    <button type="button" class="fxt-btn-fill" onclick="verifyEmail()">Verify</button>
                                    <button type="button" class="fxt-btn-fill" onclick="resendVerificationCode()">Resend Code</button> <!-- New button -->

                                </div>
                            </form>
                        </div>
                        <!-- Social Media Links -->
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
    <!-- Toastr js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        function resendVerificationCode() {
    $.ajax({
        type: 'POST',
        url: '/resend/code', // Route to resend verification code
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include the CSRF token in the request headers
        },
        dataType: 'json',
        success: function(response) {
            showToast('success', response.message);
        },
        error: function(xhr, status, error) {
            var errorMessage = xhr.responseJSON ? xhr.responseJSON.message : 'An error occurred.';
            showToast('error', errorMessage);
        }
    });
}

function verifyEmail() {
    // Perform AJAX request to verify the email
    $.ajax({
        type: 'POST',
        url: '/verify/code',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include the CSRF token in the request headers
        },
        data: $('#verificationForm').serialize(), // Assuming your form has an ID of 'verificationForm'
        dataType: 'json',
        success: function(response) {
            // Check the status of the response
            if (response.status === 'success') {
                // Show success toastr message
                showToast('success', response.message);
                // Redirect to the home page or perform any other action
                window.location.href = '/home';
            } 
        },
        error: function(xhr, status, error) {
            // Show error toastr message
            if (xhr.responseJSON && xhr.responseJSON.errors && xhr.responseJSON.errors.verification_code) {
                var errorMessage = xhr.responseJSON.errors.verification_code[0];
                showToast('error', errorMessage);
            } else {
                var errorMessage = xhr.responseJSON ? xhr.responseJSON.message : 'An error occurred.';
                showToast('error', errorMessage);
            }
        }
    });
}

// Bind the verifyEmail function to the form submission event
$('#verificationForm').submit(function(event) {
    event.preventDefault(); // Prevent default form submission behavior
    verifyEmail(); // Call the verifyEmail function
});

// Bind the verifyEmail function to the click event of the "Verify" button
$('#verificationForm').find('.fxt-btn-fill').click(verifyEmail);



        function showToast(type, message) {
            toastr.options = {
                closeButton: true, // Add a close button
                progressBar: true, // Show a progress bar
                showMethod: 'slideDown', // Animation in
                hideMethod: 'slideUp', // Animation out
                timeOut: 5000, // Time before auto-dismiss
            };

            switch (type) {
                case 'info':
                    toastr.info(message);
                    break;
                case 'success':
                    toastr.success(message);
                    var audio = new Audio('audio.wav');
                    audio.play();
                    break;
                case 'warning':
                    toastr.warning(message);
                    break;
                case 'error':
                    toastr.error(message);
                    break;
            }
        }
    </script>

</body>

</html>
