@extends('frontoffice.layouts.index')

@section('content')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <section>
        <div class="gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="page-contents" class="row merged20">
                            <div class="col-lg-3">
                                <aside class="sidebar static left">
                                    <div class="widget whitish low-opacity">
                                        <img src="/frontoffice/images/time-clock.png" alt="">
                                        <div class="bg-image"
                                            style="background-image: url(/frontoffice/images/resources/time-bg.jpeg)"></div>
                                        <div class="date-time">
                                            <div class="realtime">
                                                <span id="hours">00</span>
                                                <span id="point">:</span>
                                                <span id="min">00</span>
                                            </div>
                                            <span id="date"></span>
                                        </div>
                                    </div>
                                    @if (auth()->check())
                                        <div class="widget">
                                            <h4 class="widget-title">Complete Your Profile</h4>
                                            @php
                                                $completionPercentage = 1; // Default completion percentage
                                                if (
                                                    empty(auth()->user()->cover_photo) &&
                                                    empty(auth()->user()->image)
                                                ) {
                                                    $completionPercentage = 0.8; // 80% completion if both are missing
                                                } elseif (
                                                    empty(auth()->user()->cover_photo) ||
                                                    empty(auth()->user()->image)
                                                ) {
                                                    $completionPercentage = 0.9; // 90% completion if one is missing
                                                }
                                            @endphp

                                            <div data-progress="tip" class="progress__outer"
                                                data-value="{{ $completionPercentage }}">
                                                <div class="progress__inner">{{ $completionPercentage * 100 }}%
                                                </div>
                                            </div>
                                            <ul class="prof-complete">
                                                @if (auth()->user()->image == null)
                                                    <li>
                                                        <i class="icofont-plus-square"></i>
                                                        <a href="#" title="" data-toggle="modal"
                                                            data-target="#uploadImageModal">Upload Your Picture</a>

                                                        <em>10%</em>
                                                    </li>
                                                @endif
                                                @if (empty(auth()->user()->cover_photo))
                                                    <li>
                                                        <i class="icofont-plus-square"></i>
                                                        <a href="#" title="" data-toggle="modal"
                                                            data-target="#uploadCoverPhotoModal">Upload Your Cover Photo</a>
                                                        <em>10%</em>
                                                    </li>
                                                @endif
                                                <!-- Add other completion steps here -->
                                            </ul>
                                        </div><!-- complete profile widget -->
                                    @endif

                                    <!-- Modal -->




                                    <style>
                                        .no-formations-message {
                                            background-color: #f8d7da;
                                            /* Light red background */
                                            color: #721c24;
                                            /* Dark red text color */
                                            padding: 10px;
                                            border: 1px solid #f5c6cb;
                                            /* Dark red border */
                                            border-radius: 4px;
                                            /* Rounded corners */
                                        }
                                    </style>
                                    <div class="widget">
                                        <a href="{{ route('formations') }}" title="View All training offer">
                                            <h4 class="widget-title"><i class="icofont-flame-torch"></i> Training offer</h4>
                                        </a>                                        <ul class="premium-course">
                                            @if ($formations->isEmpty())
                                                <li>
                                                    <div class="no-formations-message">
                                                        No training offer available
                                                    </div>
                                                </li>
                                            @else
                                                @foreach ($formations as $formation)
                                                    <li>
                                                       
                                                        @if ($formation->image)
                                                        <figure><img src="{{ asset('formations_images/' . $formation->image) }}"
                                                                alt="{{ $formation->title }}">
                                                                <span class="tag">Free</span>
                                                            </figure>
                                                    @else
                                                    <span class="tag">Free</span>
                                                    @endif
                                                        <div class="vid-course">
                                                            <h5><a 
                                                                    title="">{{ $formation->domain }}</a></h5>
                                                            {{-- <ins class="price">$19/M</ins> --}}
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endif

                                        </ul>
                                    </div><!-- popular courses -->
                                    {{-- <div class="widget">
                                        <h4 class="widget-title">Recent Blogs <a class="see-all" href="#"
                                                title="">See
                                                All</a></h4>
                                        <ul class="recent-links">
                                            <li>
                                                <figure><img alt=""
                                                        src="/frontoffice/images/resources/recentlink-1.jpg">
                                                </figure>
                                                <div class="re-links-meta">
                                                    <h6><a title="" href="#">Moira's fade reach much
                                                            farther...</a></h6>
                                                    <span>2 weeks ago </span>
                                                </div>
                                            </li>
                                            <li>
                                                <figure><img alt=""
                                                        src="/frontoffice/images/resources/recentlink-2.jpg">
                                                </figure>
                                                <div class="re-links-meta">
                                                    <h6><a title="" href="#">Daniel asks The voice of
                                                            doomfist...</a></h6>
                                                    <span>3 months ago </span>
                                                </div>
                                            </li>
                                            <li>
                                                <figure><img alt=""
                                                        src="/frontoffice/images/resources/recentlink-3.jpg">
                                                </figure>
                                                <div class="re-links-meta">
                                                    <h6><a title="" href="#">The Xchange over watch
                                                            scandals.</a>
                                                    </h6>
                                                    <span>1 day before</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div><!-- recent blog --> --}}



                                </aside>
                            </div>
                            <div class="col-lg-6">
                                <ul class="figbltr-tabs">
                                    <li><a class="active" href="#" title="">Home</a></li>
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                </ul><!-- tab buttons -->
                                @if (auth()->check())
                                    <div class="main-wraper">
                                        <span class="new-title">Create New Post</span>
                                        <div class="new-post">
                                            <form method="post">
                                                <i class="icofont-pen-alt-1"></i>
                                                <input type="text" placeholder="Create New Post">
                                            </form>

                                        </div>
                                    </div><!-- create new post -->
                                @else
                                    <div class="main-wrapper">
                                        <div class="new-post">
                                            <span class="new-title">Create New Post</span>
                                            <div class="login-prompt">
                                                <p>To create a new post, please</p>
                                                <div class="auth-links">
                                                    <a href="{{ route('login') }}" class="login-link">Log In</a>
                                                    <span class="separator">or</span>
                                                    <a href="{{ route('register') }}" class="register-link">Register</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <style>
                                    .login-prompt {
                                        text-align: center;
                                        margin-top: 20px;
                                    }

                                    .auth-links {
                                        display: flex;
                                        justify-content: center;
                                        align-items: center;
                                    }

                                    .separator {
                                        margin: 0 10px;
                                    }

                                    .login-link,
                                    .register-link {
                                        padding: 10px 20px;
                                        background-color: #3498db;
                                        color: #fff;
                                        text-decoration: none;
                                        border-radius: 5px;
                                        transition: background-color 0.3s ease;
                                    }

                                    .login-link:hover,
                                    .register-link:hover {
                                        background-color: #2980b9;
                                    }
                                </style>

                                <br>
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
                                                    <div style="text-align: center">
                                                        <li>No suggested users to display.</li>
                                                    </div>
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

                                @if ($publications->isEmpty())
                                    <div class="container" style="text-align: center; font-size: 30px; font-weight: bold;">
                                        <p>No posts found.</p>
                                    </div>
                                @else
                                    @foreach ($publications->reverse() as $publication)
                                        <div class="main-wraper unique-class " id="publication-{{ $publication->id }}">
                                            <div class="user-post">
                                                <div class="friend-info">
                                                    @if ($publication->user->image)
                                                        <figure>
                                                            <img alt=""
                                                                src="{{ asset('users/' . $publication->user->image) }}">
                                                        </figure>
                                                    @else
                                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($publication->user->name) }}&background=104d93&color=fff"
                                                            height="25px" width="25px" alt="" class="mr-2"
                                                            style="border-radius: 50%;">
                                                    @endif


                                                    <div class="friend-name">
                                                        <div class="more">
                                                            @if (Auth::check())
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
                                                                                    r="1">
                                                                                </circle>
                                                                                <circle cx="5" cy="12"
                                                                                    r="1">
                                                                                </circle>
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
                                                                                <a href="#" class="delete-post-btn"
                                                                                    data-publication-id="{{ $publication->id }}">
                                                                                    <i class="icofont-ui-delete"></i>Delete
                                                                                    Post
                                                                                </a>

                                                                            </li>

                                                                        </ul>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        </div>
                                                        <ins><a title=""
                                                                @if (auth()->check() && auth()->user()->name == $publication->user->name) {{-- If user is logged in and their name matches the publication user's name --}}
                                                                {{ $publication->user->name }}
                                                            @else
                                                                {{-- If user is not logged in or their name doesn't match --}}
                                                                href="{{ route('profile.show', $publication->user) }}" @endif>{{ $publication->user->name }}</a>
                                                            <span><i class="icofont-globe"></i>
                                                                published:
                                                                {{ \Carbon\Carbon::parse($publication->created_at)->isoFormat('MMM, DD YYYY, h:mm A') }}</span>
                                                    </div>

                                                    @if ($publication->image)
                                                        <img src="{{ asset('images/' . $publication->image) }}"
                                                            height="400px" width="600px" alt="">
                                                    @endif

                                                    <div class="post-meta">
                                                        <p>
                                                        <p>
                                                            @if ($publication->user_abonner_id)
                                                                {{ $publication->contenu }}

                                                                @if (!empty($publication->domain))
                                                                    <p><strong>Domain:</strong>
                                                                        {{ $publication->domain }}
                                                                    </p>
                                                                @endif
                                                            @else
                                                                {{ $publication->contenu }}
                                                                @if (!empty($publication->domain))
                                                                    <p><strong>Domain:</strong>
                                                                        {{ $publication->domain }}
                                                                    </p>
                                                                @endif
                                                            @endif
                                                        </p>
                                                        </p>
                                                        <div class="we-video-info">
                                                            <ul>
                                                                <li>
                                                                    <span title="Likes" class="liked like-button"
                                                                        data-publication-id="{{ $publication->id }}">
                                                                        <i>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="16" height="16"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
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
                                                                                stroke-linecap="round" stroke-width="2"
                                                                                stroke="currentColor" fill="none"
                                                                                viewBox="0 0 24 24" height="16"
                                                                                width="16"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                                                            </svg>
                                                                        </i>
                                                                        <ins> <span
                                                                                class="commentaire-count unique-commentaire-count-{{ $publication->id }}">
                                                                                {{ $publication->totalComments() }}
                                                                            </span> </ins>
                                                                    </span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="stat-tools">
                                                            <div class="box"
                                                                data-publication-id="{{ $publication->id }}">
                                                                <div class="Like">
                                                                    <a class="Like__link"><i class="icofont-like"></i>
                                                                        Like</a>
                                                                </div>
                                                            </div>
                                                            <div class="box">
                                                            </div>
                                                            <a title="" href="#" class="comment-to"
                                                                data-publication-id="{{ $publication->id }}">
                                                                <i class="icofont-comment"></i>
                                                                Comment
                                                            </a>
                                                            <div class="new-comment" style="display: none;">
                                                                <form id="commentForm"
                                                                    action="{{ route('add-comment') }}" method="POST">
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
                                    @endforeach
                                @endif

                                <!-- HTML code for the modal -->


                                {{-- <div class="loadmore">
                                    <div class="sp sp-bars"></div>
                                    <a href="#" title="" data-ripple="">Load More..</a>
                                </div><!-- loadmore buttons --> --}}
                            </div>
                            <div class="col-lg-3">
                                <aside class="sidebar static right">


                                   


                                    <div class="widget stick-widget" id="following-widget">
                                        <h4 class="widget-title">Who's following</h4>
                                        <ul class="followers">
                                            @if ($suggestedUsers->isEmpty())
                                                <p>No suggested users to display.</p>
                                            @else
                                                @foreach ($suggestedUsers as $user)
                                                    <li>
                                                        @if ($user->image)
                                                            <figure><img src="{{ asset('users/' . $user->image) }}"
                                                                    alt=""></figure>
                                                        @else
                                                            <figure><img
                                                                    src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=104d93&color=fff"
                                                                    alt=""></figure>
                                                        @endif
                                                        <div class="friend-meta">
                                                            <h4>
                                                                <a
                                                                    href="{{ route('profile.show', $user) }}">{{ $user->name }}</a>

                                                                <span>{{ $user->institut }}</span>
                                                            </h4>
                                                            <a class="underline follow-link" title=""
                                                                href="#"
                                                                data-user-id="{{ $user->id }}">Follow</a>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>

                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- content -->
    <div class="modal fade" id="uploadImageModal" tabindex="-1" role="dialog" aria-labelledby="uploadImageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadImageModalLabel">Upload Your Picture</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="imageUploadForm" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="file" name="image" id="image" accept="image/*">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Upload Cover Photo Modal -->
    <div class="modal fade" id="uploadCoverPhotoModal" tabindex="-1" role="dialog"
        aria-labelledby="uploadCoverPhotoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadCoverPhotoModalLabel">Upload Your Cover Photo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="uploadCoverPhotoForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="file" name="cover_photo" id="cover_photo" accept="image/*">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="post-new-popup">
        <div class="popup">
            <span class="popup-closed">
                <i class="icofont-close"></i>
            </span>
            <div class="popup-meta">
                <div class="popup-head">
                    <h5>
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-plus">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                        </i>Create New Post
                    </h5>
                </div>
                <div class="post-new">


                    <form method="post" action="{{ route('publications.store') }}" class="c-form"
                        enctype="multipart/form-data">
                        @csrf
                        <!-- This is important for Laravel to validate the form submission -->


                        <textarea id="emojionearea1" name="contenu" placeholder="What's On Your Mind?" required></textarea>
                        @error('contenu')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror


                        <div class="activity-post">
                            <div class="checkbox">
                                <input type="checkbox" id="checkbox" name="Activity_Feed" checked>
                                <label for="checkbox">
                                    <span>Activity Feed</span>
                                </label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" id="checkbox2" name="story" checked>
                                <label for="checkbox2">
                                    <span>My Story</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="domain">Domain</label>
                            <select id="domain" name="domain" class="form-control" required>

                                <option value="">Select Domain</option>
                                <option value="Computer science">Computer science</option>
                                <option value="Management/economics">Management/economics</option>
                                <option value="Mechanical">Mechanical</option>
                                <option value="Electric">Electric</option>
                                <option value="Science">Science</option>
                                <option value="Lettre">Lettre</option>
                            </select>
                        </div>
                        <style>
                            #domain {
                                display: block !important;
                            }

                            .chosen-container-single {
                                display: none;
                            }
                        </style>
                        <div class="post-newmeta">
                            <input type="file" name="image">
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#uploadCoverPhotoForm').submit(function(e) {
                e.preventDefault(); // Prevent the default form submission

                var coverPhotoInput = $('#cover_photo'); // Get the cover photo input element
                var coverPhotoFile = coverPhotoInput[0].files[0]; // Get the selected file

                // Check if the cover photo input is empty
                if (!coverPhotoFile) {
                    // Show a toast message indicating that the cover photo input is empty
                    showToast('error', 'Please select a cover photo.');
                    return; // Exit the function
                }

                var formData = new FormData(this); // Create FormData object from the form

                $.ajax({
                    url: '{{ route('upload.cover.photo') }}', // URL of the uploadCoverPhoto endpoint
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
                        $('#uploadCoverPhotoModal').modal('hide'); // Hide the modal
                        reloadCompletionProgress(); // Reload completion progress
                    },
                    error: function(xhr, status, error) {
                        // Show error toast message
                        var errorMessage = xhr.responseJSON ? xhr.responseJSON.message :
                            'An error occurred.';
                        showToast('error', errorMessage);
                    }
                });

                function showToast(type, message) {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        hideMethod: 'slideUp',
                        timeOut: 5000,
                    };

                    switch (type) {
                        case 'success':
                            toastr.success(message);
                            break;
                        case 'error':
                            toastr.error(message);
                            break;
                    }
                }

            });
        });

        function reloadCompletionProgress() {
            // Perform AJAX request to get the updated content
            $.ajax({
                url: location.href, // Reload the current URL
                type: 'GET', // Use GET method
                success: function(response) {
                    // Find the elements in the response and update the existing ones
                    var progressOuter = $(response).find('.progress__outer');
                    var progressInner = $(response).find('.progress__inner');
                    var profComplete = $(response).find('.prof-complete');
                    $('.prof-complete').replaceWith(profComplete);

                    // Update the existing elements with the new ones
                    $('.progress__outer').replaceWith(progressOuter);
                    $('.progress__inner').replaceWith(progressInner);

                    // Update the user-dp element
                },
                error: function(xhr, status, error) {
                    // Handle errors if needed
                    console.error(xhr.responseText);
                }
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#imageUploadForm').submit(function(e) {
                e.preventDefault();

                var formData = new FormData($(this)[0]);
                var imageInput = $('#image')[0];

                // Check if the file input is empty
                if (imageInput.files.length === 0) {
                    showToast('error', 'Please select an image.');
                    return; // Exit the function early if no image is selected
                }

                // Proceed with the AJAX request if an image is selected
                $.ajax({
                    url: "{{ route('upload.image') }}",
                    type: 'POST',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // Get CSRF token from meta tag
                    },
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        showToast('success', response.message);
                        $('#uploadImageModal').modal('hide');
                        reloadCompletionProgress(); // Reload completion progress

                    },
                    error: function(xhr, status, error) {
                        showToast('error', error);
                    }
                });
            });

            function reloadCompletionProgress() {
                // Perform AJAX request to get the updated content
                $.ajax({
                    url: location.href, // Reload the current URL
                    type: 'GET', // Use GET method
                    success: function(response) {
                        // Find the elements in the response and update the existing ones
                        var progressOuter = $(response).find('.progress__outer');
                        var progressInner = $(response).find('.progress__inner');
                        var profComplete = $(response).find('.prof-complete');
                        $('.prof-complete').replaceWith(profComplete);

                        // Update the existing elements with the new ones
                        $('.progress__outer').replaceWith(progressOuter);
                        $('.progress__inner').replaceWith(progressInner);

                        // Update the user-dp element
                        var userDp = $(response).find('.user-dp');
                        $('.user-dp').replaceWith(userDp);
                    },
                    error: function(xhr, status, error) {
                        // Handle errors if needed
                        console.error(xhr.responseText);
                    }
                });
            }


            function showToast(type, message) {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    hideMethod: 'slideUp',
                    timeOut: 5000,
                };

                switch (type) {
                    case 'success':
                        toastr.success(message);
                        break;
                    case 'error':
                        toastr.error(message);
                        break;
                }
            }
        });
    </script>

    {{-- follow link  --}}
    <script>
        $(document).ready(function() {
            // Event listener for the "Follow" link
            $(document).on('click', '.follow-link', function(e) {
                e.preventDefault();
                var userId = $(this).data('user-id');
                // Check if the user is authenticated
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
                        4('success', response.message);
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

        function showToast(type, message) {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                hideMethod: 'slideUp',
                timeOut: 5000,
            };

            switch (type) {
                case 'success':
                    toastr.success(message);
                    break;
                case 'error':
                    toastr.error(message);
                    break;
            }
        }
    </script>
    <script>
        $(document).ready(function() {

            $(document).on('click', '.follow-button', function(e) {

                e.preventDefault();
                var userId = $(this).closest('li').data('user-id');
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
                        // Update UI or show success message
                        showToast('success', response.message);

                        // AJAX request to update UI after following a user
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
                                console.log("followersCount fi follow" +
                                    followersCount);
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
    {{-- ajouter like  --}}
    <script>
        $(document).ready(function() {
            $('.Like__link').click(function(e) {
                e.preventDefault();
                var publicationId = $(this).closest('.box').data('publication-id');
                var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Récupérer le jeton CSRF
                var isAuthenticated = {{ auth()->check() ? 'true' : 'false' }};
                if (!isAuthenticated) {
                    showToast('error', 'You need to log in to follow users.');
                    // Optionally, redirect to the login page
                    setTimeout(function() {
                        window.location.href = '{{ route('login') }}';
                    }, 2000); // Redirect after 2 seconds
                    return;
                }
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

                            if (isAuthenticated && comment.user.id === authenticatedUserId) {
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
            var isAuthenticated = {{ auth()->check() ? 'true' : 'false' }};
            if (!isAuthenticated) {
                showToast('error', 'You need to log in to follow users.');
                // Optionally, redirect to the login page
                setTimeout(function() {
                    window.location.href = '{{ route('login') }}';
                }, 2000); // Redirect after 2 seconds
                return;
            }
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
    <script>
        var authenticatedUserId = {{ auth()->check() ? auth()->id() : 'null' }};
        var isAuthenticated = {{ auth()->check() ? 'true' : 'false' }};
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
                                if (isAuthenticated && comment.user.id ===
                                    authenticatedUserId) {
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



                        }
                    },
                    error: function(xhr, status, error) {
                        showToast('error', 'You need to log in to follow users.');
                        // Optionally, redirect to the login page
                        setTimeout(function() {
                            window.location.href = '{{ route('login') }}';
                        }, 2000); // Redirect after 2 seconds
                        return;
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

                                if (isAuthenticated && comment.user.id ===
                                    authenticatedUserId) {
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



    <script>
        $(document).ready(function() {
            // Event listener for the like button
            $('.like-button').click(function() {
                var publicationId = $(this).data('publication-id');
                var isAuthenticated = {{ auth()->check() ? 'true' : 'false' }};
                if (!isAuthenticated) {
                    showToast('error', 'You need to log in to follow users.');
                    // Optionally, redirect to the login page
                    setTimeout(function() {
                        window.location.href = '{{ route('login') }}';
                    }, 2000); // Redirect after 2 seconds
                    return;
                }
                // Send AJAX request to fetch liked users
                $.ajax({
                    url: '/getLikedUsers/' + publicationId,
                    type: 'GET',
                    success: function(response) {
                        // Populate the modal with the list of liked users
                        $('#likedUsersList').empty();
                        response.likedUsers.forEach(function(user) {
                            $('#likedUsersList').append(
                                '<li class="list-group-item">' +
                                '<div class="d-flex justify-content-between align-items-center">' +
                                '<div class="d-flex align-items-center">' +
                                '<img src="' + user.image +
                                '" class="rounded-circle me-3" alt="User Image" width="50">' +
                                '<div>' +
                                '<h5 class="mb-0"><a href="' + user.profileLink +
                                '">' + user.name + '</a></h5>' +
                                '<p class="mb-0">Institution: ' + user.institut +
                                '</p>' +
                                '</div>' +
                                '</div>' +
                                // '<a href="#" class="btn btn-primary ms-auto">Follow</a>' +
                                '</div>' +
                                '</li>'
                            );
                        });

                        // Show the modal
                        $('#likeModal').css('display', 'block');
                    },



                    error: function(xhr, status, error) {
                        console.error(error);
                        alert('Failed to fetch liked users.');
                    }
                });
            });

            // Close the modal when the close button is clicked
            $('.close').click(function() {
                $('#likeModal').css('display', 'none');
            });
        });
    </script>
    <div id="likeModal" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Liked Users</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="likedUsersList"></ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


@endsection
