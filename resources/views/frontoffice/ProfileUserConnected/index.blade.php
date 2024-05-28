@extends('frontoffice.layouts.index')

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <section>
        <div class="gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="page-contents" class="row merged20">
                            <div class="col-lg-3">
                                <aside class="sidebar static left">



                                    <div class="widget">
                                        <h4 class="widget-title">Ask Research Question?</h4>
                                        <div class="ask-question">
                                            <i class="icofont-question-circle"></i>
                                            <h6>Ask questions in Q&A to get help from experts in your field.</h6>
                                            <a class="ask-qst" href="#" title="">Ask a question</a>
                                        </div>
                                    </div>
                                    <div class="widget">
                                        <h4 class="widget-title">Explor Events <a class="see-all" href="#"
                                                title="">See All</a></h4>
                                        <div class="rec-events bg-purple">
                                            <i class="icofont-gift"></i>
                                            <h6><a title="" href="">BZ University good night event in
                                                    columbia</a></h6>
                                            <img alt="" src="/frontoffice/images/clock.png">
                                        </div>
                                        <div class="rec-events bg-blue">
                                            <i class="icofont-microphone"></i>
                                            <h6><a title="" href="">The 3rd International Conference
                                                    2020</a></h6>
                                            <img alt="" src="/frontoffice/images/clock.png">
                                        </div>
                                    </div>


                                </aside>
                            </div>
                            <div class="col-lg-9">
                                <div class="group-feed">
                                    <div class="group-avatar">


                                        <img src="{{ $user->cover_photo ? asset('cover_photos/' . $user->cover_photo) : asset('noimagecouvrture.jpg') }}"
                                            alt="" width="200px" height="200px">
                                        {{-- <a href="#" title=""><i class="icofont-check-circled"></i>Follow</a> --}}
                                        @if (auth()->check())
                                            @if ($user->abonnements->contains(auth()->id()))
                                                <a href="#" class="unfollow-button" data-user-id="{{ $user->id }}"
                                                    title="" data-ripple=""><i class="icofont-star"></i>Unfollow</a>
                                            @else
                                                <a href="#" class="follow-button" data-user-id="{{ $user->id }}"
                                                    title="" data-ripple=""><i class="icofont-star"></i>Follow</a>
                                            @endif
                                        @else
                                            <!-- If the user is not logged in, show follow button -->
                                            <a href="#" class="follow-button" data-user-id="{{ $user->id }}"
                                                title="" data-ripple=""><i class="icofont-star"></i>Follow</a>
                                        @endif
                                        @if ($user->image)
                                            <figure class="group-dp"><img src="{{ asset('users/' . $user->image) }}"
                                                    alt="">
                                            </figure>
                                        @else
                                            <figure class="group-dp"><img
                                                    src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=104d93&color=fff"
                                                    alt=""></figure>
                                        @endif
                                    </div>
                                    <div class="grp-info about">
                                        <h4>{{ $user->name }}<span>@ {{ $user->name }}</span></h4>
                                        <ul class="joined-info">
                                            <li><span>Joined:</span>
                                                {{ \Carbon\Carbon::parse($user->created_at)->format('F Y') }}</li>
                                            <li id="follow-count-container"><span>Follow:</span> <span
                                                    id="follow-count">{{ $followingCount2 }}</span></li>
                                            <li><span>Posts:</span> {{ $user->totalPosts }}</li>
                                        </ul>
                                        <ul class="nav nav-tabs about-btn">
                                            <li class="nav-item"><a class="active" href="#posts"
                                                    data-toggle="tab">Posts</a></li>

                                            <li class="nav-item"><a class="" href="#friends"
                                                    data-toggle="tab">Friends</a></li>
                                            <li class="nav-item"><a class="" href="#about"
                                                    data-toggle="tab">About</a></li>
                                        </ul>
                                        <ul class="more-grp-info">
                                            <li>
                                                <form class="c-form" method="post">
                                                    <input type="text" placeholder="Search...">
                                                    <i class="icofont-search-1"></i>
                                                </form>
                                            </li>
                                            <li>

                                            </li>
                                        </ul>
                                    </div>
                                    <div class="main-wraper">
                                        <div class="grp-about">
                                            <div class="row">
                                                <div class="col-lg-8 col-md-6">
                                                    <h4>About Me!</h4>
                                                    <p>Hi! My name is {{ $user->name }} </p>
                                                    <ul class="badges">
                                                        <li><img src="/frontoffice/images/badges/badge2.png" alt="">
                                                        </li>
                                                        <li><img src="/frontoffice/images/badges/badge3.png" alt="">
                                                        </li>
                                                        <li><img src="/frontoffice/images/badges/badge4.png"
                                                                alt="">
                                                        </li>
                                                        <li><img src="/frontoffice/images/badges/badge5.png"
                                                                alt="">
                                                        </li>
                                                        <li><img src="/frontoffice/images/badges/badge7.png"
                                                                alt="">
                                                        </li>
                                                        <li><img src="/frontoffice/images/badges/badge8.png"
                                                                alt="">
                                                        </li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="tab-content">
                                                <div class="tab-pane active fade show " id="posts">
                                                    <div class="row merged20">
                                                        <div class="col-lg-8">
                                                            @if (session('success'))
                                                                <div class="alert alert-success">
                                                                    {{ session('success') }}
                                                                </div>
                                                            @endif
                                                            <style>
                                                                .login-message {
                                                                    margin-bottom: 10px;
                                                                    font-size: 16px;
                                                                }

                                                                .login-button {
                                                                    display: inline-block;
                                                                    padding: 8px 16px;
                                                                    background-color: #007bff;
                                                                    color: #fff;
                                                                    text-decoration: none;
                                                                    border-radius: 5px;
                                                                }

                                                                .login-button:hover {
                                                                    background-color: #0056b3;
                                                                }
                                                            </style>


                                                            <div class="main-wraper" id="new-post-container">
                                                                <span class="new-title">Create New Post</span>
                                                                <div class="new-post">
                                                                    @if (auth()->check())
                                                                        @php
                                                                            $userId = auth()->id();
                                                                            $User = $user->id;
                                                                            $isFollowing = App\Models\abonnements::where(
                                                                                'user_id',
                                                                                $userId,
                                                                            )
                                                                                ->where('abonne_id', $User)
                                                                                ->orWhere(function ($query) use (
                                                                                    $User,
                                                                                    $userId,
                                                                                ) {
                                                                                    $query
                                                                                        ->where('user_id', $User)
                                                                                        ->where('abonne_id', $userId);
                                                                                })
                                                                                ->exists();
                                                                        @endphp

                                                                        @if ($isFollowing)
                                                                            <form method="post">
                                                                                <i class="icofont-pen-alt-1"></i>
                                                                                <input type="text"
                                                                                    placeholder="Create New Post">
                                                                            </form>
                                                                        @else
                                                                            <p class="login-message">You must follow this
                                                                                user to make publications.</p>
                                                                        @endif
                                                                    @else
                                                                        <!-- Show message if user is not logged in -->
                                                                        <p class="login-message">You must login to make
                                                                            publications. <a href="/login"
                                                                                class="login-button">Login</a></p>
                                                                    @endif
                                                                </div>
                                                            </div><!-- create new post -->





                                                            @if ($publications->isEmpty())
                                                                <div class="container"
                                                                    style="text-align: center; font-size: 30px; font-weight: bold;">
                                                                    <p>No posts found.</p>
                                                                </div>
                                                            @else
                                                                @foreach ($publications->reverse() as $publication)
                                                                    <div class="main-wraper unique-class "
                                                                        id="publication-{{ $publication->id }}">
                                                                        <div class="user-post">
                                                                            <div class="friend-info">
                                                                                @if ($publication->user->image)
                                                                                    <figure>
                                                                                        <img alt=""
                                                                                            src="{{ asset('users/' . $publication->user->image) }}">
                                                                                    </figure>
                                                                                @else
                                                                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($publication->user->name) }}&background=104d93&color=fff"
                                                                                        height="25px" width="25px"
                                                                                        alt="" class="mr-2"
                                                                                        style="border-radius: 50%;">
                                                                                @endif


                                                                                <div class="friend-name">
                                                                                    <div class="more">
                                                                                        @if (Auth::check())
                                                                                            @if ($publication->user->id == Auth::user()->id)
                                                                                                <div
                                                                                                    class="more-post-optns">
                                                                                                    <i class="">
                                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                            width="24"
                                                                                                            height="24"
                                                                                                            viewBox="0 0 24 24"
                                                                                                            fill="none"
                                                                                                            stroke="currentColor"
                                                                                                            stroke-width="2"
                                                                                                            stroke-linecap="round"
                                                                                                            stroke-linejoin="round"
                                                                                                            class="feather feather-more-horizontal">
                                                                                                            <circle
                                                                                                                cx="12"
                                                                                                                cy="12"
                                                                                                                r="1">
                                                                                                            </circle>
                                                                                                            <circle
                                                                                                                cx="19"
                                                                                                                cy="12"
                                                                                                                r="1">
                                                                                                            </circle>
                                                                                                            <circle
                                                                                                                cx="5"
                                                                                                                cy="12"
                                                                                                                r="1">
                                                                                                            </circle>
                                                                                                        </svg>
                                                                                                    </i>
                                                                                                    <ul>
                                                                                                        <li class="edit-post-btn"
                                                                                                            data-publication-id="{{ $publication->id }}"
                                                                                                            data-post-content="{{ $publication->contenu }}"
                                                                                                            data-post-domain="{{ $publication->domain }}">
                                                                                                            <i
                                                                                                                class="icofont-pen-alt-1"></i>Edit
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
                                                                                        @endif
                                                                                    </div>
                                                                                    <ins><a title=""
                                                                                            href="{{ route('profile.show', $publication->user) }}">{{ $publication->user->name }}</a>
                                                                                        <span><i class="icofont-globe"></i>
                                                                                            published:
                                                                                            {{ \Carbon\Carbon::parse($publication->created_at)->isoFormat('MMM, DD YYYY, h:mm A') }}</span>
                                                                                </div>

                                                                                @if ($publication->image)
                                                                                    <img src="{{ asset('images/' . $publication->image) }}"
                                                                                        height="400px" width="600px"
                                                                                        alt="">
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
                                                                                                <span title="Likes"
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
                                                                                                    <ins>
                                                                                                        <span
                                                                                                            class="like-count unique-like-count-{{ $publication->id }}">
                                                                                                            {{ $publication->jaime_publications->count() }}
                                                                                                        </span>
                                                                                                    </ins>
                                                                                                </span>
                                                                                            </li>
                                                                                            <li>
                                                                                                <span title="Comments"
                                                                                                    class="Recommend">
                                                                                                    <i>
                                                                                                        <svg class="feather feather-message-square"
                                                                                                            stroke-linejoin="round"
                                                                                                            stroke-linecap="round"
                                                                                                            stroke-width="2"
                                                                                                            stroke="currentColor"
                                                                                                            fill="none"
                                                                                                            viewBox="0 0 24 24"
                                                                                                            height="16"
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
                                                                                                <a class="Like__link"><i
                                                                                                        class="icofont-like"></i>
                                                                                                    Like</a>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="box">
                                                                                        </div>
                                                                                        <a title="" href="#"
                                                                                            class="comment-to"
                                                                                            data-publication-id="{{ $publication->id }}">
                                                                                            <i class="icofont-comment"></i>
                                                                                            Comment
                                                                                        </a>
                                                                                        <div class="new-comment"
                                                                                            style="display: none;">
                                                                                            <form id="commentForm"
                                                                                                action="{{ route('add-comment') }}"
                                                                                                method="POST">
                                                                                                @csrf
                                                                                                <input type="hidden"
                                                                                                    name="publication_id"
                                                                                                    value="{{ $publication->id }}">
                                                                                                <input type="text"
                                                                                                    name="content"
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
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewBox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        class="feather feather-plus">
                                                                                        <line x1="12"
                                                                                            y1="5" x2="12"
                                                                                            y2="19"></line>
                                                                                        <line x1="5"
                                                                                            y1="12" x2="19"
                                                                                            y2="12"></line>
                                                                                    </svg>
                                                                                </i>Create New Post
                                                                            </h5>
                                                                        </div>
                                                                        <div class="post-new">


                                                                            <form method="post"
                                                                                action="{{ route('publicationsUser.store') }}"
                                                                                class="c-form"
                                                                                enctype="multipart/form-data">
                                                                                @csrf
                                                                                <!-- This is important for Laravel to validate the form submission -->
                                                                                <input type="hidden" name="userprofile"
                                                                                    value="{{ $user->id }}"
                                                                                    id="">
                                                                                <div class="post-newmeta">
                                                                                    <textarea id="emojionearea1" name="contenu" placeholder="What's On Your Mind?" required></textarea>
                                                                                    @error('contenu')
                                                                                        <p class="text-red-500 text-xs italic">
                                                                                            {{ $message }}</p>
                                                                                    @enderror
                                                                                </div>


                                                                                <div class="form-group">
                                                                                    <label for="domain">Domain</label>
                                                                                    <select id="domain" name="domain"
                                                                                        class="form-control" required>

                                                                                        <option value="">Select
                                                                                            Domain</option>
                                                                                        <option value="Computer science">
                                                                                            Computer science</option>
                                                                                        <option
                                                                                            value="Management/economics">
                                                                                            Management/economics</option>
                                                                                        <option value="Mechanical">
                                                                                            Mechanical
                                                                                        </option>
                                                                                        <option value="Electric">
                                                                                            Electric</option>
                                                                                        <option value="Science">Science
                                                                                        </option>
                                                                                        <option value="Lettre">Lettre
                                                                                        </option>
                                                                                    </select>
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
                                                                                </div>
                                                                                <div class="post-newmeta">
                                                                                    <label for="inputField"
                                                                                        class="btn btn-info">uploid
                                                                                        Document</label>
                                                                                    <input type="file" name="image"
                                                                                        id="inputField"
                                                                                        style="display:none">
                                                                                    @error('image')
                                                                                        <p class="text-red-500 text-xs italic">
                                                                                            {{ $message }}</p>
                                                                                    @enderror
                                                                                </div>

                                                                                <button type="submit"
                                                                                    class="main-btn">Publish</button>
                                                                            </form>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <!-- New post popup -->
                                                        @endif
                                                        <div class="col-lg-4">
                                                            <aside class="sidebar static left">

                                                                <div class="widget">
                                                                    <h4 class="widget-title">Follow People <a
                                                                            title="" href="#"
                                                                            class="see-all">See All</a></h4>

                                                                    <ul class="invitepage" id="suggested-users">
                                                                        @if ($suggestedUsers->isEmpty())
                                                                            <p>No suggested users to display.</p>
                                                                        @else
                                                                            @foreach ($suggestedUsers as $user)
                                                                                <li data-user-id="{{ $user->id }}">
                                                                                    @if ($user->image)
                                                                                        <figure>
                                                                                            <img alt=""
                                                                                                src="{{ asset('users/' . $user->image) }}"
                                                                                                height="50px"
                                                                                                width="50px">
                                                                                            <a
                                                                                                href="{{ route('profile.show', $user) }}">{{ $user->name }}</a>
                                                                                        </figure>
                                                                                    @else
                                                                                        <figure><img
                                                                                                src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=104d93&color=fff"
                                                                                                alt=""
                                                                                                height="50px"
                                                                                                width="50px">
                                                                                            <a
                                                                                                href="{{ route('profile.show', $user) }}">{{ $user->name }}</a>
                                                                                        </figure>
                                                                                    @endif
                                                                                    <a class="underline follow-link"
                                                                                        title="" href="#"
                                                                                        data-user-id="{{ $user->id }}">Follow</a>
                                                                                </li>
                                                                            @endforeach
                                                                        @endif
                                                                    </ul>
                                                                </div>


                                                            </aside>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="tab-pane fade" id="friends">
                                                    <h5 class="tab-title">Friends <span>{{ $followingCount2 }}</span></h5>
                                                    <ul class="pix-filter">
                                                        <li><a title="" href="#" class="active">All
                                                                Friends</a></li>

                                                    </ul>
                                                    <div class="row merged-10 col-xs-6" id="listamis">

                                                        @foreach ($followingUsers2 as $following)
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
                                                                    @if ($following->id !== auth()->id())
                                                                        @if ($following->abonnements->contains(auth()->id()))
                                                                            <a href="#" class="unfollow-button"
                                                                                data-user-id="{{ $following->id }}"
                                                                                title="" data-ripple=""><i
                                                                                    class="icofont-star"></i>Unfollow</a>
                                                                        @else
                                                                            <a href="#" class="follow-button"
                                                                                data-user-id="{{ $following->id }}"
                                                                                title="" data-ripple=""><i
                                                                                    class="icofont-star"></i>Follow</a>
                                                                        @endif
                                                                    @else
                                                                        <p>Your Account</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endforeach


                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="about">
                                                    <div class="row merged20">
                                                        <div class="col-lg-8">
                                                            <div class="main-wraper">
                                                                <h5 class="main-title">Personal</h5>
                                                                <div class="info-block-list">
                                                                    <ul>
                                                                        <li>Date of Birth:
                                                                            <span>{{ $user->date_of_birth }}</span>
                                                                        </li>
                                                                        <li>Location: <span>{{ $user->location }}</span>
                                                                        </li>
                                                                        <li>Email: <span>{{ $user->email }}</span>
                                                                        </li>


                                                                    </ul>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-lg-4">
                                                            <aside class="sidebar">

                                                                <div class="widget">
                                                                    <h4 class="widget-title">User stats</h4>
                                                                    <ul class="user-stat">
                                                                        <li>
                                                                            <i class="icofont-lollipop"></i>
                                                                            <span>Last Post
                                                                                <em>{{ $user->lastPost ? $user->lastPost->created_at->diffForHumans() : 'No posts yet' }}</em></span>
                                                                        </li>
                                                                        <li>
                                                                            <i class="icofont-spotify"></i>
                                                                            <span>Last comment
                                                                                <em>{{ $user->lastComment ? $user->lastComment->created_at->diffForHumans() : 'No comments yet' }}</em></span>
                                                                        </li>

                                                                        <li>
                                                                            <i class="icofont-like"></i>
                                                                            <span>Most Liked Post
                                                                                @if ($mostLikedPost)
                                                                                    <em>{{ $mostLikedPost->jaime_publications_count }}
                                                                                        Likes</em>
                                                                                @else
                                                                                    <em>No posts liked yet</em>
                                                                                @endif
                                                                            </span>
                                                                        </li>

                                                                        <li>
                                                                            <i class="icofont-user-alt-4"></i>
                                                                            <span>Last Friend Added
                                                                                <em>{{ $user->lastFriendAdded ? $user->lastFriendAdded->created_at->diffForHumans() : 'No friends added yet' }}</em>
                                                                            </span>
                                                                        </li>

                                                                    </ul>
                                                                </div><!-- complete profile widget -->
                                                            </aside>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    {{-- ajouter like  --}}
    <script>
        $(document).ready(function() {
            $('.Like__link').click(function(e) {
                e.preventDefault();

                // Check if user is logged in
                var isAuthenticated = {{ auth()->check() ? 'true' : 'false' }};
                if (!isAuthenticated) {
                    showToast('error', 'You need to log in to follow users.');
                    // Optionally, redirect to the login page
                    setTimeout(function() {
                        window.location.href = '{{ route('login') }}';
                    }, 2000); // Redirect after 2 seconds
                    return;
                }

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

        // Function to check if the user is logged in
        function isLoggedIn() {
            return '{{ auth()->check() }}' === '1';
        }

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




                                @if (Auth::check())
                                    if (comment.user.id === {{ auth()->id() }}) {
                                        commentHtml +=
                                            '<a title="Update" href="#" class="update-comment"><i class="icofont-ui-edit"></i></a>' +
                                            '<a title="Delete" href="#" class="delete-comment"><i class="icofont-trash"></i></a>';
                                    }
                                @endif

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
                console.log("aaa")
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

                        var likeCountElement = $('.unique-commentaire-count-' + response
                            .publicationId);
                        likeCountElement.text(response.totalComments);

                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        var errorMessage = error;
                        if (xhr.status === 401) {
                            errorMessage = 'Unauthorized';
                        }
                        showToast('error', errorMessage);
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



                            @if (Auth::check())
                                if (comment.user.id === {{ auth()->id() }}) {
                                    commentHtml +=
                                        '<a title="Update" href="#" class="update-comment"><i class="icofont-ui-edit"></i></a>' +
                                        '<a title="Delete" href="#" class="delete-comment"><i class="icofont-trash"></i></a>';
                                }
                            @endif

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



                                @if (Auth::check())
                                    if (comment.user.id === {{ auth()->id() }}) {
                                        commentHtml +=
                                            '<a title="Update" href="#" class="update-comment"><i class="icofont-ui-edit"></i></a>' +
                                            '<a title="Delete" href="#" class="delete-comment"><i class="icofont-trash"></i></a>';
                                    }
                                @endif

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
                if (!isLoggedIn()) {
                    showToast('info', 'You must login to like a publication.');
                    return;
                }
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
                            $('div.container').append(
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
                                <option value="">Select Domain</option>
                                <option value="Computer science">Computer science</option>
                                <option value="Management/economics">Management/economics</option>
                                <option value="Mechanical">Mechanical</option>
                                <option value="lectric">Electric</option>
                                <option value="Science">Science</option>
                                <option value="Lettre">Letter</option>
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
            // Event listener for the "Unfollow" button
            $(document).on('click', '.unfollow-button', function(e) {
                e.preventDefault();
                var button = $(this);
                var userId = button.data('user-id');

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
                        // Update button to "Follow"
                        button.removeClass('unfollow-button').addClass('follow-button').html(
                            '<i class="icofont-star"></i>Follow');
                        // Update data attributes
                        button.attr('class', 'follow-button');
                        button.attr('data-user-id', userId);
                        $('#new-post-container').load(location.href +
                            ' #new-post-container > *');
                        $('#listamis').load(location.href +
                            ' #listamis > *');
                        // $('#follow-count').load(location.href +
                        // ' #follow-count > *');
                        $('.group-avatar').load(location.href + ' .group-avatar > *');


                        $('#suggested-users').load(location.href + ' #suggested-users > *');

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
    <script>
        $(document).ready(function() {
            // Event listener for the "Follow" link
            $(document).on('click', '.follow-link', function(e) {
                e.preventDefault();
                var button = $(this);

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


                                $('.group-avatar').load(location.href + ' .group-avatar > *');

                                $('#new-post-container').load(location.href +
                                    ' #new-post-container > *');
                                $('#listamis').load(location.href +
                                    ' #listamis > *');
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

                                button.removeClass('follow-button').addClass(
                                    'unfollow-button').html(
                                    '<i class="icofont-star"></i>unfollow');
                                // Update data attributes
                                button.attr('class', 'unfollow-button');
                                button.attr('data-user-id', userId);

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
    <script>
        $(document).ready(function() {
            $(document).on('click', '.follow-button', function(e) {
                e.preventDefault();

                var button = $(this);
                var userId = button.data('user-id');
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






                        $('#listamis').load(location.href +
                            ' #listamis > *');




                        // Update button to "Follow"
                        button.removeClass('follow-button').addClass('unfollow-button').html(
                            '<i class="icofont-star"></i>unfollow');
                        // Update data attributes
                        button.attr('class', 'unfollow-button');
                        button.attr('data-user-id', userId);
                        // var followCount = parseInt($('#follow-count').text());
                        // $('#follow-count').text(followCount + 1);

                        var followcount = $(response).find(
                            '#follow-count').html();
                        $('#follow-count').html(followcount);
                        // Load only the new post form




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

                        $('.new-post').load(location.href + ' .new-post > *', function() {
                            // Bind click event for the form to trigger the modal
                            $('.new-post form').click(function(e) {
                                e.preventDefault();
                                $('.post-new-popup').modal('show').addClass(
                                    'active'
                                ); // Show the modal and add 'active' class
                            });
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
