@extends('backoffice.layouts.index')

@section('content')


<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel-content">
					<h4 class="main-title">User Profile <i class="icofont-pen-alt-1"></i></h4>
					<div class="row merged20 mb-4">
						<div class="col-lg-4">
							<div class="d-widget text-center">
								
								<div class="user-dp-edit">
                                    <br>
                                    <br>
									<figure>
										<img src="/backoffice/admin image.png" alt="">
											<div class="fileupload">
											<span class="btn-text"><i class="icofont-camera"></i></span>
											<input type="file" class="upload">
										</div>
									</figure>
									<div class="users-name">
										<h5>{{Auth::user()->name}}</h5>
                                        <span>{{Auth::user()->email}}</span>

										<p>Administrateur</p>
									</div>
								</div>
								
								
							</div>	
							
						</div>
						<div class="col-lg-8">
							<nav class="responsive-tab style1">
								<ul data-submenu-title="compounents"
								uk-switcher="connect: #picturez ;animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium" class="uk-grid" uk-sticky="offset:50;media : @m">
                                <li><a href="#">Profile</a></li> <!-- New list item for changing email or name -->
                                <li><a href="#">Change Password</a></li> <!-- New list item for changing password -->	
								</ul>
							</nav>
							<ul class="uk-switcher" id="picturez">
                            <li>
            <!-- Form for changing email or name -->
            <div class="col-lg-8">
            <form id="updateProfileForm">
        <div class="form-group">
            <label for="newEmail">Email</label>
            <input type="email" class="form-control" id="newEmail" value="{{ Auth::user()->email }}" name="email" required>
        </div>
        <div class="form-group">
            <label for="newName">Name</label>
            <input type="text" class="form-control" id="newName" value="{{ Auth::user()->name }}" name="name" required>
        </div>
        <button type="button" id="saveChangesBtn" class="btn btn-primary">Save Changes</button>
    </form>
</div>
        </li>
            <li>
                <!-- Form for changing password -->
                <div class="col-lg-8">
                <form id="changePasswordForm">
                    <div class="form-group">
                        <label for="currentPassword">Current Password</label>
                        <input type="password" class="form-control" id="currentPassword" name="current_password" >
                    </div>
                    <div class="form-group">
                        <label for="newPassword">New Password</label>
                        <input type="password" class="form-control" id="newPassword" name="password" >
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm New Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" >
                    </div>
                    <button type="submit" id="savePassword" class="btn btn-primary">Save Changes</button>
                </form>
                </div>

            </li>

							</ul>
							
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div><!-- main content -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



    <script>
    $(document).ready(function() {
        $('#savePassword').click(function(e) {
            e.preventDefault(); // Prevent the default form submission behavior

            // Get CSRF token
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Get form data
            var formData = {
                current_password: $('#currentPassword').val(),
                password: $('#newPassword').val(),
                password_confirmation: $('#confirmPassword').val(),
                _token: csrfToken
            };

            // Send AJAX request
            $.ajax({
                url: '{{ route('update.password') }}',
                type: 'PUT',
                data: formData,
                success: function(response) {
                    // Show success toast
                    showToast('success', response.message);
                },
                error: function(xhr, status, error) {
                    // Parse the errors from the response
                    var errors = xhr.responseJSON.errors;

                    // Create an empty string to hold the error messages
                    var errorMessage = '';

                    // Iterate over the errors object and concatenate the error messages
                    for (var key in errors) {
                        errorMessage += errors[key][0] + '<br>';
                    }

                    // Show error toast with the concatenated error messages
                    showToast('error', errorMessage);
                }
            });
        });

        // Function to display toast notifications
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
    });
</script>


    
 <script>
    $(document).ready(function() {

    $('#saveChangesBtn').click(function() {
        // Get CSRF token
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Get form data
        var formData = {
            email: $('#newEmail').val(),
            name: $('#newName').val(),
            _token: csrfToken
        };

        // Send AJAX request
        $.ajax({
            url: '{{ route('update.email.name') }}',
            type: 'PUT',
            data: formData,
            success: function(response) {
                // Show success toast
                showToast('success', response.message);
                $('.users-name h5').text(formData.name);
                $('.users-name span').text(formData.email);
                $('#userName').text(formData.name);

            },
            error: function(xhr, status, error) {
                // Show error toast
                showToast('error', 'An error occurred. Please try again later.');
            }
        });
    });

    // Function to display toast notifications
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
});
 </script>


@endsection