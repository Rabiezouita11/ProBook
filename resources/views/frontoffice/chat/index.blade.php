@extends('frontoffice.layouts.index')

@section('content')
<section>
    <div class="gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row merged20">
                        <div class="col-lg-8">
                            <div class="main-wraper">
                                <h3 class="main-title">Messages</h3>
                                <div class="message-box">
                                    <div class="message-content">
                                        <div class="chat-content">
                                           
                                            <ul class="chatting-area" id="chatting-area">
                                                <!-- Check if messages are available -->
                                                @if(count($messages) > 0)
                                                    <!-- Existing messages will be here -->
                                                    @foreach($messages as $message)
                                                    <li class="{{ $message->sender_id == Auth::id() ? 'me' : 'you' }}">
                                                        <figure>
                                                            <img alt="" src="{{ $message->sender_id == Auth::id() ? (Auth::user()->image ? asset('users/' . Auth::user()->image) : 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&background=104d93&color=fff') : ($user->image ? asset('users/' . $user->image) : 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&background=104d93&color=fff') }}" height="50px" width="50px">
                                                        </figure>
                                                        <p>{{ $message->message }}</p>
                                                    </li>
                                                    @endforeach
                                                @else
                                                    <!-- Display a message when there are no messages -->
                                                    <li style="text-align: center">No messages available</li>
                                                @endif
                                            </ul>

                                            <div class="message-text-container">
                                                <div class="more-attachments">
                                                    <i class="icofont-plus"></i>
                                                </div>
                                                <div class="attach-options">
                                                    <a href="#" title=""><i class="icofont-camera"></i> Open Camera</a>
                                                    <a href="#" title=""><i class="icofont-video-cam"></i> Photo & video Library</a>
                                                    <a href="#" title=""><i class="icofont-paper-clip"></i> Attach Document</a>
                                                    <a href="#" title=""><i class="icofont-location-pin"></i> Share Location</a>
                                                    <a href="#" title=""><i class="icofont-contact-add"></i> Share Contact</a>
                                                </div>
                                                <form id="message-form">
                                                
                                                    <textarea rows="1" placeholder="say something..." id="message-input"></textarea>
                                                    <button type="submit" title="send"><i class="icofont-paper-plane"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="profile-short">
                                <div class="chating-head">
                                    <div class="s-left">
                                        <h5>{{ $user->name }}</h5>
                                        <p>{{ $user->location }}</p>
                                    </div>
                                </div>
                                <div class="short-intro">
                                    @if ($user->image)
                                        <figure>
                                            <img alt="" src="{{ asset('users/' . $user->image) }}" height="50px" width="50px">
                                        </figure>
                                    @else
                                        <figure>
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=104d93&color=fff" alt="" height="50px" width="50px">
                                        </figure>
                                    @endif
                                    <ul>
                                        <li>
                                            <span>Display Name</span>
                                            <p>{{ $user->name }}</p>
                                        </li>
                                        <li>
                                            <span>Email Address</span>
                                            <p>{{ $user->email }}</p>
                                        </li>
                                        <li>
                                            <span>date of birth</span>
                                            <p>{{ $user->date_of_birth }}</p>
                                        </li>
                                        <li>
                                            <span>Institut</span>
                                            <p>{{ $user->institut }}</p>
                                        </li>
                                        <li>
                                            <span>diploma</span>
                                            <p>{{ $user->diploma }}</p>
                                        </li>
                                    </ul>
                                    <a class="button primary circle" href="{{ route('profile.show', $user) }}" title="">view Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<style>
    .post {
        display: none;
    }
</style>
<script>
    function showToast(type, message) {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            hideMethod: 'slideUp',
            timeOut: 5000,
        };

        switch (type) {
            case 'info':
                toastr.info(message);
                break;
            case 'success':
                toastr.success(message);
                break;
            case 'warning':
                toastr.warning(message);
                break;
            case 'error':
                toastr.error(message);
                break;
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const messageForm = document.getElementById('message-form');
        const messageInput = document.getElementById('message-input');
        const chattingArea = document.getElementById('chatting-area');
        const userId = '{{ Auth::id() }}'; // Get the authenticated user's ID

        function appendMessage(message, sender) {
            const li = document.createElement('li');
            li.classList.add(sender);
            li.innerHTML = `
                <figure><img src="${sender === 'me' ? '{{ Auth::user()->image ? asset('users/' . Auth::user()->image) : "https://ui-avatars.com/api/?name=" . urlencode(Auth::user()->name) . "&background=104d93&color=fff" }}' : '{{ $user->image ? asset('users/' . $user->image) : "https://ui-avatars.com/api/?name=" . urlencode($user->name) . "&background=104d93&color=fff" }}'}" alt=""></figure>
                <p>${message}</p>
            `;
            chattingArea.appendChild(li);
            chattingArea.scrollTop = chattingArea.scrollHeight;

        }

        messageForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const message = messageInput.value;
            axios.post('/send-message', {
                message: message,
                to_user_id: {{ $user->id }} // ID of the user to whom the message is sent
            }).then(response => {
                messageInput.value = '';
                showToast('success', 'Message sent successfully!');
                appendMessage(message, 'me');
            }).catch(error => {
                console.error(error);
                showToast('error', 'Failed to send the message.');
            });
        });

        // Initialize Echo to listen for MessageSent event
        const echo = window.Echo.private(`chat.user.${userId}`);
        echo.listen('.App\\Events\\MessageSent', (e) => {

            if ((e.senderId == {{ $user->id }} && e.receiverId == {{ Auth::id() }}) || (e.senderId == {{ Auth::id() }} && e.receiverId == {{ $user->id }})) {

            console.log('Message received:', e);
            // Handle the incoming message (display it in the chat UI)
            appendMessage(e.message, 'you');
            showToast('info', e.message);
        }
        });
    });
</script>
@endsection
