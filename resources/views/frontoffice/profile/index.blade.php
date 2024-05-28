@extends('frontoffice.layouts.index')

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <div class="gap no-gap">
        <div class="top-area mate-black low-opacity">
            <div class="bg-image"
                style="background-image: url('{{ Auth::user()->cover_photo ? asset('cover_photos/' . Auth::user()->cover_photo) : null }}')">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="post-subject">
                            <div class="university-tag">

                                @if (Auth::user()->image)
                                    <figure><img src="{{ asset('users/' . Auth::user()->image) }}" alt=""></figure>
                                @else
                                    <figure><img
                                            src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=104d93&color=fff"
                                            alt=""></figure>
                                @endif

                                <div class="uni-name">
                                    <h4>{{ Auth::user()->name }} </h4>
                                    <span>@ {{ Auth::user()->name }}</span>
                                </div>

                            </div>

                            <ul class="nav nav-tabs post-detail-btn">
                                <li class="nav-item"><a class="active" href="#timeline" data-toggle="tab">Timeline</a></li>

                                <li class="nav-item"><a class="" href="#follow" data-toggle="tab">Follow</a><span
                                        id="following-count">{{ $followingCount }}</span>
                                </li>

                                <li class="nav-item"><a class="" href="#profile" data-toggle="tab">Profile</a></li>
                                <li class="nav-item"><a class="" href="#Changerpassword" data-toggle="tab">Change
                                        Password
                                    </a></li>

                                <!-- Added Profile tab -->

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- top Head -->

    <section>
        <div class="gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="page-contents" class="row merged20">
                            <div class="col-lg-8">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="timeline">
                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                        <div class="main-wraper">
                                            <span class="new-title">Create New Post</span>
                                            <div class="new-post">
                                                <form method="post">
                                                    <i class="icofont-pen-alt-1"></i>
                                                    <input type="text" placeholder="Create New Post">
                                                </form>

                                            </div>
                                        </div><!-- create new post -->
                                        <div class="container" id="post-container">
                                            <!-- Your existing publication HTML here -->
                                        </div>
                                        @if ($publications->isEmpty())
                                            <div class="container" id="unique-container"
                                                style="text-align: center; font-size: 30px; font-weight: bold;">
                                                <p>No posts found.</p>
                                            </div>
                                        @else
                                            @foreach ($publications as $publication)
                                                <div class="main-wraper unique-class"
                                                    id="publication-{{ $publication->id }}">
                                                    <div class="user-post">
                                                        <div class="friend-info">
                                                            <figure>
                                                                @if ($publication->user_abonner_id == auth()->id())
                                                                    @if ($publication->user->image)
                                                                        <img
                                                                            src="{{ asset('users/' . $publication->user->image) }}">
                                                                    @else
                                                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($publication->user->name) }}&background=104d93&color=fff"
                                                                            height="25px" width="25px" alt=""
                                                                            class="mr-2" style="border-radius: 50%;">
                                                                    @endif
                                                                @else
                                                                    @if (Auth::user()->image)
                                                                        <img
                                                                            src="{{ asset('users/' . Auth::user()->image) }}">
                                                                    @else
                                                                        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=104d93&color=fff"
                                                                            height="25px" width="25px" alt=""
                                                                            class="mr-2" style="border-radius: 50%;">
                                                                    @endif
                                                                @endif
                                                            </figure>


                                                            <div class="friend-name">
                                                                <div class="more">
                                                                    @if ($publication->user->id == Auth::user()->id)
                                                                        <div class="more-post-optns">
                                                                            <i class="">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    stroke="currentColor" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    class="feather feather-more-horizontal">
                                                                                    <circle cx="12" cy="12"
                                                                                        r="1">
                                                                                    </circle>
                                                                                    <circle cx="19" cy="12"
                                                                                        r="1"></circle>
                                                                                    <circle cx="5" cy="12"
                                                                                        r="1"></circle>
                                                                                </svg>
                                                                            </i>
                                                                            <ul>
                                                                                <li class="edit-post-btn"
                                                                                    data-publication-id="{{ $publication->id }}"
                                                                                    data-post-content="{{ $publication->contenu }}"
                                                                                    data-post-domain="{{ $publication->domain }}">
                                                                                    <i class="icofont-pen-alt-1"></i>Edit
                                                                                    Post
                                                                                </li>

                                                                                <li>
                                                                                    <a href="#"
                                                                                        class="delete-post-btn"
                                                                                        data-publication-id="{{ $publication->id }}">
                                                                                        <i
                                                                                            class="icofont-ui-delete"></i>Delete
                                                                                        Post
                                                                                    </a>

                                                                                </li>

                                                                            </ul>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <ins><a title=""
                                                                        href="time-line.html">{{ $publication->user->name }}</a>
                                                                    <span>
                                                                        <i class="icofont-globe"></i>
                                                                        published:
                                                                        {{ \Carbon\Carbon::parse($publication->created_at)->isoFormat('MMM, DD YYYY, h:mm A') }}
                                                                    </span>
                                                            </div>

                                                            @php
                                                                // Assuming $publication->created_at is your timestamp
                                                                $created_at = \Carbon\Carbon::parse(
                                                                    $publication->created_at,
                                                                );

                                                                // Calculate the difference between the created_at timestamp and the current time
                                                                $timeElapsed = $created_at->diffForHumans(null, true);
                                                            @endphp
                                                            <style>
                                                                .modal-content {
                                                                    overflow-y: auto;
                                                                }

                                                                .pop-item {
                                                                    width: 200px;
                                                                    /* Set the width */
                                                                    height: 200px;
                                                                    /* Set the height */
                                                                    /* Add any additional styling as needed */
                                                                }

                                                                .pop-item figure img {
                                                                    width: 100%;
                                                                    /* Make sure the image fills the container */
                                                                    height: 100%;
                                                                    /* Make sure the image fills the container */
                                                                    object-fit: cover;
                                                                    /* Ensure the image covers the container */
                                                                }
                                                            </style>
                                                            @if ($publication->image)
                                                                <a data-toggle="modal" data-target="#img-comt"
                                                                    data-time="{{ $timeElapsed }}"
                                                                    data-src="{{ asset('images/' . $publication->image) }}"
                                                                    data-publication-id="{{ $publication->id }}">

                                                                    <img src="{{ asset('images/' . $publication->image) }}"
                                                                        height="400px" width="600px" alt="">
                                                                </a>
                                                            @endif

                                                            <div class="post-meta">
                                                                <p>{{ $publication->contenu }}</p>
                                                                @if (!empty($publication->domain))
                                                                    <p><strong>Domain:</strong> {{ $publication->domain }}
                                                                    </p>
                                                                @endif
                                                                <div class="we-video-info">
                                                                    <ul>
                                                                        <li>
                                                                            <span title="Comments" class="liked">
                                                                                <i>
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="16" height="16"
                                                                                        viewBox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        class="feather feather-thumbs-up">
                                                                                        <path
                                                                                            d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3">
                                                                                        </path>
                                                                                    </svg>
                                                                                </i>
                                                                                <ins>
                                                                                    <span
                                                                                        class="like-count unique-like-count-{{ $publication->id }}">
                                                                                        {{ $publication->jaime_publications->count() }}
                                                                                    </span>
                                                                                </ins>
                                                                            </span>
                                                                        </li>
                                                                        <li>
                                                                            <span title="Comments" class="Recommend">
                                                                                <i>
                                                                                    <svg class="feather feather-message-square"
                                                                                        stroke-linejoin="round"
                                                                                        stroke-linecap="round"
                                                                                        stroke-width="2"
                                                                                        stroke="currentColor"
                                                                                        fill="none" viewBox="0 0 24 24"
                                                                                        height="16" width="16"
                                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                                        <path
                                                                                            d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                                                                    </svg>
                                                                                </i>
                                                                                <ins>
                                                                                    <span
                                                                                        class="commentaire-count unique-commentaire-count-{{ $publication->id }}">
                                                                                        {{ $publication->totalComments() }}
                                                                                    </span>
                                                                                </ins>
                                                                            </span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="stat-tools">
                                                                    <div class="box"
                                                                        data-publication-id="{{ $publication->id }}">
                                                                        <div class="Like">
                                                                            <a class="Like__link"><i
                                                                                    class="icofont-like"></i> Like</a>
                                                                        </div>
                                                                    </div>

                                                                    <a title="" href="#" class="comment-to"
                                                                        data-publication-id="{{ $publication->id }}">
                                                                        <i class="icofont-comment"></i> Comment
                                                                    </a>
                                                                    <div class="new-comment" style="display: none;">
                                                                        <form id="commentForm"
                                                                            action="{{ route('add-comment') }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="publication_id"
                                                                                value="{{ $publication->id }}">
                                                                            <input type="text" name="content"
                                                                                placeholder="write comment">
                                                                            <button type="submit"><i
                                                                                    class="icofont-paper-plane"></i></button>
                                                                        </form>
                                                                        <div class="comments-area"
                                                                            data-comments-publication-id="{{ $publication->id }}">
                                                                            <!-- Comments will be loaded here -->
                                                                            <ul>
                                                                                <!-- Existing comments will be dynamically added here -->
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- share post without image -->
                                                <div class="modal fade" id="img-comt">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal">×</button>
                                                            </div>
                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                <div class="row merged">
                                                                    <div class="col-lg-9">
                                                                        <div class="pop-image">
                                                                            <figure>
                                                                                <img id="modal-image" src=""
                                                                                    alt="">
                                                                            </figure>
                                                                            <div class="stat-tools">
                                                                                <div class="box"
                                                                                    data-publication-id="{{ $publication->id }}">
                                                                                    <div class="Like">
                                                                                        <a class="Like__link"><i
                                                                                                class="icofont-like"></i>
                                                                                            Like</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <div class="commentbar">
                                                                            <div class="user">
                                                                                @if ($publication->user_abonner_id == auth()->id())
                                                                                    <figure><img
                                                                                            src="{{ asset('users/' . $publication->user->image) }}"
                                                                                            height="50px" width="50px"
                                                                                            alt=""></figure>
                                                                                @else
                                                                                    <figure><img
                                                                                            src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=104d93&color=fff"
                                                                                            alt=""></figure>
                                                                                @endif
                                                                                <div class="user-information">
                                                                                    <h4>
                                                                                        <a href="{{ route('Profile_User') }}"
                                                                                            title="">{{ $publication->user->name }}</a>
                                                                                    </h4>
                                                                                    <span><i class="icofont-globe"></i>
                                                                                        <span
                                                                                            id="modal-time"></span></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="we-video-info">
                                                                                <ul>
                                                                                    <li>
                                                                                        <span title="Comments"
                                                                                            class="liked">
                                                                                            <i>
                                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                    width="16"
                                                                                                    height="16"
                                                                                                    viewBox="0 0 24 24"
                                                                                                    fill="none"
                                                                                                    stroke="currentColor"
                                                                                                    stroke-width="2"
                                                                                                    stroke-linecap="round"
                                                                                                    stroke-linejoin="round"
                                                                                                    class="feather feather-thumbs-up">
                                                                                                    <path
                                                                                                        d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3">
                                                                                                    </path>
                                                                                                </svg>
                                                                                            </i>
                                                                                            <ins
                                                                                                id="modal-jaime-count">0</ins>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li>
                                                                                        <span title="Comments"
                                                                                            class="comment">
                                                                                            <i>
                                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                    width="16"
                                                                                                    height="16"
                                                                                                    viewBox="0 0 24 24"
                                                                                                    fill="none"
                                                                                                    stroke="currentColor"
                                                                                                    stroke-width="2"
                                                                                                    stroke-linecap="round"
                                                                                                    stroke-linejoin="round"
                                                                                                    class="feather feather-message-square">
                                                                                                    <path
                                                                                                        d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z">
                                                                                                    </path>
                                                                                                </svg>
                                                                                            </i>
                                                                                            <ins
                                                                                                id="modal-comments-count">0</ins>
                                                                                        </span>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="new-comment"
                                                                                style="display: block;">
                                                                                <form id="add-comment-form"
                                                                                    action="{{ route('add-comment') }}"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    <input type="hidden"
                                                                                        name="publication_id"
                                                                                        value="{{ $publication->id }}">
                                                                                    <input type="text" name="content"
                                                                                        placeholder="Write a comment">
                                                                                    <button type="submit"><i
                                                                                            class="icofont-paper-plane"></i></button>
                                                                                </form>
                                                                                <div class="comments-area"
                                                                                    data-comments-publication-id="{{ $publication->id }}">
                                                                                    <ul>
                                                                                        <!-- Comments will be dynamically loaded here via AJAX -->
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif



                                        <!-- share image with post -->



                                    </div>

                                    <style>
                                        .no-users-message {
                                            font-size: 16px;
                                            color: #888;
                                            text-align: center;
                                            margin-top: 20px;
                                        }
                                    </style>
                                    <div class="tab-pane fade" id="follow">
                                        @if ($followingUsers->isEmpty())
                                            <p class="no-users-message">No users followed yet. Your journey starts here!
                                                Start following users to discover new connections and insights!</p>
                                        @else
                                            <div class="row merged-10 col-xs-6">
                                                @foreach ($followingUsers as $following)
                                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                                        <div class="friendz">
                                                            @if ($following->image)
                                                                <figure><img
                                                                        src="{{ asset('users/' . $following->image) }}"
                                                                        alt=""></figure>
                                                            @else
                                                                <figure><img
                                                                        src="https://ui-avatars.com/api/?name={{ urlencode($following->name) }}&background=104d93&color=fff"
                                                                        alt=""></figure>
                                                            @endif
                                                            <span><a href="{{ route('profile.show', $following) }}"
                                                                    title="">{{ $following->name }}</a></span>
                                                            <ins>{{ $following->institut }}</ins>
                                                            <a href="#" class="unfollow-button"
                                                                data-user-id="{{ $following->id }}" title=""
                                                                data-ripple=""><i class="icofont-star"></i>Unfollow</a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>



                                    <div class="tab-pane" id="profile">
                                        <form id="updateProfileForm" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name"
                                                    placeholder="Enter your name" value="{{ Auth::user()->name }}"
                                                    name="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email address</label>
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="Enter your email" value="{{ Auth::user()->email }}"
                                                    name="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="institute">Institute</label>
                                                <input type="text" class="form-control" id="institute"
                                                    placeholder="Enter your institute"
                                                    value="{{ Auth::user()->institut }}" name="institute">
                                            </div>

                                            <div class="form-group">
                                                <label for="location">Location</label>
                                                <select id="country" name="country" class="form-control" required>

                                                    @foreach ($countries as $countryCode => $countryName)
                                                        <option value="{{ $countryName }}"
                                                            @if (Auth::user()->location === $countryName) selected @endif>
                                                            {{ $countryName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <style>
                                                #country {
                                                    display: block !important;
                                                }

                                                .chosen-container-single {
                                                    display: none;
                                                }
                                            </style>
                                            <div class="form-group">
                                                <label for="date_of_birth">Date of Birth</label>
                                                <input type="date" class="form-control" id="date_of_birth"
                                                    name="date_of_birth"
                                                    value="{{ date('Y-m-d', strtotime(Auth::user()->date_of_birth)) }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="diploma">Diploma</label>
                                                <input type="text" class="form-control" id="diploma"
                                                    placeholder="Enter your diploma" value="{{ Auth::user()->diploma }}"
                                                    name="diploma">
                                            </div>
                                            <div class="form-group">
                                                <label for="profile_image">Profile Image</label>
                                                <input type="file" class="form-control-file" id="profile_image"
                                                    name="profile_image">
                                            </div>
                                            <div class="form-group">
                                                <label for="cover_photo">Cover Photo</label>
                                                <input type="file" class="form-control-file" id="cover_photo"
                                                    name="cover_photo">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes </button>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="Changerpassword">
                                        <form id="changePasswordForm">
                                            <!-- Current Password -->
                                            <div class="form-group">
                                                <label for="currentPassword">Current Password:</label>
                                                <input type="password" class="form-control" id="currentPassword"
                                                    name="currentPassword">
                                            </div>

                                            <!-- New Password -->
                                            <div class="form-group">
                                                <label for="newPassword">New Password:</label>
                                                <input type="password" class="form-control" id="newPassword"
                                                    name="newPassword">
                                            </div>

                                            <!-- Confirm New Password -->
                                            <div class="form-group">
                                                <label for="confirmPassword">Confirm New Password:</label>
                                                <input type="password" class="form-control" id="confirmPassword"
                                                    name="confirmPassword">
                                            </div>

                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                        </form>

                                    </div>

                                </div>


                                @if (auth()->check())
                                    <div class="post-new-popup">
                                        <div class="popup">
                                            <span class="popup-closed">
                                                <i class="icofont-close"></i>
                                            </span>
                                            <div class="popup-meta">
                                                <div class="popup-head">
                                                    <h5>
                                                        <i>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12"
                                                                    y2="19"></line>
                                                                <line x1="5" y1="12" x2="19"
                                                                    y2="12"></line>
                                                            </svg>
                                                        </i>Create New Post
                                                    </h5>
                                                </div>
                                                <div class="post-new">


                                                    <form method="post" action="{{ route('publications.store') }}"
                                                        class="c-form" enctype="multipart/form-data">
                                                        @csrf
                                                        <!-- This is important for Laravel to validate the form submission -->

                                                        <div class="post-newmeta">
                                                            <textarea id="emojionearea1" name="contenu" placeholder="What's On Your Mind?" required></textarea>
                                                            @error('contenu')
                                                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                            @enderror
                                                        </div>


                                                        <div class="form-group">
                                                            <label for="domain">Domain</label>
                                                            <select id="domain" name="domain" class="form-control"
                                                                required>

                                                                <option value="">Select Domain</option>
                                                                <option value="Computer science">Computer science</option>
                                                                <option value="Management/economics">Management/economics
                                                                </option>
                                                                <option value="Mechanical">Mechanical</option>
                                                                <option value="Electric">Electric</option>
                                                                <option value="Science">Science</option>
                                                                <option value="Lettre">Letter</option>
                                                            </select>
                                                        </div>
                                                        <style>
                                                            #domain {
                                                                display: block !important;
                                                            }

                                                            .chosen-container-single {
                                                                display: none;
                                                            }

                                                            .post-new {
                                                                width: 202%;
                                                            }

                                                            .btn-info {
                                                                width: 364px
                                                            }

                                                            .post-newmeta {
                                                                width: 109%;

                                                            }
                                                        </style>
                                                        <div class="post-newmeta">
                                                            <label for="inputField" class="btn btn-info">uploid
                                                                Document</label>
                                                            <input type="file" name="image" id="inputField"
                                                                style="display:none">
                                                            @error('image')
                                                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                            @enderror
                                                        </div>

                                                        <button type="submit" class="main-btn">Publish</button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <!-- New post popup -->
                                @endif
                                <br>
                                <div class="main-wraper">
                                    <div class="user-post">
                                        <div class="friend-info">
                                            <figure>
                                                <i class="icofont-learn"></i>
                                            </figure>
                                            <div class="friend-name">
                                                <ins><a title="" href="time-line.html">Suggested</a></ins>
                                                <span><i class="icofont-runner-alt-1"></i> Follow similar Research
                                                    People</span>
                                            </div>
                                            <style>
                                                .user-image img {
                                                    width: 100px;
                                                    /* Adjust the width as needed */
                                                    height: 100px;
                                                    /* Adjust the height as needed */
                                                    border-radius: 50%;
                                                    /* Optional: Add rounded corners */
                                                }
                                            </style>

                                            <ul class="suggested-caro" id="suggested-users">
                                                @if ($suggestedUsers->isEmpty())
                                                    <li>No suggested users to display.</li>
                                                @else
                                                    @foreach ($suggestedUsers as $user)
                                                        <li data-user-id="{{ $user->id }}">
                                                            <figure class="user-image">
                                                                @if ($user->image)
                                                                    <img src="{{ asset('users/' . $user->image) }}"
                                                                        alt="">
                                                                @else
                                                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=104d93&color=fff"
                                                                        alt="">
                                                                @endif
                                                            </figure>
                                                            <span><a
                                                                    href="{{ route('profile.show', $user) }}">{{ $user->name }}</a></span>
                                                            <ins>{{ $user->institut }}</ins>
                                                            <a href="#" title="" class="follow-button"
                                                                data-ripple=""><i class="icofont-star"></i> Follow</a>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>




                                        </div>
                                    </div>
                                </div><!-- suggested friends -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>






    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
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
            $('#updateProfileForm').submit(function(e) {
                e.preventDefault(); // Prevent the default form submission

                var formData = new FormData(this); // Create FormData object from the form

                $.ajax({
                    url: '{{ route('update.profile') }}', // URL of the updateProfile endpoint
                    method: 'POST',
                    data: formData,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // Include CSRF token in headers
                    },
                    success: function(response) {
                        // Show success toast message
                        showToast('success', response.message);
                        reloadCompletionProgress(); // Reload completion progress

                    },
                    error: function(xhr, status, error) {
                        // Show error toast message
                        var errorMessage = xhr.responseJSON ? xhr.responseJSON.message :
                            'An error occurred.';
                        showToast('error', errorMessage);
                    }
                });
            });

        });

        function reloadCompletionProgress() {
            // Perform AJAX request to get the updated content
            $.ajax({
                url: location.href, // Reload the current URL
                type: 'GET', // Use GET method
                success: function(response) {
                    // Find the elements in the response and update the existing ones
                    var uniName = $(response).find('.uni-name');
                    $('.uni-name').replaceWith(uniName);
                    // Update the user-dp element
                    var userDp = $(response).find('.user-dp');
                    $('.user-dp').replaceWith(userDp);
                    var universityTag = $(response).find('.university-tag');
                    $('.university-tag').replaceWith(universityTag);
                    var bgImage = $(response).find('.bg-image');
                    $('.bg-image').replaceWith(bgImage);
                },
                error: function(xhr, status, error) {
                    // Handle errors if needed
                    console.error(xhr.responseText);
                }
            });
        }
    </script>
    <!-- Update the modal script -->
    <script>
        $(document).ready(function() {
            $('a[data-toggle="modal"]').on('click', function() {
                var imageUrl = $(this).data('src');
                var publicationTime = $(this).data('time');
                var publicationId = $(this).data('publication-id');

                // Set the publication ID attribute
                $('#img-comt .comments-area').attr('data-comments-publication-id', publicationId);
                $('.box').attr('data-publication-id', publicationId);

                $('#add-comment-form').find('input[name="publication_id"]').val(publicationId);

                $('#modal-time').text('(Published ' + publicationTime + ' ago)');
                $('#modal-image').attr('src', imageUrl);

                // Fetch likes count using AJAX
                $.ajax({
                    type: 'GET',
                    url: '/publication/' + publicationId + '/likes/count',
                    success: function(response) {
                        $('#modal-jaime-count').text(response.likesCount);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });

                // Fetch comments count using AJAX
                $.ajax({
                    type: 'GET',
                    url: '/publication/' + publicationId + '/comments/count',
                    success: function(response) {
                        $('#modal-comments-count').text(response.commentsCount);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });

                // Fetch comments for the publication
                $.ajax({
                    type: 'GET',
                    url: '/publication/' + publicationId + '/comments',
                    success: function(response) {
                        var commentsList = $('#img-comt .comments-area ul');
                        commentsList.empty(); // Clear existing comments

                        if (response.comments.length === 0) {
                            commentsList.append('<li>No comments yet.</li>');
                        } else {
                            $.each(response.comments, function(index, comment) {
                                var createdAt = moment(comment.updated_at).fromNow();
                                var commentHtml = '<li data-comment-id="' + comment.id +
                                    '">' +
                                    '<figure><img src="' + (comment.user.image ?
                                        '/users/' +
                                        comment.user.image :
                                        'https://ui-avatars.com/api/?name=' +
                                        encodeURIComponent(comment.user.name) +
                                        '&background=104d93&color=fff') +
                                    '" height="25px" width="25px" alt="" class="mr-2" style="border-radius: 50%;"></figure>' +
                                    '<div class="commenter">' +
                                    '<h5><a href="#">' + comment.user.name +
                                    '</a></h5>' +
                                    '<span>' + createdAt + '</span>' +
                                    '<p>' + comment.contenu + '</p>' +
                                    '</div>';

                                if (comment.user.id === {{ auth()->id() }}) {
                                    commentHtml +=
                                        '<a title="Update" href="#" class="update-comment"><i class="icofont-ui-edit"></i></a>' +
                                        '<a title="Delete" href="#" class="delete-comment"><i class="icofont-trash"></i></a>';
                                }
                                commentHtml += '</li>';
                                commentsList.append(commentHtml);
                            });
                        }
                    },

                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>

    {{-- changePasswordForm  --}}
    <script>
        $(document).ready(function() {
            $('#changePasswordForm').submit(function(e) {
                e.preventDefault(); // Prevent the default form submission

                var formData = $(this).serialize(); // Serialize form data

                $.ajax({
                    url: '{{ route('change.password') }}', // URL of the changePassword endpoint
                    method: 'POST',
                    data: formData,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // Include CSRF token in headers
                    },
                    success: function(response) {
                        // Show success toast message
                        showToast('success', response.message);
                        $('#changePasswordForm')[0].reset();

                    },
                    error: function(xhr, status, error) {
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            var errors = xhr.responseJSON.errors;
                            for (var key in errors) {
                                var errorMessage = errors[key][0];
                                showToast('error', errorMessage);
                            }
                        } else {
                            var errorMessage = xhr.responseJSON ? xhr.responseJSON.message :
                                'An error occurred.';
                            showToast('error', errorMessage);
                        }
                    }
                });
            });
        });

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
    </script>
    {{-- ajouter like  --}}
    <script>
        $(document).ready(function() {
            $('.Like__link').click(function(e) {
                e.preventDefault();
                var publicationId = $(this).closest('.box').data('publication-id');
                var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Récupérer le jeton CSRF

                $.ajax({
                    type: 'POST',
                    url: '/jaime-publication',
                    data: {
                        _token: csrfToken, // Ajouter le jeton CSRF à la demande

                        publication_id: publicationId
                    },
                    success: function(response) {

                        var likeCountElement = $('.unique-like-count-' + publicationId);
                        likeCountElement.text(response.like_count);
                        var likeCountElements = $('#modal-jaime-count');
                        likeCountElements.text(response.like_count);
                        if (response.message === "Publication unliked.") {
                            showToast('warning', response.message);

                        } else {
                            showToast('success', response.message);

                        }

                    },
                    error: function(xhr, status, error) {
                        // Gérez les erreurs ou affichez un message d'erreur
                        showToast('error', error);

                    }
                });
            });
        });

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
    </script>


    {{-- add comment in profile user --}}
    <script>
        $(document).ready(function() {
            function fetchAndDisplayComments(publicationId) {
                var commentsArea = $('.comments-area[data-comments-publication-id="' + publicationId + '"]');

                // Make an AJAX request to fetch comments for this publication
                $.ajax({
                    type: 'GET',
                    url: '/publication/' + publicationId + '/comments',
                    success: function(response) {
                        commentsArea.find('ul').empty(); // Clear existing comments

                        // Check if there are comments in the response
                        if (response.comments.length === 0) {
                            commentsArea.find('ul').append('<li>No comments yet.</li>');
                        } else {
                            $.each(response.comments, function(index, comment) {
                                var createdAt = moment(comment.updated_at)
                                    .fromNow(); // Format timestamp using moment.js

                                var commentHtml = '<li data-comment-id="' + comment.id + '">' +
                                    // Set data-comment-id attribute with comment ID
                                    '<figure><img alt="" src="' + (comment.user.image ?
                                        '/users/' + comment.user.image :
                                        'https://ui-avatars.com/api/?name=' +
                                        encodeURIComponent(comment.user.name) +
                                        '&background=104d93&color=fff') +
                                    '" height="25px" width="25px" alt="" class="mr-2" style="border-radius: 50%;"></figure>' +
                                    '<div class="commenter">' +
                                    '<h5><a title="" href="#">' + comment.user.name +
                                    '</a></h5>' +
                                    '<span>' + createdAt + '</span>' +
                                    '<p>' + comment.contenu + '</p>' +
                                    '</div>';

                                // Add update and delete options if the comment belongs to the current user
                                if (comment.user.id === {{ auth()->id() }}) {
                                    commentHtml +=
                                        '<a title="Update" href="#" class="update-comment"><i class="icofont-ui-edit"></i></a>' +
                                        '<a title="Delete" href="#" class="delete-comment"><i class="icofont-trash"></i></a>';
                                }

                                commentHtml += '</li>';
                                commentsArea.find('ul').append(commentHtml);
                            });
                        }
                        commentsArea.show(); // Show the comments area
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            // Submit comment form
            $(document).on('submit', '#commentForm', function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                var publicationId = $(this).find('input[name="publication_id"]').val();

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            // Clear input field
                            $('#commentForm input[name="content"]').val('');

                            // Fetch and display comments for the publication
                            fetchAndDisplayComments(publicationId);
                            var likeCountElement = $('.unique-commentaire-count-' +
                                publicationId);
                            likeCountElement.text(response.totalComments);
                            showToast('success', 'Comment added successfully!');

                        } else {
                            console.error(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            // Click event for fetching comments
            $('.comment-to').click(function(e) {
                e.preventDefault();
                var publicationId = $(this).data('publication-id');
                fetchAndDisplayComments(publicationId);
            });
        });

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
    </script>


    {{-- add comment in modal  --}}
    <script>
        $(document).ready(function() {
            // Function to fetch and display comments
            function fetchComments(publicationId) {
                $.ajax({
                    type: 'GET',
                    url: '/publication/' + publicationId +
                        '/comments', // Replace this URL with your backend endpoint
                    success: function(response) {
                        var commentsList = $('.comments-area ul');
                        commentsList.empty(); // Clear existing comments

                        if (response.comments.length === 0) {
                            commentsList.append('<li>No comments yet.</li>');
                        } else {
                            $.each(response.comments, function(index, comment) {
                                var createdAt = moment(comment.updated_at)
                                    .fromNow(); // Format timestamp using moment.js
                                var commentHtml = '<li data-comment-id="' + comment.id + '">' +
                                    // Set data-comment-id attribute with comment ID
                                    '<figure><img src="' + (comment.user.image ? '/users/' +
                                        comment.user.image :
                                        'https://ui-avatars.com/api/?name=' +
                                        encodeURIComponent(comment.user.name) +
                                        '&background=104d93&color=fff') +
                                    '" height="25px" width="25px" alt="" class="mr-2" style="border-radius: 50%;"></figure>' +
                                    '<div class="commenter">' +
                                    '<h5><a href="#">' + comment.user.name + '</a></h5>' +
                                    '<span>' + createdAt + '</span>' +
                                    '<p>' + comment.contenu + '</p>' +
                                    '</div>';
                                // Add update and delete options if the comment belongs to the current user
                                if (comment.user.id === {{ auth()->id() }}) {
                                    commentHtml +=
                                        '<a title="Update" href="#" class="update-comment"><i class="icofont-ui-edit"></i></a>' +
                                        '<a title="Delete" href="#" class="delete-comment"><i class="icofont-trash"></i></a>';
                                }

                                commentHtml += '</li>';
                                commentsList.append(commentHtml);
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            // Submit comment form via AJAX
            $('#add-comment-form').submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    success: function(response) {
                        $('#add-comment-form input[name="content"]').val('');
                        showToast('success', 'Comment added successfully!');

                        console.log(response)
                        // Fetch and display comments after adding a new comment
                        fetchComments(response.publicationId);
                        $('#modal-comments-count').text(response.totalComments);

                        var likeCountElement = $('.unique-commentaire-count-' +
                            response.publicationId);
                        likeCountElement.text(response.totalComments);

                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        showToast('error', error);

                    }
                });
            });
        });
    </script>

    {{-- delete comment --}}
    <script>
        function fetchAndDisplayComments(publicationId) {
            var commentsArea = $('.comments-area[data-comments-publication-id="' + publicationId + '"]');

            // Make an AJAX request to fetch comments for this publication
            $.ajax({
                type: 'GET',
                url: '/publication/' + publicationId + '/comments',
                success: function(response) {
                    commentsArea.find('ul').empty(); // Clear existing comments

                    // Check if there are comments in the response
                    if (response.comments.length === 0) {
                        commentsArea.find('ul').append('<li>No comments yet.</li>');
                    } else {
                        $.each(response.comments, function(index, comment) {
                            var createdAt = moment(comment.updated_at)
                                .fromNow(); // Format timestamp using moment.js

                            var commentHtml = '<li data-comment-id="' + comment.id + '">' +
                                // Set data-comment-id attribute with comment ID
                                '<figure><img alt="" src="' + (comment.user.image ?
                                    '/users/' + comment.user.image :
                                    'https://ui-avatars.com/api/?name=' +
                                    encodeURIComponent(comment.user.name) +
                                    '&background=104d93&color=fff') +
                                '" height="25px" width="25px" alt="" class="mr-2" style="border-radius: 50%;"></figure>' +
                                '<div class="commenter">' +
                                '<h5><a title="" href="#">' + comment.user.name +
                                '</a></h5>' +
                                '<span>' + createdAt + '</span>' +
                                '<p>' + comment.contenu + '</p>' +
                                '</div>';

                            if (comment.user.id === {{ auth()->id() }}) {
                                commentHtml +=
                                    '<a title="Update" href="#" class="update-comment"><i class="icofont-ui-edit"></i></a>' +
                                    '<a title="Delete" href="#" class="delete-comment"><i class="icofont-trash"></i></a>';
                            }

                            commentHtml += '</li>';
                            commentsArea.find('ul').append(commentHtml);
                        });
                    }
                    commentsArea.show(); // Show the comments area
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

        $(document).on('click', '.delete-comment', function(e) {
            e.preventDefault();
            var commentElement = $(this).closest('li');
            var commentId = commentElement.data('comment-id');
            var publicationId = commentElement.closest('.comments-area').data('comments-publication-id');

            // Get the CSRF token from the meta tag
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type: 'DELETE',
                url: '/publication/' + publicationId + '/comment/' +
                    commentId, // Adjust the URL according to your backend route
                data: {
                    _token: csrfToken // Include CSRF token in the data object
                },
                success: function(response) {
                    if (response.success) {
                        commentElement.remove();
                        var likeCountElement = $('.unique-commentaire-count-' + publicationId);
                        likeCountElement.text(response.totalComments);
                        $('#modal-comments-count').text(response.totalComments);
                        fetchAndDisplayComments(publicationId);

                        showToast('success', 'Comment deleted successfully!');
                    } else {
                        console.error(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    </script>
    {{-- udpate comment --}}
    <script>
        $(document).on('click', '.update-comment', function(e) {
            e.preventDefault();
            var commentId = $(this).closest('li').data('comment-id');
            var commentContent = $(this).closest('li').find('.commenter p').text();
            console.log(commentId);
            console.log(commentContent);

            // Populate modal fields with comment ID and content
            $('#commentId').val(commentId);
            $('#updatedContent').val(commentContent);

            // Show the update comment modal
            $('#updateCommentModal').modal('show');

            // Bring the update comment modal to the front
            $('#updateCommentModal').css('z-index', 9999999999);
        });
    </script>

    <!-- Update Comment Modal -->
    <div class="modal fade" id="updateCommentModal" tabindex="-1" role="dialog"
        aria-labelledby="updateCommentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateCommentModalLabel">Update Comment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="updateCommentForm" action="{{ route('comment.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="commentId" name="comment_id">
                    <input type="hidden" id="publicationId" name="publication_id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="updatedContent">Updated Comment:</label>
                            <textarea class="form-control" id="updatedContent" name="content" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- delete post  -->
    <script>
        $(document).ready(function() {
            $('.delete-post-btn').click(function(e) {
                e.preventDefault();
                var publicationId = $(this).data('publication-id');
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'DELETE',
                    url: '/publication/' + publicationId,
                    data: {
                        _token: csrfToken
                    },
                    success: function(response) {
                        // Handle success, for example, remove the deleted post from the DOM
                        $('#publication-' + publicationId).remove();
                        showToast('success', response.message);

                        if ($('.main-wraper.unique-class').length === 0) {
                            console.log("No publications found");
                            // If no remaining publications with the unique class, show the "No posts found" message
                            $('#unique-container').html(
                                '<div style="text-align: center; font-size: 30px; font-weight: bold;"><p>No posts found.</p></div>'
                            );
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error(error);
                        showToast('error', 'An error occurred. Please try again.');
                    }
                });
            });
        });
    </script>

    <!-- update post -->
    <script>
        $(document).ready(function() {
            $('.edit-post-btn').click(function() {
                // Retrieve the publication ID from the data attribute
                var publicationId = $(this).data('publication-id');
                console.log("Retrieved publicationId:", publicationId);

                // Retrieve the post content from the data attribute
                var postContent = $(this).data('post-content');
                var postDomain = $(this).data('post-domain');
                console.log("Retrieved postContent:", postDomain);

                // Update the hidden field value with the retrieved publication ID
                $('#updatePublicationModal input[name="publication_id"]').val(publicationId);
                console.log("Updated publicationId in input field:", $('input[name="publication_id"]')
                    .val());

                // Update the textarea value with the retrieved post content
                $('#updatePublicationModal #updatedContent').val(postContent);

                // Set the selected option in the select dropdown
                $('#updatedDomain').val(postDomain);

                // Show the modal
                $('#updatePublicationModal').modal('show');
            });
        });
    </script>




    </script>
    <div class="modal fade" id="updatePublicationModal" tabindex="-1" role="dialog"
        aria-labelledby="updatePublicationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updatePublicationModalLabel">Edit Publication</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="updatePublicationForm" action="{{ route('publications.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="updatedContent">Updated Content:</label>
                            <textarea class="form-control" id="updatedContent" name="contenu" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="updatedDomain">Domain:</label>
                            <select class="form-control" id="updatedDomain" name="domaine">
                                <option value="Computer science">Computer science</option>
                                <option value="Management/economics">Management/economics</option>
                                <option value="Mechanical">Mechanical</option>
                                <option value="Electric">Electric</option>
                                <option value="Science">Science</option>
                                <option value="Lettre">Lettre</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                        <style>
                            #updatedDomain {
                                display: block !important;
                            }

                            .chosen-container-single {
                                display: none;
                            }
                        </style>

                        <!-- Hidden field to store publication ID -->
                        <input type="hidden" id="publicationId" name="publication_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Publication</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- button follow  -->
    <script>
        $(document).ready(function() {

            $(document).on('click', '.follow-button', function(e) {

                e.preventDefault();
                var userId = $(this).closest('li').data('user-id');

                // Send AJAX request to follow the user
                $.ajax({
                    url: '/follow/' + userId,
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Update UI or show success message
                        showToast('success', response.message);

                        // AJAX request to update UI after following a user
                        $.ajax({
                            url: location.href,
                            type: 'GET',
                            success: function(response) {
                                // Update following widget
                                $('.group-avatar').load(location.href + ' .group-avatar > *');
                                var followingWidgetHtml = $(response).find(
                                    '#following-widget').html();
                                $('#following-widget').html(followingWidgetHtml);

                                var followingWidgetHtml = $(response).find(
                                    '#follow').html();
                                $('#follow').html(followingWidgetHtml);

                                var followingCount = $(response).find(
                                    '#following-count').text();
                                $('#following-count').text(followingCount);

                                $('#suggested-users li[data-user-id="' + userId +
                                    '"]').remove();
                                

                                // Update suggested users list


                            },
                            error: function(xhr, status, error) {
                                // Handle errors if needed
                                console.error(xhr.responseText);
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        // Handle errors
                        console.error(error);
                        showToast('error', error);
                    }
                });
            });
        });
    </script>




    {{-- follow link  --}}
    <script>
        $(document).ready(function() {

            // Event listener for the "Follow" link
            $(document).on('click', '.follow-link', function(e) {

                e.preventDefault();
                var userId = $(this).data('user-id');
                var isAuthenticated = {{ auth()->check() ? 'true' : 'false' }};
                if (!isAuthenticated) {
                    showToast('error', 'You need to log in to follow users.');
                    // Optionally, redirect to the login page
                    setTimeout(function() {
                        window.location.href = '{{ route('login') }}';
                    }, 2000); // Redirect after 2 seconds
                    return;
                }
                // Send AJAX request to follow the user
                $.ajax({
                    url: '/follow/' + userId,
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Handle success response
                        showToast('success', response.message);
                        $.ajax({
                            url: location.href,
                            type: 'GET',
                            success: function(response) {
                                // Update following widget
                                var followingWidgetHtml = $(response).find(
                                    '#following-widget').html();
                                $('#following-widget').html(followingWidgetHtml);

                                var followingWidgetHtml = $(response).find(
                                    '#follow').html();
                                $('#follow').html(followingWidgetHtml);

                                var followingCount = $(response).find(
                                    '#following-count').text();
                                $('#following-count').text(followingCount);

                                $('#suggested-users li[data-user-id="' + userId +
                                    '"]').remove();
                                // Update followers count
                                var followersCount = $(response).find(
                                    '#followers-count').text();
                                $('#followers-count').text(followersCount);
                                console.log("followersCount fi follow" +
                                    followersCount);

                                // Update suggested users list

                            },
                            error: function(xhr, status, error) {
                                // Handle errors if needed
                                console.error(xhr.responseText);
                            }
                        });

                        // Optionally, update the UI to reflect the followed user
                        // For example, you can remove the user from the list
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        console.error(error);
                        showToast('error', error);
                    }
                });
            });
        });
    </script>


    <!-- button unfollow -->
    <script>
        $(document).ready(function() {
            // Event listener for the "Unfollow" button
            $(document).on('click', '.unfollow-button', function(e) {

                e.preventDefault();
                var userId = $(this).data('user-id');
                console.log(userId);
                // Send AJAX request to unfollow the user
                $.ajax({
                    url: '/unfollow/' + userId,
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Handle success response
                        showToast('success', response.message);
                        // Optionally, update the UI to reflect the unfollowed user
                        $(this).closest('.friendz')
                            .remove(); // Remove the unfollowed user from the UI

                        var userContent = '<figure class="user-image">New image</figure>' +
                            '<span>New name</span>' +
                            '<ins>New institute</ins>' +
                            '<a href="#" title="" class="follow-button" data-ripple=""><i class="icofont-star"></i> Follow</a>';
                        $('#suggested-users li[data-user-id="' + userId + '"]').html(
                            userContent);
                        $.ajax({
                            url: location.href,
                            type: 'GET',
                            success: function(response) {
                                // Update following widget
                                var followingWidgetHtml = $(response).find(
                                    '#following-widget').html();
                                $('#following-widget').html(followingWidgetHtml);

                                var followingWidgetHtml = $(response).find(
                                    '#follow').html();
                                $('#follow').html(followingWidgetHtml);

                                var followingCount = $(response).find(
                                    '#following-count').text();
                                $('#following-count').text(followingCount);
                                var followersCount = $(response).find(
                                    '#followers-count').text();
                                $('#followers-count').text(followersCount);
                                console.log("followersCount fi unfollow" +
                                    followersCount);

                                // Assuming you receive the user ID from the response

                                // Update suggested users list

                            },
                            error: function(xhr, status, error) {
                                // Handle errors if needed
                                console.error(xhr.responseText);
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        console.error(error);
                        showToast('error', error);
                    }
                });
            });
        });
    </script>


@endsection
