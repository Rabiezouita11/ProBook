@extends('frontoffice.layouts.index')

@section('content')
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
                                        <a href="#" title=""><i class="icofont-check-circled"></i>Follow</a>

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
                                            <li><span>Follow:</span> {{ $followingCount }}</li>
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
                                                        <li><img src="/frontoffice/images/badges/badge4.png" alt="">
                                                        </li>
                                                        <li><img src="/frontoffice/images/badges/badge5.png" alt="">
                                                        </li>
                                                        <li><img src="/frontoffice/images/badges/badge7.png" alt="">
                                                        </li>
                                                        <li><img src="/frontoffice/images/badges/badge8.png" alt="">
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
                                                            <div class="main-wraper">
                                                                <span class="new-title">Create New Post</span>
                                                                <div class="new-post">
                                                                    <form method="post">
                                                                        <i class="icofont-pen-alt-1"></i>
                                                                        <input type="text"
                                                                            placeholder="Create New Post">
                                                                    </form>

                                                                </div>
                                                            </div><!-- create new post -->

                                                            @if ($publications->isEmpty())
                                                            <div class="container" style="text-align: center; font-size: 30px; font-weight: bold;">
                                                                <p>No posts found.</p>
                                                            </div>
                                                        @else
                                                            @foreach ($publications->reverse() as $publication)
                                                                <div class="main-wraper">
                                                                    <div class="user-post">
                                                                        <div class="friend-info">
                                                                            @if ($publication->user->image)
                                                                                <figure>
                                                                                    <img alt="" src="{{ asset('users/' . $publication->user->image) }}">
                                                                                </figure>
                                                                            @else
                                                                                <img src="https://ui-avatars.com/api/?name={{ urlencode($publication->user->name) }}&background=104d93&color=fff"
                                                                                    height="25px" width="25px" alt="" class="mr-2" style="border-radius: 50%;">
                                                                            @endif
                                                                            <div class="friend-name">
                                                                                <div class="more"></div>
                                                                                <ins><a title="" href="time-line.html">{{ $publication->user->name }}</a> <span><i
                                                                                            class="icofont-globe"></i> published:
                                                                                        {{ \Carbon\Carbon::parse($publication->created_at)->isoFormat('MMM, DD YYYY, h:mm A') }}</span>
                                                                            </div>
                                                        
                                                                            @if ($publication->image)
                                                                                <img src="{{ asset('images/' . $publication->image) }}" height="400px" width="600px" alt="">
                                                                            @endif
                                                        
                                                                            <div class="post-meta">
                                                                                <p>
                                                                                    <p>
                                                                                        @if ($publication->user_abonner_id)
                                                                                        {{ $publication->contenu }}
                                                                                        @else
                                                                                            {{ $publication->contenu }}
                                                                                        @endif
                                                                                    </p>
                                                                                </p>
                                                                                <div class="we-video-info">
                                                                                    <ul>
                                                                                        <li>
                                                                                            <span title="Likes" class="liked">
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
                                                                                                <ins>
                                                                                                    <span class="like-count unique-like-count-{{ $publication->id }}">
                                                                                                        {{ $publication->jaime_publications->count() }}
                                                                                                    </span>
                                                                                                </ins>
                                                                                            </span>
                                                                                        </li>
                                                                                        <li>
                                                                                            <span title="Comments" class="Recommend">
                                                                                                <i>
                                                                                                    <svg class="feather feather-message-square" stroke-linejoin="round"
                                                                                                        stroke-linecap="round" stroke-width="2" stroke="currentColor"
                                                                                                        fill="none" viewBox="0 0 24 24" height="16" width="16"
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
                                                                                    <div class="box">
                                                                                        <div class="Like"><a class="Like__link"><i class="icofont-like"></i> Like</a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="box">
                                                                                    </div>
                                                                                    <a title="" href="#" class="comment-to"><i class="icofont-comment"></i> Comment</a>
                                                                                    <div class="new-comment" style="display: none;">
                                                                                        <form method="post">
                                                                                            <input type="text" placeholder="write comment">
                                                                                            <button type="submit"><i class="icofont-paper-plane"></i></button>
                                                                                        </form>
                                                                                        <div class="comments-area">
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
                                                                <div class="popup" style="width: 800px;">
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
                                                                                <input type="text" name="userprofile"
                                                                                    value="{{ $user->id }}"
                                                                                    id="">
                                                                                <div class="post-newmeta">
                                                                                    <textarea id="emojionearea1" name="contenu" placeholder="What's On Your Mind?"></textarea>
                                                                                    @error('contenu')
                                                                                        <p class="text-red-500 text-xs italic">
                                                                                            {{ $message }}</p>
                                                                                    @enderror
                                                                                </div>

                                                                                <div class="activity-post">
                                                                                    <div class="checkbox">
                                                                                        <input type="checkbox"
                                                                                            id="checkbox"
                                                                                            name="Activity_Feed" checked>
                                                                                        <label for="checkbox">
                                                                                            <span>Activity Feed</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="checkbox">
                                                                                        <input type="checkbox"
                                                                                            id="checkbox2" name="story"
                                                                                            checked>
                                                                                        <label for="checkbox2">
                                                                                            <span>My Story</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="post-newmeta">
                                                                                    <input type="file" name="image">
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

                                                                    <ul class="invitepage">
                                                                        @if ($suggestedUsers->isEmpty())
                                                                            <p>No suggested users to display.</p>
                                                                        @else
                                                                            @foreach ($suggestedUsers as $user)
                                                                                <li>
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
                                                                                    <button class="sug-like"><i
                                                                                            class="invit">Follow</i><i
                                                                                            class="icofont-check-alt"></i></button>
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
                                                    <h5 class="tab-title">Friends <span>102</span></h5>
                                                    <ul class="pix-filter">
                                                        <li><a title="" href="#" class="active">All
                                                                Friends</a></li>
                                                        <li><a title="" href="#">Family Friends</a></li>
                                                        <li><a title="" href="#">Close Friends</a></li>
                                                        <li><a title="" href="#">Mutual Friends</a></li>
                                                    </ul>
                                                    <div class="row merged-10 col-xs-6">
                                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                                            <div class="friendz">
                                                                <figure><img
                                                                        src="/frontoffice/images/resources/speak-10.jpg"
                                                                        alt=""></figure>
                                                                <span><a href="#" title="">Amy
                                                                        Watson</a></span>
                                                                <ins>Bz University, Pakistan</ins>
                                                                <a href="#" title="" data-ripple=""><i
                                                                        class="icofont-star"></i>Unfollow</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                                            <div class="friendz">
                                                                <figure><img
                                                                        src="/frontoffice/images/resources/speak-11.jpg"
                                                                        alt=""></figure>
                                                                <span><a href="#" title="">Muhammad
                                                                        Khan</a></span>
                                                                <ins>Oxford University, UK</ins>
                                                                <a href="#" title="" data-ripple=""><i
                                                                        class="icofont-star"></i> Unfollow</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                                            <div class="friendz">
                                                                <figure><img
                                                                        src="/frontoffice/images/resources/speak-12.jpg"
                                                                        alt=""></figure>
                                                                <span><a href="#" title="">Sadia
                                                                        Gill</a></span>
                                                                <ins>WB University, USA</ins>
                                                                <a href="#" title="" data-ripple=""><i
                                                                        class="icofont-star"></i> Unfollow</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                                            <div class="friendz">
                                                                <figure><img
                                                                        src="/frontoffice/images/resources/speak-4.jpg"
                                                                        alt=""></figure>
                                                                <span><a href="#" title="">Rjapal</a></span>
                                                                <ins>Km University, India</ins>
                                                                <a href="#" title="" data-ripple=""><i
                                                                        class="icofont-star"></i> Unfollow</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                                            <div class="friendz">
                                                                <figure><img
                                                                        src="/frontoffice/images/resources/speak-1.jpg"
                                                                        alt=""></figure>
                                                                <span><a href="#" title="">Amy
                                                                        watson</a></span>
                                                                <ins>Oxford University, UK</ins>
                                                                <a href="#" title="" data-ripple=""><i
                                                                        class="icofont-star"></i> Unfollow</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                                            <div class="friendz">
                                                                <figure><img
                                                                        src="/frontoffice/images/resources/speak-2.jpg"
                                                                        alt=""></figure>
                                                                <span><a href="#" title="">Bob
                                                                        Frank</a></span>
                                                                <ins>WB University, Canada</ins>
                                                                <a href="#" title="" data-ripple=""><i
                                                                        class="icofont-star"></i> Unfollow</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                                            <div class="friendz">
                                                                <figure><img
                                                                        src="/frontoffice/images/resources/speak-5.jpg"
                                                                        alt=""></figure>
                                                                <span><a href="#" title="">Amy
                                                                        Watson</a></span>
                                                                <ins>Bz University, Pakistan</ins>
                                                                <a href="#" title="" data-ripple=""><i
                                                                        class="icofont-star"></i> Unfollow</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                                            <div class="friendz">
                                                                <figure><img
                                                                        src="/frontoffice/images/resources/speak-7.jpg"
                                                                        alt=""></figure>
                                                                <span><a href="#" title="">Muhammad
                                                                        Khan</a></span>
                                                                <ins>Oxford University, UK</ins>
                                                                <a href="#" title="" data-ripple=""><i
                                                                        class="icofont-star"></i> Unfollow</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                                            <div class="friendz">
                                                                <figure><img
                                                                        src="/frontoffice/images/resources/speak-10.jpg"
                                                                        alt=""></figure>
                                                                <span><a href="#" title="">Sadia
                                                                        Gill</a></span>
                                                                <ins>WB University, USA</ins>
                                                                <a href="#" title="" data-ripple=""><i
                                                                        class="icofont-star"></i> Unfollow</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                                            <div class="friendz">
                                                                <figure><img
                                                                        src="/frontoffice/images/resources/speak-2.jpg"
                                                                        alt=""></figure>
                                                                <span><a href="#" title="">Bob
                                                                        Frank</a></span>
                                                                <ins>WB University, Canada</ins>
                                                                <a href="#" title="" data-ripple=""><i
                                                                        class="icofont-star"></i> Unfollow</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                                            <div class="friendz">
                                                                <figure><img
                                                                        src="/frontoffice/images/resources/speak-11.jpg"
                                                                        alt=""></figure>
                                                                <span><a href="#" title="">Muhammad
                                                                        Khan</a></span>
                                                                <ins>Oxford University, UK</ins>
                                                                <a href="#" title="" data-ripple=""><i
                                                                        class="icofont-star"></i> Unfollow</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="sp sp-bars"></div>
                                                        </div>
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

@endsection
