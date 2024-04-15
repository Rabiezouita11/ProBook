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
                                <li class="nav-item"><a class="" href="#followers"
                                        data-toggle="tab">Followers</a><span>23</span></li>
                                <li class="nav-item"><a class="" href="#follow"
                                        data-toggle="tab">Follow</a><span>100</span>
                                </li>
                                <li class="nav-item"><a class="" href="#about" data-toggle="tab">About</a></li>
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
                                        @if ($publications->isEmpty())
                                            <div style="text-align: center; font-size: 30px; font-weight: bold;">
                                                <p>No posts found.</p>
                                            </div>
                                        @else
                                            @foreach ($publications as $publication)
                                                <div class="main-wraper">
                                                    <div class="user-post">
                                                        <div class="friend-info">
                                                            <figure>
                                                                @if (Auth::user()->image)
                                                                    <img alt=""
                                                                        src="{{ asset('users/' . Auth::user()->image) }}">
                                                                @else
                                                                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=104d93&color=fff"
                                                                        height="25px" width="25px" alt=""
                                                                        class="mr-2" style="border-radius: 50%;">
                                                                @endif

                                                            </figure>
                                                            <div class="friend-name">
                                                                <div class="more">
                                                                    <div class="more-post-optns">
                                                                        <i class="">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-more-horizontal">
                                                                                <circle cx="12" cy="12" r="1">
                                                                                </circle>
                                                                                <circle cx="19" cy="12" r="1">
                                                                                </circle>
                                                                                <circle cx="5" cy="12" r="1">
                                                                                </circle>
                                                                            </svg></i>
                                                                        <ul>
                                                                            <li>
                                                                                <i class="icofont-pen-alt-1"></i>Edit Post
                                                                                <span>Edit This Post within a Hour</span>
                                                                            </li>
                                                                            <li>
                                                                                <i class="icofont-ban"></i>Hide Post
                                                                                <span>Hide This Post</span>
                                                                            </li>
                                                                            <li>
                                                                                <i class="icofont-ui-delete"></i>Delete Post
                                                                                <span>If inappropriate Post By
                                                                                    Mistake</span>
                                                                            </li>
                                                                            <li>
                                                                                <i class="icofont-flag"></i>Report
                                                                                <span>Inappropriate content</span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <ins><a title=""
                                                                        href="time-line.html">{{ Auth::user()->name }}</a>
                                                                    <span><i class="icofont-globe"></i> published:
                                                                        {{ \Carbon\Carbon::parse($publication->created_at)->format('M, d Y') }}</span>
                                                            </div>
                                                            @php

                                                                // Assuming $publication->created_at is your timestamp
                                                                $created_at = \Carbon\Carbon::parse(
                                                                    $publication->created_at,
                                                                );

                                                                // Calculate the difference between the created_at timestamp and the current time
                                                                $timeElapsed = $created_at->diffForHumans(null, true);
                                                            @endphp

                                                            @if ($publication->image)
                                                                <a data-toggle="modal" data-target="#img-comt"
                                                                    data-time="{{ $timeElapsed }}"
                                                                    data-src="{{ asset('images/' . $publication->image) }}">
                                                                    <img src="{{ asset('images/' . $publication->image) }}"
                                                                        height="400px" width="600px" alt="">
                                                                </a>
                                                            @endif



                                                            <div class="post-meta">

                                                                <p>
                                                                    {{ $publication->contenu }}
                                                                </p>
                                                                <div class="we-video-info">
                                                                    <ul>
                                                                        <li>
                                                                            <span title="Likes" class="likes">
                                                                                <i class="icofont-like"
                                                                                    style="color: blue;"></i>
                                                                                <ins>
                                                                                    <span
                                                                                        class="like-count unique-like-count-{{ $publication->id }}">
                                                                                        {{ $publication->jaime_publications->count() }}
                                                                                    </span> </ins>
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
                                                                                    </svg></i>
                                                                                <ins>{{ $publication->totalComments() }}</ins>
                                                                            </span>

                                                                        </li>


                                                                    </ul>

                                                                </div>
                                                                <div class="stat-tools">
                                                                    <div class="box"
                                                                        data-publication-id="{{ $publication->id }}">
                                                                        <div class="Like"><a class="Like__link"><i
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
                                            @endforeach
                                        @endif


                                        <!-- share image with post -->



                                    </div>
                                    <div class="tab-pane fade" id="followers">
                                        <div class="row col-xs-6 merged-10">
                                            <div class="col-lg-4 col-md-4 col-sm-6">
                                                <div class="friendz">
                                                    <figure><img src="/frontoffice/images/resources/speak-1.jpg"
                                                            alt="">
                                                    </figure>
                                                    <span><a href="#" title="">Amy Watson</a></span>
                                                    <ins>Bz University, Pakistan</ins>
                                                    <a href="#" title="" data-ripple=""><i
                                                            class="icofont-star"></i>
                                                        Follow</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6">
                                                <div class="friendz">
                                                    <figure><img src="/frontoffice/images/resources/speak-2.jpg"
                                                            alt="">
                                                    </figure>
                                                    <span><a href="#" title="">Muhammad Khan</a></span>
                                                    <ins>Oxford University, UK</ins>
                                                    <a href="#" title="" data-ripple=""><i
                                                            class="icofont-star"></i>
                                                        Follow</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6">
                                                <div class="friendz">
                                                    <figure><img src="/frontoffice/images/resources/speak-3.jpg"
                                                            alt="">
                                                    </figure>
                                                    <span><a href="#" title="">Sadia Gill</a></span>
                                                    <ins>Wb University, USA</ins>
                                                    <a href="#" title="" data-ripple=""><i
                                                            class="icofont-star"></i>
                                                        Follow</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6">
                                                <div class="friendz">
                                                    <figure><img src="/frontoffice/images/resources/speak-4.jpg"
                                                            alt="">
                                                    </figure>
                                                    <span><a href="#" title="">Rjapal</a></span>
                                                    <ins>Km University, India</ins>
                                                    <a href="#" title="" data-ripple=""><i
                                                            class="icofont-star"></i>
                                                        Follow</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6">
                                                <div class="friendz">
                                                    <figure><img src="/frontoffice/images/resources/speak-5.jpg"
                                                            alt="">
                                                    </figure>
                                                    <span><a href="#" title="">Amy watson</a></span>
                                                    <ins>Oxford University, UK</ins>
                                                    <a href="#" title="" data-ripple=""><i
                                                            class="icofont-star"></i>
                                                        Follow</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6">
                                                <div class="friendz">
                                                    <figure><img src="/frontoffice/images/resources/speak-6.jpg"
                                                            alt="">
                                                    </figure>
                                                    <span><a href="#" title="">Bob Frank</a></span>
                                                    <ins>WB University, Canada</ins>
                                                    <a href="#" title="" data-ripple=""><i
                                                            class="icofont-star"></i>
                                                        Follow</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6">
                                                <div class="friendz">
                                                    <figure><img src="/frontoffice/images/resources/speak-7.jpg"
                                                            alt="">
                                                    </figure>
                                                    <span><a href="#" title="">Amy Watson</a></span>
                                                    <ins>Bz University, Pakistan</ins>
                                                    <a href="#" title="" data-ripple=""><i
                                                            class="icofont-star"></i>
                                                        Follow</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6">
                                                <div class="friendz">
                                                    <figure><img src="/frontoffice/images/resources/speak-8.jpg"
                                                            alt="">
                                                    </figure>
                                                    <span><a href="#" title="">Muhammad Khan</a></span>
                                                    <ins>Oxford University, UK</ins>
                                                    <a href="#" title="" data-ripple=""><i
                                                            class="icofont-star"></i>
                                                        Follow</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6">
                                                <div class="friendz">
                                                    <figure><img src="/frontoffice/images/resources/speak-9.jpg"
                                                            alt="">
                                                    </figure>
                                                    <span><a href="#" title="">Sadia Gill</a></span>
                                                    <ins>WB University, USA</ins>
                                                    <a href="#" title="" data-ripple=""><i
                                                            class="icofont-star"></i>
                                                        Follow</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="sp sp-bars"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="follow">
                                        <div class="row merged-10 col-xs-6">
                                            <div class="col-lg-4 col-md-4 col-sm-6">
                                                <div class="friendz">
                                                    <figure><img src="/frontoffice/images/resources/speak-10.jpg"
                                                            alt="">
                                                    </figure>
                                                    <span><a href="#" title="">Amy Watson</a></span>
                                                    <ins>Bz University, Pakistan</ins>
                                                    <a href="#" title="" data-ripple=""><i
                                                            class="icofont-star"></i>Unfollow</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6">
                                                <div class="friendz">
                                                    <figure><img src="/frontoffice/images/resources/speak-11.jpg"
                                                            alt="">
                                                    </figure>
                                                    <span><a href="#" title="">Muhammad Khan</a></span>
                                                    <ins>Oxford University, UK</ins>
                                                    <a href="#" title="" data-ripple=""><i
                                                            class="icofont-star"></i>
                                                        Unfollow</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6">
                                                <div class="friendz">
                                                    <figure><img src="/frontoffice/images/resources/speak-12.jpg"
                                                            alt="">
                                                    </figure>
                                                    <span><a href="#" title="">Sadia Gill</a></span>
                                                    <ins>WB University, USA</ins>
                                                    <a href="#" title="" data-ripple=""><i
                                                            class="icofont-star"></i>
                                                        Unfollow</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6">
                                                <div class="friendz">
                                                    <figure><img src="/frontoffice/images/resources/speak-4.jpg"
                                                            alt="">
                                                    </figure>
                                                    <span><a href="#" title="">Rjapal</a></span>
                                                    <ins>Km University, India</ins>
                                                    <a href="#" title="" data-ripple=""><i
                                                            class="icofont-star"></i>
                                                        Unfollow</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6">
                                                <div class="friendz">
                                                    <figure><img src="/frontoffice/images/resources/speak-1.jpg"
                                                            alt="">
                                                    </figure>
                                                    <span><a href="#" title="">Amy watson</a></span>
                                                    <ins>Oxford University, UK</ins>
                                                    <a href="#" title="" data-ripple=""><i
                                                            class="icofont-star"></i>
                                                        Unfollow</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6">
                                                <div class="friendz">
                                                    <figure><img src="/frontoffice/images/resources/speak-2.jpg"
                                                            alt="">
                                                    </figure>
                                                    <span><a href="#" title="">Bob Frank</a></span>
                                                    <ins>WB University, Canada</ins>
                                                    <a href="#" title="" data-ripple=""><i
                                                            class="icofont-star"></i>
                                                        Unfollow</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6">
                                                <div class="friendz">
                                                    <figure><img src="/frontoffice/images/resources/speak-5.jpg"
                                                            alt="">
                                                    </figure>
                                                    <span><a href="#" title="">Amy Watson</a></span>
                                                    <ins>Bz University, Pakistan</ins>
                                                    <a href="#" title="" data-ripple=""><i
                                                            class="icofont-star"></i>
                                                        Unfollow</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6">
                                                <div class="friendz">
                                                    <figure><img src="/frontoffice/images/resources/speak-7.jpg"
                                                            alt="">
                                                    </figure>
                                                    <span><a href="#" title="">Muhammad Khan</a></span>
                                                    <ins>Oxford University, UK</ins>
                                                    <a href="#" title="" data-ripple=""><i
                                                            class="icofont-star"></i>
                                                        Unfollow</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6">
                                                <div class="friendz">
                                                    <figure><img src="/frontoffice/images/resources/speak-10.jpg"
                                                            alt="">
                                                    </figure>
                                                    <span><a href="#" title="">Sadia Gill</a></span>
                                                    <ins>WB University, USA</ins>
                                                    <a href="#" title="" data-ripple=""><i
                                                            class="icofont-star"></i>
                                                        Unfollow</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="sp sp-bars"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade " id="about">
                                        <div class="main-wraper">
                                            <h3 class="main-title">About Engin</h3>
                                            <div class="lang">
                                                <h6>Languages</h6>
                                                <span>English, Turkish</span>
                                            </div>

                                            <div class="dis-n-exp">
                                                <h6>Discipliens</h6>
                                                <span>educational leadership</span>
                                                <span>educational assesment</span>
                                                <span>educational management</span>
                                                <span>Social Psychology</span>
                                                <span>organizational Psychology</span>
                                                <span>Qualitative social research</span>
                                                <span>Qualitative Psychology</span>
                                            </div>
                                            <div class="dis-n-exp">
                                                <h6>Skills & Experties </h6>
                                                <span>educational leadership</span>
                                                <span>educational assesment</span>
                                                <span>educational management</span>
                                                <span>Social Psychology</span>
                                                <span>organizational Psychology</span>
                                                <span>Qualitative social research</span>
                                                <span>Qualitative Psychology</span>
                                            </div>
                                        </div>
                                        <div class="main-wraper">
                                            <h3 class="main-title">Professional Experience</h3>
                                            <div class="exp-col">
                                                <div class="exp-meta">
                                                    <h5><i class="icofont-university"></i> Oxford university</h5>
                                                    <p>Sep-2012 Sep-2013</p>
                                                    <span>Position</span>
                                                    <ins>Professor Associate</ins>
                                                </div>
                                                <img src="/frontoffice/images/resources/uni1.jpg" alt="">
                                            </div>
                                            <div class="exp-col">
                                                <div class="exp-meta">
                                                    <h5><i class="icofont-university"></i> university of cambridge</h5>
                                                    <p>Sep-2012 Sep-2013</p>
                                                    <span>Position</span>
                                                    <ins>Professor Associate</ins>
                                                </div>
                                                <img src="/frontoffice/images/resources/uni3.jpg" alt="">
                                            </div>
                                            <div class="exp-col">
                                                <div class="exp-meta">
                                                    <h5><i class="icofont-university"></i> university of cambridge</h5>
                                                    <p>Sep-2012 Sep-2013</p>
                                                    <span>Position</span>
                                                    <ins>Professor Associate</ins>
                                                </div>
                                                <img src="/frontoffice/images/resources/uni4.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="main-wraper">
                                            <h3 class="main-title">Researches Image & PDF</h3>
                                            <div class="row merged-10">
                                                <div class="col-lg-4">
                                                    <figure class="research-avatar">
                                                        <a class="uk-inline"
                                                            href="/frontoffice/images/resources/image1.jpg"
                                                            data-fancybox="">
                                                            <img src="/frontoffice/images/resources/image1.jpg"
                                                                alt="">
                                                        </a>
                                                    </figure>
                                                </div>
                                                <div class="col-lg-4">
                                                    <figure class="research-avatar">
                                                        <a class="uk-inline"
                                                            href="/frontoffice/images/resources/image1.jpg"
                                                            data-fancybox="">
                                                            <img src="/frontoffice/images/resources/image2.jpg"
                                                                alt="">
                                                        </a>
                                                    </figure>
                                                </div>
                                                <div class="col-lg-4">
                                                    <figure class="research-avatar">
                                                        <a class="uk-inline"
                                                            href="/frontoffice/images/resources/image1.jpg"
                                                            data-fancybox="">
                                                            <img src="/frontoffice/images/resources/image3.jpg"
                                                                alt="">
                                                        </a>
                                                    </figure>
                                                </div>
                                                <div class="col-lg-4">
                                                    <figure class="research-avatar">
                                                        <a class="uk-inline"
                                                            href="/frontoffice/images/resources/image1.jpg"
                                                            data-fancybox="">
                                                            <img src="/frontoffice/images/resources/image4.jpg"
                                                                alt="">
                                                        </a>
                                                    </figure>
                                                </div>
                                                <div class="col-lg-4">
                                                    <figure class="research-avatar">
                                                        <a class="uk-inline"
                                                            href="/frontoffice/images/resources/image1.jpg"
                                                            data-fancybox="">
                                                            <img src="/frontoffice/images/resources/image5.jpg"
                                                                alt="">
                                                        </a>
                                                    </figure>
                                                </div>
                                                <div class="col-lg-4">
                                                    <figure class="research-avatar">
                                                        <a class="uk-inline"
                                                            href="/frontoffice/images/resources/image1.jpg"
                                                            data-fancybox="">
                                                            <img src="/frontoffice/images/resources/image6.jpg"
                                                                alt="">
                                                        </a>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>

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
                                            <button type="submit" class="btn btn-primary">Submit</button>
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
                                            <ul class="suggested-caro">
                                                <li>
                                                    <figure><img src="/frontoffice/images/resources/speak-1.jpg"
                                                            alt="">
                                                    </figure>
                                                    <span>Amy Watson</span>
                                                    <ins>Department of Socilolgy</ins>
                                                    <a href="#" title="" data-ripple=""><i
                                                            class="icofont-star"></i>
                                                        Follow</a>
                                                </li>
                                                <li>
                                                    <figure><img src="/frontoffice/images/resources/speak-2.jpg"
                                                            alt="">
                                                    </figure>
                                                    <span>Muhammad Khan</span>
                                                    <ins>Department of Socilolgy</ins>
                                                    <a href="#" title="" data-ripple=""><i
                                                            class="icofont-star"></i>
                                                        Follow</a>
                                                </li>
                                                <li>
                                                    <figure><img src="/frontoffice/images/resources/speak-3.jpg"
                                                            alt="">
                                                    </figure>
                                                    <span>Sadia Gill</span>
                                                    <ins>Department of Socilolgy</ins>
                                                    <a href="#" title="" data-ripple=""><i
                                                            class="icofont-star"></i>
                                                        Follow</a>
                                                </li>
                                                <li>
                                                    <figure><img src="/frontoffice/images/resources/speak-4.jpg"
                                                            alt="">
                                                    </figure>
                                                    <span>Aykash verma</span>
                                                    <ins>Department of Socilolgy</ins>
                                                    <a href="#" title="" data-ripple=""><i
                                                            class="icofont-star"></i>
                                                        Follow</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- suggested friends -->
                            </div>
                            <div class="col-lg-4">
                                <aside class="sidebar static right">
                                    <div class="widget">
                                        <h4 class="widget-title">Post Analytics</h4>
                                        <ul class="widget-analytics">
                                            <li>Reads <span>56</span></li>
                                            <li>Recommendations <span>3</span></li>
                                            <li>Shares <span>22</span></li>
                                            <li>References <span>17</span></li>
                                        </ul>
                                    </div>
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
                                                title="">See
                                                All</a></h4>
                                        <div class="rec-events bg-purple">
                                            <i class="icofont-gift"></i>
                                            <h6><a title="" href="">BZ University good night event in
                                                    columbia</a></h6>
                                            <img alt="" src="/frontoffice/images/clock.png">
                                        </div>
                                        <div class="rec-events bg-blue">
                                            <i class="icofont-microphone"></i>
                                            <h6><a title="" href="">The 3rd International Conference 2020</a>
                                            </h6>
                                            <img alt="" src="/frontoffice/images/clock.png">
                                        </div>
                                    </div>
                                    <div class="widget stick-widget">
                                        <h4 class="widget-title">Who's follownig</h4>
                                        <ul class="followers">
                                            <li>
                                                <figure><img alt=""
                                                        src="/frontoffice/images/resources/friend-avatar.jpg">
                                                </figure>
                                                <div class="friend-meta">
                                                    <h4>
                                                        <a title="" href="time-line.html">Kelly Bill</a>
                                                        <span>Dept colleague</span>
                                                    </h4>
                                                    <a class="underline" title="" href="#">Follow</a>
                                                </div>
                                            </li>
                                            <li>
                                                <figure><img alt=""
                                                        src="/frontoffice/images/resources/friend-avatar2.jpg">
                                                </figure>
                                                <div class="friend-meta">
                                                    <h4>
                                                        <a title="" href="time-line.html">Issabel</a>
                                                        <span>Dept colleague</span>
                                                    </h4>
                                                    <a class="underline" title="" href="#">Follow</a>
                                                </div>
                                            </li>
                                            <li>
                                                <figure><img alt=""
                                                        src="/frontoffice/images/resources/friend-avatar3.jpg">
                                                </figure>
                                                <div class="friend-meta">
                                                    <h4>
                                                        <a title="" href="time-line.html">Andrew</a>
                                                        <span>Dept colleague</span>
                                                    </h4>
                                                    <a class="underline" title="" href="#">Follow</a>
                                                </div>
                                            </li>
                                            <li>
                                                <figure><img alt=""
                                                        src="/frontoffice/images/resources/friend-avatar4.jpg">
                                                </figure>
                                                <div class="friend-meta">
                                                    <h4>
                                                        <a title="" href="time-line.html">Sophia</a>
                                                        <span>Dept colleague</span>
                                                    </h4>
                                                    <a class="underline" title="" href="#">Follow</a>
                                                </div>
                                            </li>
                                            <li>
                                                <figure><img alt=""
                                                        src="/frontoffice/images/resources/friend-avatar5.jpg">
                                                </figure>
                                                <div class="friend-meta">
                                                    <h4>
                                                        <a title="" href="time-line.html">Allen</a>
                                                        <span>Dept colleague</span>
                                                    </h4>
                                                    <a class="underline" title="" href="#">Follow</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="img-comt">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row merged">
                        <div class="col-lg-9">
                            <div class="pop-image">
                                <div class="pop-item">
                                    <div class="action-block">
                                        <a class="action-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-tag">
                                                <path
                                                    d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z" />
                                                <line x1="7" y1="7" x2="7.01" y2="7" />
                                            </svg>
                                        </a>
                                        <a class="action-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-map-pin">
                                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                                <circle cx="12" cy="10" r="3" />
                                            </svg>
                                        </a>
                                        <a class="action-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-arrow-down">
                                                <line x1="12" y1="5" x2="12" y2="19" />
                                                <polyline points="19 12 12 19 5 12" />
                                            </svg>
                                        </a>
                                        <a class="action-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-more-vertical">
                                                <circle cx="12" cy="12" r="1" />
                                                <circle cx="12" cy="5" r="1" />
                                                <circle cx="12" cy="19" r="1" />
                                            </svg>
                                        </a>
                                    </div>
                                    <figure>
                                        <img id="modal-image" src="" alt="">
                                    </figure>
                                    <div class="stat-tools">
                                        <div class="box">
                                            <div class="Like">
                                                <a class="Like__link">
                                                    <i class="icofont-like"></i>
                                                    Like
                                                </a>
                                                <div class="Emojis">
                                                    <div class="Emoji Emoji--like">
                                                        <div class="icon icon--like"></div>
                                                    </div>
                                                    <div class="Emoji Emoji--love">
                                                        <div class="icon icon--heart"></div>
                                                    </div>
                                                    <div class="Emoji Emoji--haha">
                                                        <div class="icon icon--haha"></div>
                                                    </div>
                                                    <div class="Emoji Emoji--wow">
                                                        <div class="icon icon--wow"></div>
                                                    </div>
                                                    <div class="Emoji Emoji--sad">
                                                        <div class="icon icon--sad"></div>
                                                    </div>
                                                    <div class="Emoji Emoji--angry">
                                                        <div class="icon icon--angry"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box">
                                            <div class="Emojis">
                                                <div class="Emoji Emoji--like">
                                                    <div class="icon icon--like"></div>
                                                </div>
                                                <div class="Emoji Emoji--love">
                                                    <div class="icon icon--heart"></div>
                                                </div>
                                                <div class="Emoji Emoji--haha">
                                                    <div class="icon icon--haha"></div>
                                                </div>
                                                <div class="Emoji Emoji--wow">
                                                    <div class="icon icon--wow"></div>
                                                </div>
                                                <div class="Emoji Emoji--sad">
                                                    <div class="icon icon--sad"></div>
                                                </div>
                                                <div class="Emoji Emoji--angry">
                                                    <div class="icon icon--angry"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <a title="" href="#" class="share-to">
                                            <i class="icofont-share-alt"></i>
                                            Share
                                        </a>
                                        <div class="emoji-state">
                                            <div class="popover_wrapper">
                                                <a class="popover_title" href="#" title="">
                                                    <img alt="" src="/frontoffice/images/smiles/thumb.png">
                                                </a>
                                                <div class="popover_content">
                                                    <span>
                                                        <img alt="" src="/frontoffice/images/smiles/thumb.png">
                                                        Likes
                                                    </span>
                                                    <ul class="namelist">
                                                        <li>Jhon Doe</li>
                                                        <li>Amara Sin</li>
                                                        <li>Sarah K.</li>
                                                        <li>
                                                            <span>20+ more</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="popover_wrapper">
                                                <a class="popover_title" href="#" title="">
                                                    <img alt="" src="/frontoffice/images/smiles/heart.png">
                                                </a>
                                                <div class="popover_content">
                                                    <span>
                                                        <img alt="" src="/frontoffice/images/smiles/heart.png">
                                                        Love
                                                    </span>
                                                    <ul class="namelist">
                                                        <li>Amara Sin</li>
                                                        <li>Jhon Doe</li>
                                                        <li>
                                                            <span>10+ more</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="popover_wrapper">
                                                <a class="popover_title" href="#" title="">
                                                    <img alt="" src="/frontoffice/images/smiles/smile.png">
                                                </a>
                                                <div class="popover_content">
                                                    <span>
                                                        <img alt="" src="/frontoffice/images/smiles/smile.png">
                                                        Happy
                                                    </span>
                                                    <ul class="namelist">
                                                        <li>Sarah K.</li>
                                                        <li>Jhon Doe</li>
                                                        <li>Amara Sin</li>
                                                        <li>
                                                            <span>100+ more</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="popover_wrapper">
                                                <a class="popover_title" href="#" title="">
                                                    <img alt="" src="/frontoffice/images/smiles/weep.png">
                                                </a>
                                                <div class="popover_content">
                                                    <span>
                                                        <img alt="" src="/frontoffice/images/smiles/weep.png">
                                                        Dislike
                                                    </span>
                                                    <ul class="namelist">
                                                        <li>Danial Carbal</li>
                                                        <li>Amara Sin</li>
                                                        <li>Sarah K.</li>
                                                        <li>
                                                            <span>15+ more</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <p>10+</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="commentbar">
                                <div class="user">
                                    @if (Auth::user()->image)
                                        <figure><img src="{{ asset('users/' . Auth::user()->image) }}" height="50px"
                                                width="50px" alt=""></figure>
                                    @else
                                        <figure><img
                                                src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=104d93&color=fff"
                                                alt=""></figure>
                                    @endif
                                    <div class="user-information">
                                        <h4>
                                            <a href="{{ route('Profile_User') }}"
                                                title="">{{ auth::user()->name }}</a>
                                        </h4>

                                        <span><i class="icofont-globe"></i> <span id="modal-time"></span></span>



                                    </div>
                                </div>
                                <div class="we-video-info">
                                    <ul>
                                        <li>
                                            <span title="Comments" class="liked">
                                                <i>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-thumbs-up">
                                                        <path
                                                            d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3">
                                                        </path>
                                                    </svg>
                                                </i>
                                                <ins>52</ins>
                                            </span>
                                        </li>
                                        <li>
                                            <span title="Comments" class="comment">
                                                <i>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-message-square">
                                                        <path
                                                            d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z">
                                                        </path>
                                                    </svg>
                                                </i>
                                                <ins>52</ins>
                                            </span>
                                        </li>
                                        <li>
                                            <span>
                                                <a title="Share" href="#" class="">
                                                    <i>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-share-2">
                                                            <circle cx="18" cy="5" r="3"></circle>
                                                            <circle cx="6" cy="12" r="3"></circle>
                                                            <circle cx="18" cy="19" r="3"></circle>
                                                            <line x1="8.59" y1="13.51" x2="15.42"
                                                                y2="17.49"></line>
                                                            <line x1="15.41" y1="6.51" x2="8.59"
                                                                y2="10.49"></line>
                                                        </svg>
                                                    </i>
                                                </a>
                                                <ins>20</ins>
                                            </span>
                                        </li>
                                    </ul>

                                </div>
                                <div class="new-comment" style="display: block;">
                                    <form method="post">
                                        <input type="text" placeholder="write comment">
                                        <button type="submit">
                                            <i class="icofont-paper-plane"></i>
                                        </button>
                                    </form>

                                    @if (isset($publication) && Auth::check() && $publication->user_id === Auth::id())

                                        <div class="comments-area">
                                            @if ($publication->commentaires->isNotEmpty())
                                                <ul>
                                                    @foreach ($publication->commentaires as $comment)
                                                        <li>
                                                            <figure>
                                                                <img alt=""
                                                                    src="/frontoffice/images/resources/user1.jpg">
                                                            </figure>
                                                            <div class="commenter">
                                                                <h5>
                                                                    <a title=""
                                                                        href="#">{{ $comment->user->name }}</a>
                                                                </h5>
                                                                @php

                                                                    // Assuming $publication->created_at is your timestamp
                                                                    $created_at = \Carbon\Carbon::parse(
                                                                        $comment->created_at,
                                                                    );

                                                                    // Calculate the difference between the created_at timestamp and the current time
                                                                    $timeElapsedd = $created_at->diffForHumans(
                                                                        null,
                                                                        true,
                                                                    );
                                                                @endphp
                                                                <span>{{ $timeElapsedd }}</span>
                                                                <p>
                                                                    {{ $comment->contenu }}
                                                                </p>

                                                            </div>





                                                            <a title="Like" href="#">
                                                                <i class="icofont-heart"></i>
                                                            </a>
                                                            <a title="Reply" href="#" class="reply-coment">
                                                                <i class="icofont-reply"></i>
                                                            </a>
                                                        </li>
                                                    @endforeach


                                                </ul>
                                            @else
                                                <div class="text-center"> <!-- Center-align the message -->
                                                    <p>No comments found.</p>
                                                </div>
                                            @endif
                                        @else
                                            <p>No comments found.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <script>
        $(document).ready(function() {
            $('a[data-toggle="modal"]').on('click', function() {
                var imageUrl = $(this).data('src');
                var publicationTime = $(this).data('time');
                $('#modal-time').text('(Published ' + publicationTime + ' ago)');

                $('#modal-image').attr('src', imageUrl);
            });
        });
    </script>
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
    <!-- <script>
        $(document).ready(function() {
            $('.comment-to').click(function(e) {
                e.preventDefault();
                var publicationId = $(this).data('publication-id');
                var commentsArea = $('.comments-area[data-comments-publication-id="' + publicationId +
                    '"]');

                // Make an AJAX request to fetch comments for this publication
                $.ajax({
                    type: 'GET',
                    url: '/publication/' + publicationId + '/comments',
                    success: function(response) {
                        commentsArea.find('ul').empty(); // Clear existing comments
                        $.each(response.comments, function(index, comment) {
                            var commentHtml = '<li>' +
                                '<figure><img alt="" src="/frontoffice/images/resources/user1.jpg"></figure>' +
                                '<div class="commenter">' +
                                '<h5><a title="" href="#">"aaa"</a></h5>' +
                                '<span>' + comment.created_at + '</span>' +
                                '<p>' + comment.contenu + '</p>' +
                                '</div>' +
                                '<a title="Like" href="#"><i class="icofont-heart"></i></a>' +
                                '<a title="Reply" href="#" class="reply-coment"><i class="icofont-reply"></i></a>' +
                                '</li>';
                            commentsArea.find('ul').append(commentHtml);
                        });
                        commentsArea.show(); // Show the comments area
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script> -->
    <script>
        function fetchAndDisplayComments(publicationId) {
            var commentsArea = $('.comments-area[data-comments-publication-id="' + publicationId + '"]');
    
            // Make an AJAX request to fetch comments for this publication
            $.ajax({
                type: 'GET',
                url: '/publication/' + publicationId + '/comments',
                success: function(response) {
                    commentsArea.find('ul').empty(); // Clear existing comments
                    $.each(response.comments, function(index, comment) {
                        var createdAt = moment(comment.created_at).fromNow(); // Format timestamp using moment.js
                        
                        var commentHtml = '<li>' +
                            '<figure><img alt="" src="/frontoffice/images/resources/user1.jpg"></figure>' +
                            '<div class="commenter">' +
                            '<h5><a title="" href="#">' + comment.user.name + '</a></h5>' +
                            '<span>' + createdAt + '</span>' +
                            '<p>' + comment.contenu + '</p>' +
                            '</div>' +
                            '<a title="Like" href="#"><i class="icofont-heart"></i></a>' +
                            '<a title="Reply" href="#" class="reply-coment"><i class="icofont-reply"></i></a>' +
                            '</li>';
                        commentsArea.find('ul').append(commentHtml);
                    });
                    commentsArea.show(); // Show the comments area
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
        $(document).ready(function() {
            // Submit comment form
            $('#commentForm').submit(function(e) {
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
    </script>
    

@endsection
