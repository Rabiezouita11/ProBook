@extends('backoffice.layouts.index')

@section('content')
<style>
    .message-cell {
        max-width: 200px; /* Adjust width as needed */
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        cursor: pointer;
    }

    /* Modal styles */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%; /* Adjust as needed */
        max-width: 600px; /* Adjust as needed */
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style><div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-content">
                <div class="row merged20 mb-4">
                    <div class="col-lg-12">
                        <div class="d-widget">
                            <div class="d-widget-title">
                                <h5>Manage Contacts</h5>
                            </div>
                            <div class="d-widget-content">
                                <table class="table manage-user table-default table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User Image</th>
                                            <th>Email</th>
                                            <th>Name</th>
                                            <th>Message</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($contacts->isEmpty())
                                        <tr>
                                            <td colspan="5" class="text-center">No contacts available</td>
                                        </tr>
                                    @else
                                        @foreach($contacts as $contact)
                                            <tr>
                                                <td>{{$contact->id}}</td>
                                                <td>
                                                    <figure>
                                                        @if($contact->user->image)
                                                            <img src="{{ asset('users/' . $contact->user->image) }}" alt="{{ $contact->user->name }}">
                                                        @else
                                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($contact->user->name) }}&background=104d93&color=fff" alt="{{ $contact->user->name }}">
                                                        @endif
                                                    </figure>
                                                </td>
                                                <td>{{$contact->user->email}}</td>
                                                <td>{{$contact->user->name}}</td>
                                                <td>
                                                    <div id="message-{{$contact->id}}" class="message-cell" onclick="openModal({{ $contact->id }})">
                                                        {{ Str::limit($contact->message, 50) }} <!-- Display limited text here -->
                                                    </div>
                                                    <div id="full-message-{{$contact->id}}" style="display:none;">
                                                        {{ $contact->message }} <!-- Store full message -->
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>

                                {{ $contacts->links('vendor.pagination.default') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal HTML -->
<div id="messageModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <textarea id="modalMessage" rows="10" cols="50" readonly></textarea>
    </div>
</div>

<script>
    function openModal(contactId) {
        var modal = document.getElementById("messageModal");
        var modalMessage = document.getElementById("modalMessage");
        var fullMessage = document.getElementById(`full-message-${contactId}`).textContent;

        modalMessage.value = fullMessage;
        modal.style.display = "block";
    }

    function closeModal() {
        var modal = document.getElementById("messageModal");
        modal.style.display = "none";
    }

    // Close the modal when clicking outside of it
    window.onclick = function(event) {
        var modal = document.getElementById("messageModal");
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
@endsection
