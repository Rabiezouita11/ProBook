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

    function showToast(type, message) {
        // Example toast implementation, you can use a library like Toastify.js or customize this function
        // This is a basic implementation using Bootstrap classes
        const toast = document.createElement('div');
        toast.classList.add('toast', `toast-${type}`, 'show', 'fw-bold');
        toast.setAttribute('role', 'alert');
        toast.setAttribute('aria-live', 'assertive');
        toast.setAttribute('aria-atomic', 'true');
        toast.style.width = '400px'; // Set custom width
        toast.style.maxHeight = '100px'; // Set custom max height
        toast.style.overflow = 'auto'; // Allow scrolling if needed
        toast.innerHTML = `
            <div class="toast-body">
                ${message}
            </div>
        `;
        document.body.appendChild(toast);
        $(toast).toast('show');
    }
</script>


@endsection