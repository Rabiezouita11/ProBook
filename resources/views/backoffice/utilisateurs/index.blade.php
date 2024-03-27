@extends('backoffice.layouts.index')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-content">
                <div class="row merged20 mb-4">
                    <div class="col-lg-12">
                        <div class="d-widget">
                            <div class="d-widget-title">
                                <h5>Manage Users</h5>
                            </div>
                            <div class="d-widget-content">
                                <table class="table manage-user table-default table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th> nom Utilisateur</th>
                                            <th>Email</th>
                                            <th>Blocked</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($utilisateurs->isEmpty())
                                            <tr>
                                                <td colspan="3" class="text-center">No data available</td>
                                            </tr>
                                        @else
                                            @foreach($utilisateurs as $utilisateur)
                                                <tr>
                                                    <td>
                                                        <figure>
                                                            @if($utilisateur->image)
                                                                <img src="{{ asset('users/' . $utilisateur->image) }}" alt="{{ $utilisateur->name }}">
                                                            @else
                                                                <img src="https://ui-avatars.com/api/?name={{ urlencode($utilisateur->name) }}&background=104d93&color=fff" alt="{{ $utilisateur->name }}">
                                                            @endif
                                                        </figure>
                                                        <h5>{{$utilisateur->name}}</h5>
                                                    </td>
                                                    <td>{{$utilisateur->email}}</td>
                                                    <td>
                                                        <div class="switch-btn">
                                                            <input type="checkbox" hidden="hidden" id="switch{{ $utilisateur->id }}" @if($utilisateur->blocked) checked @endif onclick="toggleBlock({{ $utilisateur->id }})">
                                                            <label class="switch" for="switch{{ $utilisateur->id }}"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                
                                {{ $utilisateurs->links('vendor.pagination.default') }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    function toggleBlock(userId) {
        fetch(`/users/${userId}/toggle-block`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Show success toast
            showToast('success', data.message);
            console.log(data.message);
        })
        .catch(error => {
            // Show error toast or handle error
            showToast('error', 'An error occurred. Please try again later.');
            console.error('There was an error!', error);
        });
    }

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
                var audio = new Audio('audio.mp3');
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

@endsection
