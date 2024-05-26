<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Xchange</title>
    <link rel="icon" href="/frontoffice/images/fav.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="/frontoffice/css/main.min.css">
    <link rel="stylesheet" href="/frontoffice/css/style.css">
    <link rel="stylesheet" href="/frontoffice/css/color.css">
    <link rel="stylesheet" href="/frontoffice/css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if (auth()->check())
        <script src="{{ asset('js/app.js') }}"></script>
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
</head>

<body>
    <div class="page-loader" id="page-loader">
        <div class="loader">
            <span class="loader-item"></span>
            <span class="loader-item"></span>
            <span class="loader-item"></span>
            <span class="loader-item"></span>
            <span class="loader-item"></span>
            <span class="loader-item"></span>
            <span class="loader-item"></span>
            <span class="loader-item"></span>
            <span class="loader-item"></span>
            <span class="loader-item"></span>
        </div>
    </div>
    <!-- page loader -->
    <div class="theme-layout">
        <div class="responsive-header">
            <div class="logo res">
                <img src="/frontoffice/images/logo.png" alt="">
                <a href="{{ route('home') }}"><span>Xchange</span></a>
            </div>
            @if (Auth::check())
                <div class="user-avatar mobile">
                    <a href="profile.html" title="View Profile">
                        @if (Auth::user()->image)
                            <img alt="" src="{{ asset('users/' . Auth::user()->image) }}">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=104d93&color=fff"
                                alt="">
                        @endif
                    </a>
                    <div class="name">
                        <h4>{{ Auth::user()->name }}</h4>
                        <!-- Include location information here if available -->
                        <!-- <span>Ontario, Canada</span> -->
                    </div>
                </div>
            @else
                <div class="user-avatar mobile">
                    <a href="{{ route('login') }}">
                        <i class="fas fa-sign-in-alt"></i>
                        Login
                    </a>
                    <span class="divider">|</span>
                    <a href="{{ route('register') }}">
                        <i class="fa fa-user-plus"></i>
                        Register
                    </a>
                </div>
            @endif
            <div class="right-compact">
                <div class="sidemenu">
                    <i>
                        <svg id="side-menu2" xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg>
                    </i>
                </div>
                <div class="res-search">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-search">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </span>
                </div>
            </div>
            <div class="restop-search">
                <span class="hide-search">
                    <i class="icofont-close-circled"></i>
                </span>
                <form method="post">
                    <input type="text" placeholder="Search...">
                </form>
            </div>
        </div>
        <!-- responsive header -->
        <header class="">
            <div class="topbar stick">
                <div class="logo">
                    <img src="/frontoffice/images/logo.png" alt="">
                    <span>Xchange</span>
                </div>
                <div class="searches">
                    <form id="searchForm" method="POST" action="{{ route('search') }}">
                        @csrf
                        <select id="domain" name="domain" class="form-control">
                            <option value="">Select Domain</option>

                            <option value="Computer science">Computer science</option>
                            <option value="Management/economics">Management/economics</option>
                            <option value="Mechanical">Mechanical</option>
                            <option value="Electric">Electric</option>
                            <option value="Science">Science</option>
                            <option value="Lettre">Lettre</option>
                        </select>

                    </form>
                </div>
                <script>
                    document.getElementById("domain").addEventListener("change", function() {
                        document.getElementById("searchForm").submit();
                    });
                </script>
                <style>
                    #domain {
                        display: block !important;
                    }

                    .chosen-container-single {
                        display: none;
                    }
                </style>
                <ul class="web-elements">
                    @if (Auth::check())
                        <li>
                            <div class="user-dp">
                                <a href="{{ route('Profile_User') }}" title="">
                                    @if (Auth::user()->image)
                                        <img alt="" src="{{ asset('users/' . Auth::user()->image) }}">
                                    @else
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=104d93&color=fff"
                                            height="25px" width="25px" alt="" class="mr-2"
                                            style="border-radius: 50%;">
                                    @endif
                                    <div class="name">
                                        <h4>{{ Auth::user()->name }}</h4>
                                    </div>
                                </a>
                            </div>
                        </li>

                        <li>
                            <a href="{{ route('home') }}" title="Home" data-toggle="tooltip">
                                <i>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                    </svg>
                                </i>
                            </a>
                        </li>
                        <li>
                            <a class="mesg-notif" href="#" title="Messages" data-toggle="tooltip">
                                <i>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-message-square">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                    </svg>
                                </i>
                            </a>
                            <span></span>
                        </li>
                        <li>
                            <a class="mesg-notif" href="#" title="Notifications" data-toggle="tooltip">
                                <i>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                    </svg>
                                </i>
                            </a>
                            <span></span>

                        <li>
                            <a href="#" title="">
                                <i>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
                                        <rect x="3" y="3" width="7" height="7"></rect>
                                        <rect x="14" y="3" width="7" height="7"></rect>
                                        <rect x="14" y="14" width="7" height="7"></rect>
                                        <rect x="3" y="14" width="7" height="7"></rect>
                                    </svg>
                                </i>
                            </a>
                            <ul class="dropdown">
                                <li>
                                    <a href="{{ route('Profile_User') }}" title="">
                                        <i class="icofont-user-alt-3"></i> Your Profile
                                    </a>
                                </li>

                                <li>
                                    <a class="dark-mod" href="#" title="">
                                        <i class="icofont-moon"></i> Dark Mode
                                    </a>
                                </li>
                                <li class="logout">
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                                        title="">
                                        <i class="icofont-power"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li>
                            <div class="user-dp">
                                <a href="{{ route('login') }}">
                                    <i class="fas fa-sign-in-alt"></i>
                                    Login
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="user-dp">
                                <a href="{{ route('register') }}">
                                    <i class="fa fa-user-plus"></i>
                                    Register
                                </a>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </header>
        <!-- header -->
        <nav class="sidebar">
            <ul class="menu-slide">
                <li class="active menu-item-has-children">
                    <a class="" href="#" title="">
                        <i>
                            <svg id="icon-home" class="feather feather-home" stroke-linejoin="round"
                                stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none"
                                viewBox="0 0 24 24" height="14" width="14"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                                <polyline points="9 22 9 12 15 12 15 22" />
                            </svg>
                        </i>
                        Home
                    </a>
                    <ul class="submenu">

                        <li>
                            <a href="profile-page2.html" title="">User Profile</a>
                        </li>


                        <li>
                            <a href="messages.html" title="">Chat/Messages</a>
                        </li>
                        <li>
                            <a href="notifications.html" title="">Notificatioins</a>
                        </li>

                    </ul>
                </li>

            </ul>
        </nav>
        <!-- nav sidebar -->
        <section>
            <div class="white-bg">
                <div class="container-fluid">
                    <div class="menu-caro">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="sidemenu">
                                    <i>
                                        <svg id="side-menu" xmlns="http://www.w3.org/2000/svg" width="26"
                                            height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-menu">
                                            <line x1="3" y1="12" x2="21" y2="12">
                                            </line>
                                            <line x1="3" y1="6" x2="21" y2="6">
                                            </line>
                                            <line x1="3" y1="18" x2="21" y2="18">
                                            </line>
                                        </svg>
                                    </i>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="page-caro">
                                    <div class="link-item">
                                        <a class="active" href="feed.html" title="">
                                            <i class="">
                                                <svg class="feather feather-zap" stroke-linejoin="round"
                                                    stroke-linecap="round" stroke-width="2" stroke="currentColor"
                                                    fill="none" viewBox="0 0 24 24" height="24" width="24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2" />
                                                </svg>
                                            </i>
                                            <p>Newsfeed</p>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            @if (auth()->check())
                                <div class="col-lg-2">
                                    <div class="user-inf">
                                        <div id="followers-count" class="folowerz">Followers: {{ $followingCount }}
                                        </div>
                                    </div>
                                    @php
                                        $followerCount = auth()->user()->abonnes()->count();
                                    @endphp

                                    @if ($followerCount >= 1000)
                                        <ul class="stars">
                                            <li>
                                                <i class="icofont-star"></i>
                                            </li>
                                            <li>
                                                <i class="icofont-star"></i>
                                            </li>
                                            <li>
                                                <i class="icofont-star"></i>
                                            </li>
                                            <li>
                                                <i class="icofont-star"></i>
                                            </li>
                                            <li>
                                                <i class="icofont-star"></i>
                                            </li>
                                        </ul>
                                    @elseif ($followerCount >= 500)
                                        <ul class="stars">
                                            <li>
                                                <i class="icofont-star"></i>
                                            </li>
                                            <li>
                                                <i class="icofont-star"></i>
                                            </li>
                                            <li>
                                                <i class="icofont-star"></i>
                                            </li>
                                        </ul>
                                    @elseif ($followerCount >= 100)
                                        <ul class="stars">
                                            <li>
                                                <i class="icofont-star"></i>
                                            </li>
                                            <li>
                                                <i class="icofont-star"></i>
                                            </li>
                                        </ul>
                                    @endif
                                </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
    </div>
    </section>
    <!-- carousel menu -->
    @yield('content')
    <figure class="bottom-mockup">
        <img src="/frontoffice/images/footer.png" alt="">
    </figure>
    <div class="bottombar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="">&copy; copyright All rights reserved by socimo 2020</span>
                </div>
            </div>
        </div>
    </div>
    <!-- bottombar -->
    <div class="wraper-invite">
        <div class="popup">
            <span class="popup-closed">
                <i class="icofont-close"></i>
            </span>
            <div class="popup-meta">
                <div class="popup-head">
                    <h5>
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                </path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </i> Invite Colleagues
                    </h5>
                </div>
                <div class="invitation-meta">
                    <p>
                        Enter an email address to invite a colleague or co-author to join you on Xchange. They will
                        receive an email and, in some cases, up to two reminders.
                    </p>
                    <form method="post" class="c-form">
                        <input type="text" placeholder="Enter Email">
                        <button type="submit" class="main-btn">Invite</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- invite colleague popup -->
    <div class="popup-wraper">
        <div class="popup">
            <span class="popup-closed">
                <i class="icofont-close"></i>
            </span>
            <div class="popup-meta">
                <div class="popup-head">
                    <h5>
                        <i>
                            <svg class="feather feather-message-square" stroke-linejoin="round"
                                stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none"
                                viewBox="0 0 24 24" height="24" width="24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                            </svg>
                        </i> Send Message
                    </h5>
                </div>
                <div class="send-message">
                    <form method="post" class="c-form">
                        <input type="text" placeholder="Enter Name..">
                        <input type="text" placeholder="Subject">
                        <textarea placeholder="Write Message"></textarea>
                        <div class="uploadimage">
                            <i class="icofont-file-jpg"></i>
                            <label class="fileContainer">
                                <input type="file">
                                Attach file
                            </label>
                        </div>
                        <button type="submit" class="main-btn">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- send message popup -->
    <div class="side-slide">
        <span class="popup-closed">
            <i class="icofont-close"></i>
        </span>
        <div class="slide-meta">
            <ul class="nav nav-tabs slide-btns">
                <li class="nav-item">
                    <a class="active" href="#messages" data-toggle="tab">Messages</a>
                </li>
                <li class="nav-item active">
                    <a class="" href="#notifications" data-toggle="tab">Notifications <span
                            id="notification-count">(0)</span></a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active fade show" id="messages">
                    <h4>
                        <i class="icofont-envelope"></i> Messages
                    </h4>
                    <a href="#" class="send-mesg" title="New Message" data-toggle="tooltip">
                        <i class="icofont-edit"></i>
                    </a>
                    <ul class="new-messages">
                        @foreach ($followingUsers as $user)
                            <li>
                                @if ($user->image)
                                    <figure>
                                        <a href="{{ route('Chat', $user) }}">
                                            <img src="{{ asset('users/' . $user->image) }}" alt="">
                                        </a>
                                    </figure>
                                @else
                                    <figure>
                                        <a href="{{ route('Chat', $user) }}">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=104d93&color=fff"
                                                height="25px" width="25px" alt="" class="mr-2"
                                                style="border-radius: 50%;">
                                        </a>
                                    </figure>
                                @endif
                                <div class="mesg-info">
                                    <span>{{ $user->name }}</span>
                                    @php
                                        $lastMessage = \App\Models\Chats::where('sender_id', $user->id)
                                            ->orWhere('receiver_id', $user->id)
                                            ->orderBy('created_at', 'desc')
                                            ->first();
                                    @endphp
                                    @if ($lastMessage)
                                        <a href="{{ route('Chat', $user) }}"
                                            title="">{{ $lastMessage->message }}</a>
                                    @else
                                        <span>No messages yet</span>
                                    @endif
                                </div>
                            </li>
                        @endforeach

                    </ul>


                </div>
                <div class="tab-pane fade" id="notifications">
                    <h4>
                        <i class="icofont-bell-alt"></i> Notifications
                    </h4>
                    <div class="notification-container">
                        <ul class="notificationz">
                            <!-- Notification items will be appended here -->
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <style>
        .notification-container {
            max-height: 550px;
            /* Adjust the maximum height as needed */
            overflow-y: auto;
            /* Enable vertical scrolling */
        }

        .notificationz {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .notificationz li {
            display: flex;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            /* Add a border between notification items */
        }

        .notificationz li:last-child {
            border-bottom: none;
            /* Remove border for the last notification item */
        }

        .notificationz li figure {
            margin-right: 10px;
        }

        .notificationz li img {
            width: 40px;
            /* Adjust image size as needed */
            height: 40px;
            /* Adjust image size as needed */
            border-radius: 50%;
            /* Make the image round */
        }

        .notificationz li .mesg-info {
            flex: 1;
        }

        .notificationz li .mesg-info a {
            color: #333;
            text-decoration: none;
            font-weight: bold;
        }

        .notificationz li .timestamp {
            color: #999;
            font-size: 12px;
            margin-left: 10px;
        }

        .notificationz li .delete-notification-btn {
            background: none;
            border: none;
            color: #999;
            cursor: pointer;
            margin-left: auto;
        }

        .notificationz li .delete-notification-btn:hover {
            color: #f00;
            /* Change color on hover */
        }
    </style>
    <!-- side slide message & popup -->

    <div class="new-question-popup">
        <div class="popup">
            <span class="popup-closed">
                <i class="icofont-close"></i>
            </span>
            <div class="popup-meta">
                <div class="popup-head">
                    <h5>
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-help-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                                <line x1="12" y1="17" x2="12.01" y2="17"></line>
                            </svg>
                        </i> Ask Question
                    </h5>
                </div>
                <div class="post-new">
                    <form method="post" class="c-form">
                        <input type="text" placeholder="Question Title">
                        <textarea placeholder="Write Question"></textarea>
                        <select>
                            <option>Select Your Question Type</option>
                            <option>Article</option>
                            <option>Book</option>
                            <option>Chapter</option>
                            <option>Code</option>
                            <option>conference Paper</option>
                            <option>Cover Page</option>
                            <option>Data</option>
                            <option>Exprement Finding</option>
                            <option>Method</option>
                            <option>Poster</option>
                            <option>Preprint</option>
                            <option>Technicial Report</option>
                            <option>Thesis</option>
                            <option>Research</option>
                        </select>
                        <div class="uploadimage">
                            <i class="icofont-eye-alt-alt"></i>
                            <label class="fileContainer">
                                <input type="file">
                                Upload File
                            </label>
                        </div>
                        <button type="submit" class="main-btn">Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ask question -->
    <!-- <div class="auto-popup">
   <div class="popup-innner">
    <div class="popup-head">
     <h4>We want to hear from you!</h4>
    </div>
    <div class="popup-meta">
     <span>What are you struggling with right now? what we can help you with?</span>
     <form method="post" class="inquiry-about">
      <input type="text" placeholder="Your Answer">
      <h5>How did you hear about us?</h5>
      <label><input type="radio" name="hear"> Facebook</label>
      <label><input type="radio" name="hear"> instagram</label>
      <label><input type="radio" name="hear"> Google Search</label>
      <label><input type="radio" name="hear"> Twitter</label>
      <label><input type="radio" name="hear"> Whatsapp</label>
      <label><input type="radio" name="hear"> Other</label>
      <input type="text" placeholder="Writh Other">
      <button type="submit" class="primary button">Submit</button>
      <button class="canceled button outline-primary" type="button">Cancel</button>
     </form>
    </div>
   </div>
  </div>  -->
    <div class="share-wraper">
        <div class="share-options">
            <span class="close-btn">
                <i class="icofont-close-circled"></i>
            </span>
            <h5>
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-share">
                        <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path>
                        <polyline points="16 6 12 2 8 6"></polyline>
                        <line x1="12" y1="2" x2="12" y2="15"></line>
                    </svg>
                </i>Share To!
            </h5>
            <form method="post">
                <textarea placeholder="Write Something"></textarea>
            </form>
            <ul>
                <li>
                    <a title="" href="#">Your Timeline</a>
                </li>
                <li class="friends">
                    <a title="" href="#">To Friends</a>
                </li>
                <li class="socialz">
                    <a class="active" title="" href="#">Social Media</a>
                </li>
            </ul>
            <div style="display: block;" class="social-media">
                <ul>
                    <li>
                        <a title="" href="#" class="facebook">
                            <i class="icofont-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a title="" href="#" class="twitter">
                            <i class="icofont-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a title="" href="#" class="instagram">
                            <i class="icofont-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a title="" href="#" class="pinterest">
                            <i class="icofont-pinterest"></i>
                        </a>
                    </li>
                    <li>
                        <a title="" href="#" class="youtube">
                            <i class="icofont-youtube"></i>
                        </a>
                    </li>
                    <li>
                        <a title="" href="#" class="dribble">
                            <i class="icofont-dribbble"></i>
                        </a>
                    </li>
                    <li>
                        <a title="" href="#" class="behance">
                            <i class="icofont-behance-original"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div style="display: none;" class="friends-to">
                <div class="follow-men">
                    <figure>
                        <img class="mCS_img_loaded" src="/frontoffice/images/resources/user1.jpg" alt="">
                    </figure>
                    <div class="follow-meta">
                        <h5>
                            <a href="#" title="">Jack Carter</a>
                        </h5>
                        <span>family member</span>
                    </div>
                    <a href="#" title="">Share</a>
                </div>
                <div class="follow-men">
                    <figure>
                        <img class="mCS_img_loaded" src="/frontoffice/images/resources/user2.jpg" alt="">
                    </figure>
                    <div class="follow-meta">
                        <h5>
                            <a href="#" title="">Xang Ching</a>
                        </h5>
                        <span>Close Friend</span>
                    </div>
                    <a href="#" title="">Share</a>
                </div>
                <div class="follow-men">
                    <figure>
                        <img class="mCS_img_loaded" src="/frontoffice/images/resources/user3.jpg" alt="">
                    </figure>
                    <div class="follow-meta">
                        <h5>
                            <a href="#" title="">Emma Watson</a>
                        </h5>
                        <span>Matul Friend</span>
                    </div>
                    <a href="#" title="">Share</a>
                </div>
            </div>
            <button type="submit" class="main-btn">Publish</button>
        </div>
    </div>

    <!-- chat button -->
    <div class="chat-box">
        <div class="chat-head">
            <h4>New Messages</h4>
            <span class="clozed">
                <i class="icofont-close-circled"></i>
            </span>
            <form Method="post">
                <input type="text" placeholder="To..">
            </form>
        </div>
        <div class="user-tabs">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="active" href="#link1" data-toggle="tab">All Friends</a>
                </li>
                <li class="nav-item">
                    <a class="" href="#link2" data-toggle="tab">Active</a>
                    <em>3</em>
                </li>
                <li class="nav-item">
                    <a class="" href="#link3" data-toggle="tab">Groups</a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active fade show " id="link1">
                    <div class="friend">
                        <a href="#" title="">
                            <figure>
                                <img src="/frontoffice/images/resources/user1.jpg" alt="">
                                <span class="status online"></span>
                            </figure>
                            <span>Oliver</span>
                            <i class="">
                                <img src="/frontoffice/images/resources/user1.jpg" alt="">
                            </i>
                        </a>
                        <a href="#" title="">
                            <figure>
                                <img src="/frontoffice/images/resources/user2.jpg" alt="">
                                <span class="status away"></span>
                            </figure>
                            <span>Amelia</span>
                            <i class="icofont-check-circled"></i>
                        </a>
                        <a href="#" title="">
                            <figure>
                                <img src="/frontoffice/images/resources/user3.jpg" alt="">
                                <span class="status offline"></span>
                            </figure>
                            <span>George</span>
                            <i class="">
                                <img src="/frontoffice/images/resources/user3.jpg" alt="">
                            </i>
                        </a>
                        <a href="#" title="">
                            <figure>
                                <img src="/frontoffice/images/resources/user4.jpg" alt="">
                                <span class="status online"></span>
                            </figure>
                            <span>Jacob</span>
                            <i class="icofont-check-circled"></i>
                        </a>
                        <a href="#" title="">
                            <figure>
                                <img src="/frontoffice/images/resources/user5.jpg" alt="">
                                <span class="status away"></span>
                            </figure>
                            <span>Poppy</span>
                            <i class="icofont-check-circled"></i>
                        </a>
                        <a href="#" title="">
                            <figure>
                                <img src="/frontoffice/images/resources/user6.jpg" alt="">
                                <span class="status online"></span>
                            </figure>
                            <span>Sophia</span>
                            <i class="">
                                <img src="/frontoffice/images/resources/user6.jpg" alt="">
                            </i>
                        </a>
                        <a href="#" title="">
                            <figure>
                                <img src="/frontoffice/images/resources/user7.jpg" alt="">
                                <span class="status away"></span>
                            </figure>
                            <span>Leo king</span>
                            <i class="">
                                <img src="/frontoffice/images/resources/user7.jpg" alt="">
                            </i>
                        </a>
                    </div>
                </div>
                <div class="tab-pane fade" id="link2">
                    <div class="friend">
                        <a href="#" title="">
                            <figure>
                                <img src="/frontoffice/images/resources/user1.jpg" alt="">
                                <span class="status online"></span>
                            </figure>
                            <span>Samu Jane</span>
                            <i class="">
                                <img src="/frontoffice/images/resources/user1.jpg" alt="">
                            </i>
                        </a>
                        <a href="#" title="">
                            <figure>
                                <img src="/frontoffice/images/resources/user6.jpg" alt="">
                                <span class="status online"></span>
                            </figure>
                            <span>Tina Mark</span>
                            <i class="">
                                <img src="/frontoffice/images/resources/user6.jpg" alt="">
                            </i>
                        </a>
                        <a href="#" title="">
                            <figure>
                                <img src="/frontoffice/images/resources/user7.jpg" alt="">
                                <span class="status online"></span>
                            </figure>
                            <span>Ak William</span>
                            <i class="">
                                <img src="/frontoffice/images/resources/user7.jpg" alt="">
                            </i>
                        </a>
                    </div>
                </div>
                <div class="tab-pane fade" id="link3">
                    <div class="friend">
                        <a href="#" title="">
                            <figure class="group-chat">
                                <img src="/frontoffice/images/resources/user5.jpg" alt="">
                                <img class="two" src="/frontoffice/images/resources/user3.jpg" alt="">
                                <span class="status online"></span>
                            </figure>
                            <span>Boys World</span>
                            <i class="icofont-check-circled"></i>
                        </a>
                        <a href="#" title="">
                            <figure class="group-chat">
                                <img src="/frontoffice/images/resources/user2.jpg" alt="">
                                <img class="two" src="/frontoffice/images/resources/user3.jpg" alt="">
                                <span class="status online"></span>
                            </figure>
                            <span>KK university Fellows</span>
                            <i class="icofont-check-circled"></i>
                        </a>
                        <a href="#" title="">
                            <figure class="group-chat">
                                <img src="/frontoffice/images/resources/user3.jpg" alt="">
                                <img class="two" src="/frontoffice/images/resources/user2.jpg" alt="">
                                <span class="status away"></span>
                            </figure>
                            <span>Education World</span>
                            <i class="icofont-check-circled"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="chat-card">
            <div class="chat-card-head">
                <img src="/frontoffice/images/resources/user13.jpg" alt="">
                <h6>George Floyd</h6>
                <div class="frnd-opt">
                    <div class="more">
                        <div class="more-post-optns">
                            <i class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-more-horizontal">
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="19" cy="12" r="1"></circle>
                                    <circle cx="5" cy="12" r="1"></circle>
                                </svg>
                            </i>
                            <ul>
                                <li>
                                    <i class="icofont-pen-alt-1"></i>
                                    Edit Post
                                    <span>Edit This Post within a Hour</span>
                                </li>
                                <li>
                                    <i class="icofont-ban"></i>
                                    Hide Chat
                                    <span>Hide This Post</span>
                                </li>
                                <li>
                                    <i class="icofont-ui-delete"></i>
                                    Delete Chat
                                    <span>If inappropriate Post By Mistake</span>
                                </li>
                                <li>
                                    <i class="icofont-flag"></i>
                                    Report
                                    <span>Inappropriate Chat</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <span class="close-mesage">
                        <i class="icofont-close"></i>
                    </span>
                </div>
            </div>
            <div class="chat-list">
                <ul>
                    <li class="me">
                        <div class="chat-thumb">
                            <img src="/frontoffice/images/resources/chatlist1.jpg" alt="">
                        </div>
                        <div class="notification-event">
                            <div class="chat-message-item">
                                <figure>
                                    <img src="/frontoffice/images/resources/album5.jpg" alt="">
                                </figure>
                                <div class="caption">4.5kb
                                    <i class="icofont-download" title="Download"></i>
                                </div>
                            </div>
                            <span class="notification-date">
                                <time datetime="2004-07-24T18:18" class="entry-date updated">
                                    Yesterday at
                                    8:10pm
                                </time>
                                <i>
                                    <img src="/frontoffice/images/d-tick.png" alt="">
                                </i>
                            </span>
                        </div>
                    </li>
                    <li class="me">
                        <div class="chat-thumb">
                            <img src="/frontoffice/images/resources/chatlist1.jpg" alt="">
                        </div>
                        <div class="notification-event">
                            <span class="chat-message-item">
                                Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the
                                gifts and Jake’s gonna get the drinks
                            </span>
                            <span class="notification-date">
                                <time datetime="2004-07-24T18:18" class="entry-date updated">
                                    Yesterday at
                                    8:10pm
                                </time>
                                <i>
                                    <img src="/frontoffice/images/d-tick.png" alt="">
                                </i>
                            </span>
                        </div>
                    </li>
                    <li class="you">
                        <div class="chat-thumb">
                            <img src="/frontoffice/images/resources/chatlist2.jpg" alt="">
                        </div>
                        <div class="notification-event">
                            <span class="chat-message-item">
                                Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the
                                gifts and Jake’s gonna get the drinks
                            </span>
                            <span class="notification-date">
                                <time datetime="2004-07-24T18:18" class="entry-date updated">
                                    Yesterday at
                                    8:10pm
                                </time>
                                <i>
                                    <img src="/frontoffice/images/d-tick.png" alt="">
                                </i>
                            </span>
                        </div>
                    </li>
                    <li class="me">
                        <div class="chat-thumb">
                            <img src="/frontoffice/images/resources/chatlist1.jpg" alt="">
                        </div>
                        <div class="notification-event">
                            <span class="chat-message-item">
                                Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the
                                gifts and Jake’s gonna get the drinks
                            </span>
                            <span class="notification-date">
                                <time datetime="2004-07-24T18:18" class="entry-date updated">
                                    Yesterday at
                                    8:10pm
                                </time>
                                <i>
                                    <img src="/frontoffice/images/d-tick.png" alt="">
                                </i>
                            </span>
                        </div>
                    </li>
                </ul>
                <form class="text-box">
                    <textarea placeholder="Write Mesage..."></textarea>
                    <div class="add-smiles">
                        <span>
                            <img src="/frontoffice/images/smiles/happy-3.png" alt="">
                        </span>
                    </div>
                    <div class="smiles-bunch">
                        <i>
                            <img src="/frontoffice/images/smiles/thumb.png" alt="">
                        </i>
                        <i>
                            <img src="/frontoffice/images/smiles/angry-1.png" alt="">
                        </i>
                        <i>
                            <img src="/frontoffice/images/smiles/angry.png" alt="">
                        </i>
                        <i>
                            <img src="/frontoffice/images/smiles/bored-1.png" alt="">
                        </i>
                        <i>
                            <img src="/frontoffice/images/smiles/confused-1.png" alt="">
                        </i>
                        <i>
                            <img src="/frontoffice/images/smiles/wink.png" alt="">
                        </i>
                        <i>
                            <img src="/frontoffice/images/smiles/weep.png" alt="">
                        </i>
                        <i>
                            <img src="/frontoffice/images/smiles/tongue-out.png" alt="">
                        </i>
                        <i>
                            <img src="/frontoffice/images/smiles/suspicious.png" alt="">
                        </i>
                        <i>
                            <img src="/frontoffice/images/smiles/crying-1.png" alt="">
                        </i>
                        <i>
                            <img src="/frontoffice/images/smiles/crying.png" alt="">
                        </i>
                        <i>
                            <img src="/frontoffice/images/smiles/embarrassed.png" alt="">
                        </i>
                        <i>
                            <img src="/frontoffice/images/smiles/emoticons.png" alt="">
                        </i>
                        <i>
                            <img src="/frontoffice/images/smiles/happy-2.png" alt="">
                        </i>
                    </div>
                    <button type="submit">
                        <i class="icofont-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- chat box -->
    <div class="createroom-popup">
        <div class="popup">
            <span class="popup-closed">
                <i class="icofont-close"></i>
            </span>
            <div class="popup-meta">
                <div class="popup-head text-center">
                    <h5 class="only-icon">
                        <i class="icofont-video-cam"></i>
                    </h5>
                </div>
                <div class="room-meta">
                    <h4>Create Your Room</h4>
                    <ul>
                        <li>
                            <i class="icofont-hand"></i>
                            <div>
                                <h6>Room Activity</h6>
                                <span>Jack's Room</span>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" id="checkbox3">
                                <label for="checkbox3"></label>
                            </div>
                        </li>
                        <li>
                            <i class="icofont-clock-time"></i>
                            <div>
                                <h6>Start Time</h6>
                                <span>Now</span>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" id="checkbox4">
                                <label for="checkbox4"></label>
                            </div>
                        </li>
                        <li>
                            <i class="icofont-users-alt-4"></i>
                            <div>
                                <h6>Invite to All Friends</h6>
                                <span>Allow All friends to see this room</span>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" id="checkbox5">
                                <label for="checkbox5"></label>
                            </div>
                        </li>
                    </ul>
                    <span>Your room isn't visible until you invite people after you've created it.</span>
                    <a href="#" title="" class="main-btn full-width">Create Room</a>
                </div>
            </div>
        </div>
    </div>
    <!-- create new room -->

    <!-- The Scrolling Modal image with comment -->
    </div>
    <script src="/frontoffice/js/main.min.js"></script>
    <!-- vendors merged files -->
    <script src="/frontoffice/js/date-time.js"></script>
    <script src="/frontoffice/js/script.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- custom scripts -->
    @if (auth()->check())
        <script>
            let notificationCount = 0; // Initialize notification count

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
                        break;
                    case 'warning':
                        toastr.warning(message);
                        break;
                    case 'error':
                        toastr.error(message);
                        break;
                }
            }

            function deleteNotification(notificationId, element) {

                console.log(notificationId);
                $.ajax({
                    url: "{{ route('notifications.delete') }}",
                    type: "DELETE",
                    data: {
                        notification_id: notificationId
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        var audio = new Audio('audio.wav');
                        audio.play();
                        // Find the parent li element and remove it
                        $(element).closest('li').remove();
                        fetchNotifications();
                        showToast('success', response.message); // Show success toast
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        showToast('error', "Failed to delete notification"); // Show error toast
                    }
                });
            }

            // Function to fetch notifications via AJAX
            function fetchNotifications() {
                $.ajax({
                    url: "{{ route('notifications.fetch') }}",
                    type: "GET",
                    success: function(response) {
                        const notifications = response.notifications;
                        const notificationList = $('.notificationz');
                        notificationList.empty(); // Clear existing notifications
                        notificationCount = notifications.length; // Update notification count
                        $('#notification-count').text(`(${notificationCount})`);
                        notifications.forEach(function(notification) {
                            const createdAt = moment(notification.created_at).fromNow();
                            const notificationItem = `
                        <li>
                            <figure>
                                <img src="${notification.imageurl ? 'users/' + notification.imageurl : 'https://ui-avatars.com/api/?name=' + encodeURIComponent(notification.username) + '&background=104d93&color=fff'}" alt="">
                            </figure>
                            <div class="mesg-info">
                                <span>${notification.username}</span>
                                <a href="#" title="">${notification.data}</a>
                                <span class="timestamp" data-timestamp="${notification.created_at}">${createdAt}</span>
                                <button class="delete-notification-btn" onclick="deleteNotification(${notification.id}, this)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </li>
                    `;
                            notificationList.append(notificationItem);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            // Call fetchNotifications when the page is ready
            $(document).ready(function() {
                fetchNotifications();
            });

            // Listen for PrivateChannelUser event
            const userId = '{{ Auth::id() }}'; // Get the authenticated user's ID
            const echo = window.Echo.private(`private-channel.user.${userId}`);

            echo.listen('.App\\Events\\PrivateChannelUser', (e) => {
                // Append the received message to the notifications div
                notificationCount++; // Increment notification count
                $('#notification-count').text(`(${notificationCount})`);
                const notificationList = $('.notificationz');

                // Get current timestamp
                const createdAt = moment().fromNow();

                const imageUrl = e.imageUrl ? 'users/' + e.imageUrl : 'https://ui-avatars.com/api/?name=' +
                    encodeURIComponent(e.username) + '&background=104d93&color=fff';

                const notificationItem = `
            <li>
                <figure>
                    <img src="${imageUrl}" alt="">
                </figure>
                <div class="mesg-info">
                    <span>${e.username}</span>
                    <a href="#" title="">${e.message}</a>
                    <span class="timestamp" data-timestamp="${moment()}">${createdAt}</span>
                    <button class="delete-notification-btn" onclick="deleteNotification(${e.idNotifications}, this)">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </li>
        `;
                notificationList.prepend(notificationItem); // Prepend new notifications
                var audio = new Audio('audio.wav');
                audio.play();
            });
        </script>
    @endif

</body>

</html>
