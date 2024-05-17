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
                                        style="background-image: url(/frontoffice/images/resources/time-bg.jpg)"></div>
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
                                    if (empty(auth()->user()->cover_photo) && empty(auth()->user()->image)) {
                                    $completionPercentage = 0.8; // 80% completion if both are missing
                                    } elseif (empty(auth()->user()->cover_photo) || empty(auth()->user()->image)) {
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
        <a href="#" title="" data-toggle="modal" data-target="#uploadCoverPhotoModal">Upload Your Cover Photo</a>
        <em>10%</em>
    </li>
    @endif
                                        <!-- Add other completion steps here -->
                                    </ul>
                                </div><!-- complete profile widget -->
                                @endif

                                <!-- Modal -->





                                <div class="widget">
                                    <h4 class="widget-title"><i class="icofont-flame-torch"></i> Popular Courses</h4>
                                    <ul class="premium-course">
                                        <li>
                                            <figure>
                                                <img src="/frontoffice/images/resources/course-5.jpg" alt="">
                                                <span class="tag">Free</span>
                                            </figure>
                                            <div class="vid-course">
                                                <h5><a href="course-detail.html" title="">Wordpress Online video
                                                        course</a></h5>
                                                <ins class="price">$19/M</ins>
                                            </div>
                                        </li>
                                        <li>
                                            <figure>
                                                <img src="/frontoffice/images/resources/course-3.jpg" alt="">
                                                <span class="tag">Premium</span>
                                            </figure>
                                            <div class="vid-course">
                                                <h5><a href="course-detail.html" title="">Node JS Online video
                                                        course</a></h5>
                                                <ins class="price">$29/M</ins>
                                            </div>
                                        </li>
                                    </ul>
                                </div><!-- popular courses -->
                                <div class="widget">
                                    <h4 class="widget-title">Recent Blogs <a class="see-all" href="#" title="">See
                                            All</a></h4>
                                    <ul class="recent-links">
                                        <li>
                                            <figure><img alt="" src="/frontoffice/images/resources/recentlink-1.jpg">
                                            </figure>
                                            <div class="re-links-meta">
                                                <h6><a title="" href="#">Moira's fade reach much
                                                        farther...</a></h6>
                                                <span>2 weeks ago </span>
                                            </div>
                                        </li>
                                        <li>
                                            <figure><img alt="" src="/frontoffice/images/resources/recentlink-2.jpg">
                                            </figure>
                                            <div class="re-links-meta">
                                                <h6><a title="" href="#">Daniel asks The voice of
                                                        doomfist...</a></h6>
                                                <span>3 months ago </span>
                                            </div>
                                        </li>
                                        <li>
                                            <figure><img alt="" src="/frontoffice/images/resources/recentlink-3.jpg">
                                            </figure>
                                            <div class="re-links-meta">
                                                <h6><a title="" href="#">The socimo over watch scandals.</a>
                                                </h6>
                                                <span>1 day before</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div><!-- recent blog -->

                             
                                
                            </aside>
                        </div>
                        <div class="col-lg-6">
                            <ul class="filtr-tabs">
                                <li><a class="active" href="#" title="">Home</a></li>
                               
                            </ul><!-- tab buttons -->
                            @if (auth()->check())
                            <div class="main-wraper">
                                <span class="new-title">Create New Post</span>
                                <div class="new-post">
                                    <form method="post">
                                        <i class="icofont-pen-alt-1"></i>
                                        <input type="text" placeholder="Create New Post">
                                    </form>
                                    <ul class="upload-media">
                                        <li>
                                            <a href="#" title="">
                                                <i><img src="/frontoffice/images/image.png" alt=""></i>
                                                <span>Photo/Video</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" title="">
                                                <i><img src="/frontoffice/images/activity.png" alt=""></i>
                                                <span>Feeling/Activity</span>
                                            </a>
                                        </li>
                                       
                                    </ul>
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
                            
                          
                            @if (auth()->check())
                            <div class="main-wraper">
                                <div class="user-post">
                                    <div class="friend-info">
                                        <figure>
                                            <i class="icofont-learn"></i>
                                        </figure>
                                        <div class="friend-name">
                                            <ins><a title="" href="time-line.html">Suggested</a></ins>
                                            <span><i class="icofont-runner-alt-1"></i> Follow similar People</span>
                                        </div>
                                        <ul class="suggested-caro">
                                            <li>
                                                <figure><img src="/frontoffice/images/resources/speak-1.jpg" alt="">
                                                </figure>
                                                <span>Amy Watson</span>
                                                <ins>Department of Socilolgy</ins>
                                                <a href="#" title="" data-ripple=""><i class="icofont-star"></i>
                                                    Follow</a>
                                            </li>
                                            <li>
                                                <figure><img src="/frontoffice/images/resources/speak-2.jpg" alt="">
                                                </figure>
                                                <span>Muhammad Khan</span>
                                                <ins>Department of Socilolgy</ins>
                                                <a href="#" title="" data-ripple=""><i class="icofont-star"></i>
                                                    Follow</a>
                                            </li>
                                            <li>
                                                <figure><img src="/frontoffice/images/resources/speak-3.jpg" alt="">
                                                </figure>
                                                <span>Sadia Gill</span>
                                                <ins>Department of Socilolgy</ins>
                                                <a href="#" title="" data-ripple=""><i class="icofont-star"></i>
                                                    Follow</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- suggested friends -->
                            @endif
                            <div class="main-wraper">
                                <div class="user-post">
                                    <div class="friend-info">
                                        <figure>
                                            <em>
                                                <svg style="vertical-align: middle;" xmlns="http://www.w3.org/2000/svg"
                                                    width="15" height="15" viewBox="0 0 24 24">
                                                    <path fill="#7fba00" stroke="#7fba00"
                                                        d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z">
                                                    </path>
                                                </svg></em>
                                            <img alt="" src="/frontoffice/images/resources/user7.jpg">
                                        </figure>
                                        <div class="friend-name">
                                            <div class="more">
                                                <div class="more-post-optns">
                                                    <i class="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-more-horizontal">
                                                            <circle cx="12" cy="12" r="1"></circle>
                                                            <circle cx="19" cy="12" r="1"></circle>
                                                            <circle cx="5" cy="12" r="1"></circle>
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
                                                            <span>If inappropriate Post By Mistake</span>
                                                        </li>
                                                        <li>
                                                            <i class="icofont-flag"></i>Report
                                                            <span>Inappropriate content</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <ins>
                                                <a title="verified" href="time-line.html">Andrew</a> Post Audio</ins>
                                            <span><i class="icofont-globe"></i> published: Sep,15 2020</span>
                                        </div>
                                        <div class="post-meta">
                                            <p>
                                                Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum
                                                rhoncus, sem quam semper libero.
                                            </p>
                                            <div class="aud-vid">
                                                <audio id="plyr-audio-player" class="audio-player" controls>
                                                    <source
                                                        src="https://cdn.plyr.io/static/demo/Kishi_Bashi_-_It_All_Began_With_a_Burst.mp3"
                                                        type="audio/mp3" />
                                                    <source
                                                        src="https://cdn.plyr.io/static/demo/Kishi_Bashi_-_It_All_Began_With_a_Burst.ogg"
                                                        type="audio/ogg" />
                                                </audio>
                                            </div>
                                            <div class="we-video-info">
                                                <ul>
                                                    <li>
                                                        <span title="views" class="views">
                                                            <i>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-eye">
                                                                    <path
                                                                        d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                    </path>
                                                                    <circle cx="12" cy="12" r="3">
                                                                    </circle>
                                                                </svg></i>
                                                            <ins>1.2k</ins>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span title="Comments" class="Recommend">
                                                            <i>
                                                                <svg class="feather feather-message-square"
                                                                    stroke-linejoin="round" stroke-linecap="round"
                                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                                    viewBox="0 0 24 24" height="16" width="16"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                                                </svg></i>
                                                            <ins>54</ins>
                                                        </span>

                                                    </li>
                                                    <li>
                                                        <span title="follow" class="Follow">
                                                            <i>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-star">
                                                                    <polygon
                                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                    </polygon>
                                                                </svg></i>
                                                            <ins>5k</ins>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="share-pst" title="Share">
                                                            <i>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-share-2">
                                                                    <circle cx="18" cy="5" r="3">
                                                                    </circle>
                                                                    <circle cx="6" cy="12" r="3">
                                                                    </circle>
                                                                    <circle cx="18" cy="19" r="3">
                                                                    </circle>
                                                                    <line x1="8.59" y1="13.51" x2="15.42" y2="17.49">
                                                                    </line>
                                                                    <line x1="15.41" y1="6.51" x2="8.59" y2="10.49">
                                                                    </line>
                                                                </svg></i>
                                                            <ins>205</ins>
                                                        </span>
                                                    </li>
                                                </ul>
                                                <a href="post-detail.html" title="" class="reply">Reply <i
                                                        class="icofont-reply"></i></a>
                                            </div>
                                            <div class="stat-tools">
                                                <div class="box">
                                                    <div class="Like"><a class="Like__link"><i class="icofont-like"></i>
                                                            Like</a>
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
                                                <a title="" href="#" class="comment-to"><i class="icofont-comment"></i>
                                                    Comment</a>
                                                <a title="" href="#" class="share-to"><i class="icofont-share-alt"></i>
                                                    Share</a>
                                                <div class="emoji-state">
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/thumb.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt=""
                                                                    src="/frontoffice/images/smiles/thumb.png">
                                                                Likes</span>
                                                            <ul class="namelist">
                                                                <li>Jhon Doe</li>
                                                                <li>Amara Sin</li>
                                                                <li>Sarah K.</li>
                                                                <li><span>20+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/heart.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt=""
                                                                    src="/frontoffice/images/smiles/heart.png">
                                                                Love</span>
                                                            <ul class="namelist">
                                                                <li>Amara Sin</li>
                                                                <li>Jhon Doe</li>
                                                                <li><span>10+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/smile.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt=""
                                                                    src="/frontoffice/images/smiles/smile.png">
                                                                Happy</span>
                                                            <ul class="namelist">
                                                                <li>Sarah K.</li>
                                                                <li>Jhon Doe</li>
                                                                <li>Amara Sin</li>
                                                                <li><span>100+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/weep.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt="" src="/frontoffice/images/smiles/weep.png">
                                                                Dislike</span>
                                                            <ul class="namelist">
                                                                <li>Danial Carbal</li>
                                                                <li>Amara Sin</li>
                                                                <li>Sarah K.</li>
                                                                <li><span>15+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <p>10+</p>
                                                </div>
                                                <div class="new-comment" style="display: none;">
                                                    <form method="post">
                                                        <input type="text" placeholder="write comment">
                                                        <button type="submit"><i
                                                                class="icofont-paper-plane"></i></button>
                                                    </form>
                                                    <div class="comments-area">
                                                        <ul>
                                                            <li>
                                                                <figure><img alt=""
                                                                        src="/frontoffice/images/resources/user1.jpg">
                                                                </figure>
                                                                <div class="commenter">
                                                                    <h5><a title="" href="#">Jack
                                                                            Carter</a></h5>
                                                                    <span>2 hours ago</span>
                                                                    <p>
                                                                        i think that some how, we learn who we really
                                                                        are and then live with that decision, great
                                                                        post!
                                                                    </p>
                                                                    <span>you can view the more detail via link</span>
                                                                    <a title=""
                                                                        href="https://www.youtube.com/watch?v=HpZgwHU1GcI"
                                                                        target="_blank">https://www.youtube.com/watch?v=HpZgwHU1GcI</a>
                                                                </div>
                                                                <a title="Like" href="#"><i
                                                                        class="icofont-heart"></i></a>
                                                                <a title="Reply" href="#" class="reply-coment"><i
                                                                        class="icofont-reply"></i></a>
                                                            </li>
                                                            <li>
                                                                <figure><img alt=""
                                                                        src="/frontoffice/images/resources/user2.jpg">
                                                                </figure>
                                                                <div class="commenter">
                                                                    <h5><a title="" href="#">Ching
                                                                            xang</a></h5>
                                                                    <span>2 hours ago</span>
                                                                    <p>
                                                                        i think that some how, we learn who we really
                                                                        are and then live with that decision, great
                                                                        post!
                                                                    </p>
                                                                </div>
                                                                <a title="Like" href="#"><i
                                                                        class="icofont-heart"></i></a>
                                                                <a title="Reply" href="#" class="reply-coment"><i
                                                                        class="icofont-reply"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- share audio post -->
                            <div class="main-wraper">
                                <div class="user-post">
                                    <div class="friend-info">
                                        <figure>
                                            <em>
                                                <svg style="vertical-align: middle;" xmlns="http://www.w3.org/2000/svg"
                                                    width="15" height="15" viewBox="0 0 24 24">
                                                    <path fill="#7fba00" stroke="#7fba00"
                                                        d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z">
                                                    </path>
                                                </svg></em>
                                            <img alt="" src="/frontoffice/images/resources/user6.jpg">
                                        </figure>
                                        <div class="friend-name">
                                            <div class="more">
                                                <div class="more-post-optns">
                                                    <i class="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-more-horizontal">
                                                            <circle cx="12" cy="12" r="1"></circle>
                                                            <circle cx="19" cy="12" r="1"></circle>
                                                            <circle cx="5" cy="12" r="1"></circle>
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
                                                            <span>If inappropriate Post By Mistake</span>
                                                        </li>
                                                        <li>
                                                            <i class="icofont-flag"></i>Report
                                                            <span>Inappropriate content</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <ins>
                                                <a title="verified" href="time-line.html">Elie Honey</a> Podcast</ins>
                                            <span><i class="icofont-globe"></i> published: Sep,15 2020</span>
                                        </div>
                                        <div class="post-meta">
                                            <a href="post-detail.html" class="post-title">Supervision as a Personnel
                                                Development Device</a>
                                            <p>
                                                Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum
                                                rhoncus, sem quam semper libero.
                                            </p>
                                            <div class="aud-vid">
                                                <div class="video-player">
                                                    <iframe
                                                        src="https://www.youtube.com/embed/RBfJR4oRC0k?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
                                                        allowfullscreen allow="autoplay"></iframe>
                                                </div>
                                            </div>
                                            <div class="we-video-info">
                                                <ul>
                                                    <li>
                                                        <span title="views" class="views">
                                                            <i>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-eye">
                                                                    <path
                                                                        d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                    </path>
                                                                    <circle cx="12" cy="12" r="3">
                                                                    </circle>
                                                                </svg></i>
                                                            <ins>1.2k</ins>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span title="Comments" class="Recommend">
                                                            <i>
                                                                <svg class="feather feather-message-square"
                                                                    stroke-linejoin="round" stroke-linecap="round"
                                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                                    viewBox="0 0 24 24" height="16" width="16"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                                                </svg></i>
                                                            <ins>54</ins>
                                                        </span>

                                                    </li>
                                                    <li>
                                                        <span title="follow" class="Follow">
                                                            <i>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-star">
                                                                    <polygon
                                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                    </polygon>
                                                                </svg></i>
                                                            <ins>5k</ins>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="share-pst" title="Share">
                                                            <i>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-share-2">
                                                                    <circle cx="18" cy="5" r="3">
                                                                    </circle>
                                                                    <circle cx="6" cy="12" r="3">
                                                                    </circle>
                                                                    <circle cx="18" cy="19" r="3">
                                                                    </circle>
                                                                    <line x1="8.59" y1="13.51" x2="15.42" y2="17.49">
                                                                    </line>
                                                                    <line x1="15.41" y1="6.51" x2="8.59" y2="10.49">
                                                                    </line>
                                                                </svg></i>
                                                            <ins>205</ins>
                                                        </span>
                                                    </li>
                                                </ul>
                                                <a href="post-detail.html" title="" class="reply">Reply <i
                                                        class="icofont-reply"></i></a>
                                            </div>
                                            <div class="stat-tools">
                                                <div class="box">
                                                    <div class="Like"><a class="Like__link"><i class="icofont-like"></i>
                                                            Like</a>
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
                                                <a title="" href="#" class="comment-to"><i class="icofont-comment"></i>
                                                    Comment</a>
                                                <a title="" href="#" class="share-to"><i class="icofont-share-alt"></i>
                                                    Share</a>
                                                <div class="emoji-state">
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/thumb.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt=""
                                                                    src="/frontoffice/images/smiles/thumb.png">
                                                                Likes</span>
                                                            <ul class="namelist">
                                                                <li>Jhon Doe</li>
                                                                <li>Amara Sin</li>
                                                                <li>Sarah K.</li>
                                                                <li><span>20+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/heart.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt=""
                                                                    src="/frontoffice/images/smiles/heart.png">
                                                                Love</span>
                                                            <ul class="namelist">
                                                                <li>Amara Sin</li>
                                                                <li>Jhon Doe</li>
                                                                <li><span>10+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/smile.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt=""
                                                                    src="/frontoffice/images/smiles/smile.png">
                                                                Happy</span>
                                                            <ul class="namelist">
                                                                <li>Sarah K.</li>
                                                                <li>Jhon Doe</li>
                                                                <li>Amara Sin</li>
                                                                <li><span>100+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/weep.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt="" src="/frontoffice/images/smiles/weep.png">
                                                                Dislike</span>
                                                            <ul class="namelist">
                                                                <li>Danial Carbal</li>
                                                                <li>Amara Sin</li>
                                                                <li>Sarah K.</li>
                                                                <li><span>15+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <p>10+</p>
                                                </div>
                                                <div class="new-comment" style="display: none;">
                                                    <form method="post">
                                                        <input type="text" placeholder="write comment">
                                                        <button type="submit"><i
                                                                class="icofont-paper-plane"></i></button>
                                                    </form>
                                                    <div class="comments-area">
                                                        <ul>
                                                            <li>
                                                                <figure><img alt=""
                                                                        src="/frontoffice/images/resources/user1.jpg">
                                                                </figure>
                                                                <div class="commenter">
                                                                    <h5><a title="" href="#">Jack
                                                                            Carter</a></h5>
                                                                    <span>2 hours ago</span>
                                                                    <p>
                                                                        i think that some how, we learn who we really
                                                                        are and then live with that decision, great
                                                                        post!
                                                                    </p>
                                                                    <span>you can view the more detail via link</span>
                                                                    <a title=""
                                                                        href="https://www.youtube.com/watch?v=HpZgwHU1GcI"
                                                                        target="_blank">https://www.youtube.com/watch?v=HpZgwHU1GcI</a>
                                                                </div>
                                                                <a title="Like" href="#"><i
                                                                        class="icofont-heart"></i></a>
                                                                <a title="Reply" href="#" class="reply-coment"><i
                                                                        class="icofont-reply"></i></a>
                                                            </li>
                                                            <li>
                                                                <figure><img alt=""
                                                                        src="/frontoffice/images/resources/user2.jpg">
                                                                </figure>
                                                                <div class="commenter">
                                                                    <h5><a title="" href="#">Ching
                                                                            xang</a></h5>
                                                                    <span>2 hours ago</span>
                                                                    <p>
                                                                        i think that some how, we learn who we really
                                                                        are and then live with that decision, great
                                                                        post!
                                                                    </p>
                                                                </div>
                                                                <a title="Like" href="#"><i
                                                                        class="icofont-heart"></i></a>
                                                                <a title="Reply" href="#" class="reply-coment"><i
                                                                        class="icofont-reply"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- share video post -->
                            <div class="main-wraper">
                                <div class="user-post">
                                    <div class="friend-info">
                                        <figure>
                                            <em>
                                                <svg style="vertical-align: middle;" xmlns="http://www.w3.org/2000/svg"
                                                    width="15" height="15" viewBox="0 0 24 24">
                                                    <path fill="#7fba00" stroke="#7fba00"
                                                        d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z">
                                                    </path>
                                                </svg></em>
                                            <img alt="" src="/frontoffice/images/resources/user1.jpg">
                                        </figure>
                                        <div class="friend-name">
                                            <div class="more">
                                                <div class="more-post-optns">
                                                    <i class="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-more-horizontal">
                                                            <circle cx="12" cy="12" r="1"></circle>
                                                            <circle cx="19" cy="12" r="1"></circle>
                                                            <circle cx="5" cy="12" r="1"></circle>
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
                                                            <span>If inappropriate Post By Mistake</span>
                                                        </li>
                                                        <li>
                                                            <i class="icofont-flag"></i>Report
                                                            <span>Inappropriate content</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <ins>
                                                <a title="verified" href="time-line.html">Jack Carter</a> Share
                                                Post</ins>
                                            <span><i class="icofont-globe"></i> published: Sep,15 2020</span>
                                        </div>
                                        <div class="post-meta">
                                            <a href="post-detail.html" class="post-title">Supervision as a Personnel
                                                Development Device</a>
                                            <p>
                                                Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum
                                                rhoncus, sem quam semper libero.
                                            </p>
                                            <div class="we-video-info">
                                                <ul>
                                                    <li>
                                                        <span title="views" class="views">
                                                            <i>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-eye">
                                                                    <path
                                                                        d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                    </path>
                                                                    <circle cx="12" cy="12" r="3">
                                                                    </circle>
                                                                </svg></i>
                                                            <ins>1.2k</ins>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span title="Comments" class="Recommend">
                                                            <i>
                                                                <svg class="feather feather-message-square"
                                                                    stroke-linejoin="round" stroke-linecap="round"
                                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                                    viewBox="0 0 24 24" height="16" width="16"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                                                </svg></i>
                                                            <ins>54</ins>
                                                        </span>

                                                    </li>
                                                    <li>
                                                        <span title="follow" class="Follow">
                                                            <i>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-star">
                                                                    <polygon
                                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                    </polygon>
                                                                </svg></i>
                                                            <ins>5k</ins>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="share-pst" title="Share">
                                                            <i>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-share-2">
                                                                    <circle cx="18" cy="5" r="3">
                                                                    </circle>
                                                                    <circle cx="6" cy="12" r="3">
                                                                    </circle>
                                                                    <circle cx="18" cy="19" r="3">
                                                                    </circle>
                                                                    <line x1="8.59" y1="13.51" x2="15.42" y2="17.49">
                                                                    </line>
                                                                    <line x1="15.41" y1="6.51" x2="8.59" y2="10.49">
                                                                    </line>
                                                                </svg></i>
                                                            <ins>205</ins>
                                                        </span>
                                                    </li>
                                                </ul>
                                                <a href="post-detail.html" title="" class="reply">Reply <i
                                                        class="icofont-reply"></i></a>
                                            </div>
                                            <div class="stat-tools">
                                                <div class="box">
                                                    <div class="Like"><a class="Like__link"><i class="icofont-like"></i>
                                                            Like</a>
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
                                                <a title="" href="#" class="comment-to"><i class="icofont-comment"></i>
                                                    Comment</a>
                                                <a title="" href="#" class="share-to"><i class="icofont-share-alt"></i>
                                                    Share</a>
                                                <div class="emoji-state">
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/thumb.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt=""
                                                                    src="/frontoffice/images/smiles/thumb.png">
                                                                Likes</span>
                                                            <ul class="namelist">
                                                                <li>Jhon Doe</li>
                                                                <li>Amara Sin</li>
                                                                <li>Sarah K.</li>
                                                                <li><span>20+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/heart.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt=""
                                                                    src="/frontoffice/images/smiles/heart.png">
                                                                Love</span>
                                                            <ul class="namelist">
                                                                <li>Amara Sin</li>
                                                                <li>Jhon Doe</li>
                                                                <li><span>10+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/smile.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt=""
                                                                    src="/frontoffice/images/smiles/smile.png">
                                                                Happy</span>
                                                            <ul class="namelist">
                                                                <li>Sarah K.</li>
                                                                <li>Jhon Doe</li>
                                                                <li>Amara Sin</li>
                                                                <li><span>100+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/weep.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt="" src="/frontoffice/images/smiles/weep.png">
                                                                Dislike</span>
                                                            <ul class="namelist">
                                                                <li>Danial Carbal</li>
                                                                <li>Amara Sin</li>
                                                                <li>Sarah K.</li>
                                                                <li><span>15+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <p>10+</p>
                                                </div>
                                                <div class="new-comment" style="display: none;">
                                                    <form method="post">
                                                        <input type="text" placeholder="write comment">
                                                        <button type="submit"><i
                                                                class="icofont-paper-plane"></i></button>
                                                    </form>
                                                    <div class="comments-area">
                                                        <ul>
                                                            <li>
                                                                <figure><img alt=""
                                                                        src="/frontoffice/images/resources/user1.jpg">
                                                                </figure>
                                                                <div class="commenter">
                                                                    <h5><a title="" href="#">Jack
                                                                            Carter</a></h5>
                                                                    <span>2 hours ago</span>
                                                                    <p>
                                                                        i think that some how, we learn who we really
                                                                        are and then live with that decision, great
                                                                        post!
                                                                    </p>
                                                                    <span>you can view the more detail via link</span>
                                                                    <a title=""
                                                                        href="https://www.youtube.com/watch?v=HpZgwHU1GcI"
                                                                        target="_blank">https://www.youtube.com/watch?v=HpZgwHU1GcI</a>
                                                                </div>
                                                                <a title="Like" href="#"><i
                                                                        class="icofont-heart"></i></a>
                                                                <a title="Reply" href="#" class="reply-coment"><i
                                                                        class="icofont-reply"></i></a>
                                                            </li>
                                                            <li>
                                                                <figure><img alt=""
                                                                        src="/frontoffice/images/resources/user2.jpg">
                                                                </figure>
                                                                <div class="commenter">
                                                                    <h5><a title="" href="#">Ching
                                                                            xang</a></h5>
                                                                    <span>2 hours ago</span>
                                                                    <p>
                                                                        i think that some how, we learn who we really
                                                                        are and then live with that decision, great
                                                                        post!
                                                                    </p>
                                                                </div>
                                                                <a title="Like" href="#"><i
                                                                        class="icofont-heart"></i></a>
                                                                <a title="Reply" href="#" class="reply-coment"><i
                                                                        class="icofont-reply"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- share post without image -->
                            <div class="main-wraper">
                                <div class="user-post">
                                    <div class="friend-info">
                                        <figure>
                                            <em>
                                                <svg style="vertical-align: middle;" xmlns="http://www.w3.org/2000/svg"
                                                    width="15" height="15" viewBox="0 0 24 24">
                                                    <path fill="#82828e" stroke="#82828e"
                                                        d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z">
                                                    </path>
                                                </svg></em>
                                            <img alt="" src="/frontoffice/images/resources/user2.jpg">
                                        </figure>
                                        <div class="friend-name">
                                            <div class="more">
                                                <div class="more-post-optns">
                                                    <i class="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-more-horizontal">
                                                            <circle cx="12" cy="12" r="1"></circle>
                                                            <circle cx="19" cy="12" r="1"></circle>
                                                            <circle cx="5" cy="12" r="1"></circle>
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
                                                            <span>If inappropriate Post By Mistake</span>
                                                        </li>
                                                        <li>
                                                            <i class="icofont-flag"></i>Report
                                                            <span>Inappropriate content</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <ins><a title="" href="time-line.html">Maria k.</a> Premium
                                                Product</ins>
                                            <span><i class="icofont-globe"></i> published: Sep,15 2020</span>
                                        </div>
                                        <div class="post-meta">
                                            <figure class="premium-post"><img
                                                    src="/frontoffice/images/resources/book5.jpg" alt="">
                                            </figure>
                                            <div class="premium">
                                                <a href="book-detail.html" class="post-title">Technicial words 2020
                                                    Book world</a>
                                                <p>
                                                    Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget
                                                    condimentum rhoncus, sem quam semper libero.
                                                </p>
                                                <a class="main-btn purchase-btn" title="" href="book-detail.html"><i
                                                        class="icofont-cart-alt"></i> Buy
                                                    Now</a>
                                            </div>
                                            <div class="we-video-info">
                                                <ul>
                                                    <li>
                                                        <span title="views" class="views">
                                                            <i>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-eye">
                                                                    <path
                                                                        d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                    </path>
                                                                    <circle cx="12" cy="12" r="3">
                                                                    </circle>
                                                                </svg></i>
                                                            <ins>1.2k</ins>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span title="Comments" class="Recommend">
                                                            <i>
                                                                <svg class="feather feather-message-square"
                                                                    stroke-linejoin="round" stroke-linecap="round"
                                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                                    viewBox="0 0 24 24" height="16" width="16"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                                                </svg></i>
                                                            <ins>54</ins>
                                                        </span>

                                                    </li>
                                                    <li>
                                                        <span title="follow" class="Follow">
                                                            <i>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-star">
                                                                    <polygon
                                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                    </polygon>
                                                                </svg></i>
                                                            <ins>5k</ins>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="share-pst" title="Share">
                                                            <i>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-share-2">
                                                                    <circle cx="18" cy="5" r="3">
                                                                    </circle>
                                                                    <circle cx="6" cy="12" r="3">
                                                                    </circle>
                                                                    <circle cx="18" cy="19" r="3">
                                                                    </circle>
                                                                    <line x1="8.59" y1="13.51" x2="15.42" y2="17.49">
                                                                    </line>
                                                                    <line x1="15.41" y1="6.51" x2="8.59" y2="10.49">
                                                                    </line>
                                                                </svg></i>
                                                            <ins>205</ins>
                                                        </span>
                                                    </li>
                                                </ul>
                                                <a href="post-detail.html" title="" class="reply">Reply <i
                                                        class="icofont-reply"></i></a>
                                            </div>
                                            <div class="stat-tools">
                                                <div class="box">
                                                    <div class="Like"><a class="Like__link"><i class="icofont-like"></i>
                                                            Like</a>
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
                                                <a title="" href="#" class="comment-to"><i class="icofont-comment"></i>
                                                    Comment</a>
                                                <a title="" href="#" class="share-to"><i class="icofont-share-alt"></i>
                                                    Share</a>
                                                <div class="emoji-state">
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/thumb.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt=""
                                                                    src="/frontoffice/images/smiles/thumb.png">
                                                                Likes</span>
                                                            <ul class="namelist">
                                                                <li>Jhon Doe</li>
                                                                <li>Amara Sin</li>
                                                                <li>Sarah K.</li>
                                                                <li><span>20+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/heart.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt=""
                                                                    src="/frontoffice/images/smiles/heart.png">
                                                                Love</span>
                                                            <ul class="namelist">
                                                                <li>Amara Sin</li>
                                                                <li>Jhon Doe</li>
                                                                <li><span>10+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/smile.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt=""
                                                                    src="/frontoffice/images/smiles/smile.png">
                                                                Happy</span>
                                                            <ul class="namelist">
                                                                <li>Sarah K.</li>
                                                                <li>Jhon Doe</li>
                                                                <li>Amara Sin</li>
                                                                <li><span>100+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/weep.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt="" src="/frontoffice/images/smiles/weep.png">
                                                                Dislike</span>
                                                            <ul class="namelist">
                                                                <li>Danial Carbal</li>
                                                                <li>Amara Sin</li>
                                                                <li>Sarah K.</li>
                                                                <li><span>15+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <p>10+</p>
                                                </div>
                                                <div class="new-comment" style="display: block;">
                                                    <form method="post">
                                                        <input type="text" placeholder="write comment">
                                                        <button type="submit"><i
                                                                class="icofont-paper-plane"></i></button>
                                                    </form>
                                                    <div class="comments-area">
                                                        <ul>
                                                            <li>
                                                                <figure><img alt=""
                                                                        src="/frontoffice/images/resources/user1.jpg">
                                                                </figure>
                                                                <div class="commenter">
                                                                    <h5><a title="" href="#">Jack
                                                                            Carter</a></h5>
                                                                    <span>2 hours ago</span>
                                                                    <p>
                                                                        i think that some how, we learn who we really
                                                                        are and then live with that decision, great
                                                                        post!
                                                                    </p>
                                                                    <span>you can view the more detail via link</span>
                                                                    <a title=""
                                                                        href="#">https://www.youtube.com/watch?v=HpZgwHU1GcI</a>
                                                                </div>
                                                                <a title="Like" href="#"><i
                                                                        class="icofont-heart"></i></a>
                                                                <a title="Reply" href="#" class="reply-coment"><i
                                                                        class="icofont-reply"></i></a>
                                                            </li>
                                                            <li>
                                                                <figure><img alt=""
                                                                        src="/frontoffice/images/resources/user2.jpg">
                                                                </figure>
                                                                <div class="commenter">
                                                                    <h5><a title="" href="#">Ching
                                                                            xang</a></h5>
                                                                    <span>2 hours ago</span>
                                                                    <p>
                                                                        i think that some how, we learn who we really
                                                                        are and then live with that decision, great
                                                                        post!
                                                                    </p>
                                                                </div>
                                                                <a title="Like" href="#"><i
                                                                        class="icofont-heart"></i></a>
                                                                <a title="Reply" href="#" class="reply-coment"><i
                                                                        class="icofont-reply"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- post sell book -->
                            <div class="main-wraper">
                                <div class="wraper-title">
                                    <span><i class="icofont-video-alt"></i> Videos Play List</span>
                                    <a href="videos.html" title="">See all Videos</a>
                                </div>
                                <div class="videos-caro">
                                    <div class="item-video" data-merge="2">
                                        <a class="owl-video" href="https://www.youtube.com/watch?v=8iZTb9NWbz8"></a>
                                        <div class="posted-user">
                                            <img src="/frontoffice/images/resources/user4.jpg" alt="">
                                            <span>Frank J.</span>
                                        </div>
                                        <div class="vid-info">
                                            <span>1 year ago</span>
                                            <span><i class="icofont-eye-open"></i> 3.1k</span>
                                        </div>
                                    </div>
                                    <div class="item-video" data-merge="2">
                                        <a class="owl-video" href="https://www.youtube.com/watch?v=8itUNRIWVIs"></a>
                                        <div class="posted-user">
                                            <img src="/frontoffice/images/resources/user2.jpg" alt="">
                                            <span>Maria K.</span>
                                        </div>
                                        <div class="vid-info">
                                            <span>2 weeks ago</span>
                                            <span><i class="icofont-eye-open"></i> 1.1k</span>
                                        </div>
                                    </div>
                                    <div class="item-video" data-merge="2">
                                        <a class="owl-video" href="https://www.youtube.com/watch?v=JpxsRwnRwCQ"></a>
                                        <div class="posted-user">
                                            <img src="/frontoffice/images/resources/user1.jpg" alt="">
                                            <span>Jack Carter</span>
                                        </div>
                                        <div class="vid-info">
                                            <span>4 weeks ago</span>
                                            <span><i class="icofont-eye-open"></i> 20k</span>
                                        </div>
                                    </div>
                                    <div class="item-video" data-merge="2">
                                        <a class="owl-video" href="https://www.youtube.com/watch?v=WNeLUngb-Xg"></a>
                                        <div class="posted-user">
                                            <img src="/frontoffice/images/resources/user3.jpg" alt="">
                                            <span>Fawad Jan</span>
                                        </div>
                                        <div class="vid-info">
                                            <span>1 Month ago</span>
                                            <span><i class="icofont-eye-open"></i> 8k</span>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- video playlist carousel -->
                            <div class="main-wraper">
                                <div class="user-post">
                                    <div class="friend-info">
                                        <figure>
                                            <em>
                                                <svg style="vertical-align: middle;" xmlns="http://www.w3.org/2000/svg"
                                                    width="15" height="15" viewBox="0 0 24 24">
                                                    <path fill="#7fba00" stroke="#7fba00"
                                                        d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z">
                                                    </path>
                                                </svg></em>
                                            <img alt="" src="/frontoffice/images/resources/user3.jpg">
                                        </figure>
                                        <div class="friend-name">
                                            <div class="more">
                                                <div class="more-post-optns">
                                                    <i class="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-more-horizontal">
                                                            <circle cx="12" cy="12" r="1"></circle>
                                                            <circle cx="19" cy="12" r="1"></circle>
                                                            <circle cx="5" cy="12" r="1"></circle>
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
                                                            <span>If inappropriate Post By Mistake</span>
                                                        </li>
                                                        <li>
                                                            <i class="icofont-flag"></i>Report
                                                            <span>Inappropriate content</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <ins><a title="" href="time-line.html">Turgut Alp</a> Create
                                                Post</ins>
                                            <span><i class="icofont-globe"></i> published: Sep,15 2020</span>
                                        </div>
                                        <div class="post-meta">
                                            <figure>
                                                <a data-toggle="modal" data-target="#img-comt"
                                                    href="/frontoffice/images/resources/album1.jpg">
                                                    <img src="/frontoffice/images/resources/study.jpg" alt="">
                                                </a>
                                            </figure>
                                            <a href="post-detail.html" class="post-title">Supervision as a Personnel
                                                Development Device</a>
                                            <p>
                                                Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum
                                                rhoncus, sem quam semper libero.
                                            </p>
                                            <div class="we-video-info">
                                                <ul>
                                                    <li>
                                                        <span title="views" class="views">
                                                            <i>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-eye">
                                                                    <path
                                                                        d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                    </path>
                                                                    <circle cx="12" cy="12" r="3">
                                                                    </circle>
                                                                </svg></i>
                                                            <ins>1.2k</ins>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span title="Comments" class="Recommend">
                                                            <i>
                                                                <svg class="feather feather-message-square"
                                                                    stroke-linejoin="round" stroke-linecap="round"
                                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                                    viewBox="0 0 24 24" height="16" width="16"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                                                </svg></i>
                                                            <ins>54</ins>
                                                        </span>

                                                    </li>
                                                    <li>
                                                        <span title="follow" class="Follow">
                                                            <i>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-star">
                                                                    <polygon
                                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                    </polygon>
                                                                </svg></i>
                                                            <ins>5k</ins>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="share-pst" title="Share">
                                                            <i>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-share-2">
                                                                    <circle cx="18" cy="5" r="3">
                                                                    </circle>
                                                                    <circle cx="6" cy="12" r="3">
                                                                    </circle>
                                                                    <circle cx="18" cy="19" r="3">
                                                                    </circle>
                                                                    <line x1="8.59" y1="13.51" x2="15.42" y2="17.49">
                                                                    </line>
                                                                    <line x1="15.41" y1="6.51" x2="8.59" y2="10.49">
                                                                    </line>
                                                                </svg></i>
                                                            <ins>205</ins>
                                                        </span>
                                                    </li>
                                                </ul>
                                                <a href="post-detail.html" title="" class="reply">Reply <i
                                                        class="icofont-reply"></i></a>
                                            </div>
                                            <div class="stat-tools">
                                                <div class="box">
                                                    <div class="Like"><a class="Like__link"><i class="icofont-like"></i>
                                                            Like</a>
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
                                                <a title="" href="#" class="comment-to"><i class="icofont-comment"></i>
                                                    Comment</a>
                                                <a title="" href="#" class="share-to"><i class="icofont-share-alt"></i>
                                                    Share</a>
                                                <div class="emoji-state">
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/thumb.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt=""
                                                                    src="/frontoffice/images/smiles/thumb.png">
                                                                Likes</span>
                                                            <ul class="namelist">
                                                                <li>Jhon Doe</li>
                                                                <li>Amara Sin</li>
                                                                <li>Sarah K.</li>
                                                                <li><span>20+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/heart.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt=""
                                                                    src="/frontoffice/images/smiles/heart.png">
                                                                Love</span>
                                                            <ul class="namelist">
                                                                <li>Amara Sin</li>
                                                                <li>Jhon Doe</li>
                                                                <li><span>10+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/smile.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt=""
                                                                    src="/frontoffice/images/smiles/smile.png">
                                                                Happy</span>
                                                            <ul class="namelist">
                                                                <li>Sarah K.</li>
                                                                <li>Jhon Doe</li>
                                                                <li>Amara Sin</li>
                                                                <li><span>100+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/weep.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt="" src="/frontoffice/images/smiles/weep.png">
                                                                Dislike</span>
                                                            <ul class="namelist">
                                                                <li>Danial Carbal</li>
                                                                <li>Amara Sin</li>
                                                                <li>Sarah K.</li>
                                                                <li><span>15+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <p>30+</p>
                                                </div>
                                                <div class="new-comment" style="display: none;">
                                                    <form method="post">
                                                        <input type="text" placeholder="write comment">
                                                        <button type="submit"><i
                                                                class="icofont-paper-plane"></i></button>
                                                    </form>
                                                    <div class="comments-area">
                                                        <ul>
                                                            <li>
                                                                <figure><img alt=""
                                                                        src="/frontoffice/images/resources/user1.jpg">
                                                                </figure>
                                                                <div class="commenter">
                                                                    <h5><a title="" href="#">Jack
                                                                            Carter</a></h5>
                                                                    <span>2 hours ago</span>
                                                                    <p>
                                                                        i think that some how, we learn who we really
                                                                        are and then live with that decision, great
                                                                        post!
                                                                    </p>
                                                                    <span>you can view the more detail via link</span>
                                                                    <a title=""
                                                                        href="#">https://www.youtube.com/watch?v=HpZgwHU1GcI</a>
                                                                </div>
                                                                <a title="Like" href="#"><i
                                                                        class="icofont-heart"></i></a>
                                                                <a title="Reply" href="#" class="reply-coment"><i
                                                                        class="icofont-reply"></i></a>
                                                            </li>
                                                            <li>
                                                                <figure><img alt=""
                                                                        src="/frontoffice/images/resources/user2.jpg">
                                                                </figure>
                                                                <div class="commenter">
                                                                    <h5><a title="" href="#">Ching
                                                                            xang</a></h5>
                                                                    <span>2 hours ago</span>
                                                                    <p>
                                                                        i think that some how, we learn who we really
                                                                        are and then live with that decision, great
                                                                        post!
                                                                    </p>
                                                                </div>
                                                                <a title="Like" href="#"><i
                                                                        class="icofont-heart"></i></a>
                                                                <a title="Reply" href="#" class="reply-coment"><i
                                                                        class="icofont-reply"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- share image with post -->
                            <div class="main-wraper">
                                <div class="user-post">
                                    <div class="friend-info">
                                        <figure>
                                            <em>
                                                <svg style="vertical-align: middle;" xmlns="http://www.w3.org/2000/svg"
                                                    width="15" height="15" viewBox="0 0 24 24">
                                                    <path fill="#82828e" stroke="#82828e"
                                                        d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z">
                                                    </path>
                                                </svg></em>
                                            <img alt="" src="/frontoffice/images/resources/user4.jpg">
                                        </figure>
                                        <div class="friend-name">
                                            <div class="more">
                                                <div class="more-post-optns">
                                                    <i class="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-more-horizontal">
                                                            <circle cx="12" cy="12" r="1"></circle>
                                                            <circle cx="19" cy="12" r="1"></circle>
                                                            <circle cx="5" cy="12" r="1"></circle>
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
                                                            <span>If inappropriate Post By Mistake</span>
                                                        </li>
                                                        <li>
                                                            <i class="icofont-flag"></i>Report
                                                            <span>Inappropriate content</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <ins><a title="" href="time-line.html">Saim turan</a> added image
                                                album</ins>
                                            <span><i class="icofont-globe"></i> published: Sep,15 2020</span>
                                        </div>
                                        <div class="post-meta">
                                            <figure>
                                                <div class="img-bunch">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                                            <figure>
                                                                <a data-toggle="modal" data-target="#img-comt"
                                                                    href="/frontoffice/images/resources/album1.jpg">
                                                                    <img src="/frontoffice/images/resources/album1.jpg"
                                                                        alt="">
                                                                </a>
                                                            </figure>
                                                            <figure>
                                                                <a data-toggle="modal" data-target="#img-comt"
                                                                    href="/frontoffice/images/resources/album2.jpg"><img
                                                                        src="/frontoffice/images/resources/album2.jpg"
                                                                        alt="">
                                                                </a>
                                                            </figure>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                                            <figure>
                                                                <a data-toggle="modal" data-target="#img-comt"
                                                                    href="/frontoffice/images/resources/album6.jpg"><img
                                                                        src="/frontoffice/images/resources/album6.jpg"
                                                                        alt="">
                                                                </a>
                                                            </figure>
                                                            <figure>
                                                                <a data-toggle="modal" data-target="#img-comt"
                                                                    href="/frontoffice/images/resources/album5.jpg"><img
                                                                        src="/frontoffice/images/resources/album5.jpg"
                                                                        alt="">
                                                                </a>
                                                            </figure>
                                                            <figure>
                                                                <a data-toggle="modal" data-target="#img-comt"
                                                                    href="/frontoffice/images/resources/album4.jpg"><img
                                                                        src="/frontoffice/images/resources/album4.jpg"
                                                                        alt="">
                                                                </a>
                                                                <div class="more-photos">
                                                                    <span>+15</span>
                                                                </div>
                                                            </figure>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figure>
                                            <a href="post-detail.html" class="post-title">Supervision as a Personnel
                                                Development Device</a>
                                            <p>
                                                Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum
                                                rhoncus, sem quam semper libero.
                                            </p>
                                            <div class="we-video-info">
                                                <ul>
                                                    <li>
                                                        <span title="views" class="views">
                                                            <i>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-eye">
                                                                    <path
                                                                        d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                    </path>
                                                                    <circle cx="12" cy="12" r="3">
                                                                    </circle>
                                                                </svg></i>
                                                            <ins>1.2k</ins>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span title="Comments" class="Recommend">
                                                            <i>
                                                                <svg class="feather feather-message-square"
                                                                    stroke-linejoin="round" stroke-linecap="round"
                                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                                    viewBox="0 0 24 24" height="16" width="16"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                                                </svg></i>
                                                            <ins>54</ins>
                                                        </span>

                                                    </li>
                                                    <li>
                                                        <span title="follow" class="Follow">
                                                            <i>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-star">
                                                                    <polygon
                                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                    </polygon>
                                                                </svg></i>
                                                            <ins>5k</ins>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="share-pst" title="Share">
                                                            <i>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-share-2">
                                                                    <circle cx="18" cy="5" r="3">
                                                                    </circle>
                                                                    <circle cx="6" cy="12" r="3">
                                                                    </circle>
                                                                    <circle cx="18" cy="19" r="3">
                                                                    </circle>
                                                                    <line x1="8.59" y1="13.51" x2="15.42" y2="17.49">
                                                                    </line>
                                                                    <line x1="15.41" y1="6.51" x2="8.59" y2="10.49">
                                                                    </line>
                                                                </svg></i>
                                                            <ins>205</ins>
                                                        </span>
                                                    </li>
                                                </ul>
                                                <a href="post-detail.html" title="" class="reply">Reply <i
                                                        class="icofont-reply"></i></a>
                                            </div>
                                            <div class="stat-tools">
                                                <div class="box">
                                                    <div class="Like"><a class="Like__link"><i class="icofont-like"></i>
                                                            Like</a>
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
                                                <a title="" href="#" class="comment-to"><i class="icofont-comment"></i>
                                                    Comment</a>
                                                <a title="" href="#" class="share-to"><i class="icofont-share-alt"></i>
                                                    Share</a>
                                                <div class="emoji-state">
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/thumb.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt=""
                                                                    src="/frontoffice/images/smiles/thumb.png">
                                                                Likes</span>
                                                            <ul class="namelist">
                                                                <li>Jhon Doe</li>
                                                                <li>Amara Sin</li>
                                                                <li>Sarah K.</li>
                                                                <li><span>20+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/heart.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt=""
                                                                    src="/frontoffice/images/smiles/heart.png">
                                                                Love</span>
                                                            <ul class="namelist">
                                                                <li>Amara Sin</li>
                                                                <li>Jhon Doe</li>
                                                                <li><span>10+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/smile.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt=""
                                                                    src="/frontoffice/images/smiles/smile.png">
                                                                Happy</span>
                                                            <ul class="namelist">
                                                                <li>Sarah K.</li>
                                                                <li>Jhon Doe</li>
                                                                <li>Amara Sin</li>
                                                                <li><span>100+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/weep.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt="" src="/frontoffice/images/smiles/weep.png">
                                                                Dislike</span>
                                                            <ul class="namelist">
                                                                <li>Danial Carbal</li>
                                                                <li>Amara Sin</li>
                                                                <li>Sarah K.</li>
                                                                <li><span>15+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <p>50+</p>
                                                </div>
                                                <div class="new-comment" style="display: none;">
                                                    <form method="post">
                                                        <input type="text" placeholder="write comment">
                                                        <button type="submit"><i
                                                                class="icofont-paper-plane"></i></button>
                                                    </form>
                                                    <div class="comments-area">
                                                        <ul>
                                                            <li>
                                                                <figure><img alt=""
                                                                        src="/frontoffice/images/resources/user1.jpg">
                                                                </figure>
                                                                <div class="commenter">
                                                                    <h5><a title="" href="#">Jack
                                                                            Carter</a></h5>
                                                                    <span>2 hours ago</span>
                                                                    <p>
                                                                        i think that some how, we learn who we really
                                                                        are and then live with that decision, great
                                                                        post!
                                                                    </p>
                                                                    <span>you can view the more detail via link</span>
                                                                    <a title=""
                                                                        href="#">https://www.youtube.com/watch?v=HpZgwHU1GcI</a>
                                                                </div>
                                                                <a title="Like" href="#"><i
                                                                        class="icofont-heart"></i></a>
                                                                <a title="Reply" href="#" class="reply-coment"><i
                                                                        class="icofont-reply"></i></a>
                                                            </li>
                                                            <li>
                                                                <figure><img alt=""
                                                                        src="/frontoffice/images/resources/user2.jpg">
                                                                </figure>
                                                                <div class="commenter">
                                                                    <h5><a title="" href="#">Ching
                                                                            xang</a></h5>
                                                                    <span>2 hours ago</span>
                                                                    <p>
                                                                        i think that some how, we learn who we really
                                                                        are and then live with that decision, great
                                                                        post!
                                                                    </p>
                                                                </div>
                                                                <a title="Like" href="#"><i
                                                                        class="icofont-heart"></i></a>
                                                                <a title="Reply" href="#" class="reply-coment"><i
                                                                        class="icofont-reply"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- share image album -->
                            <div class="main-wraper">
                                <div class="user-post">
                                    <div class="friend-info">
                                        <figure>
                                            <em>
                                                <svg style="vertical-align: middle;" xmlns="http://www.w3.org/2000/svg"
                                                    width="15" height="15" viewBox="0 0 24 24">
                                                    <path fill="#7fba00" stroke="#7fba00"
                                                        d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z">
                                                    </path>
                                                </svg></em>
                                            <img alt="" src="/frontoffice/images/resources/user5.jpg">
                                        </figure>
                                        <div class="friend-name">
                                            <div class="more">
                                                <div class="more-post-optns">
                                                    <i class="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-more-horizontal">
                                                            <circle cx="12" cy="12" r="1"></circle>
                                                            <circle cx="19" cy="12" r="1"></circle>
                                                            <circle cx="5" cy="12" r="1"></circle>
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
                                                            <span>If inappropriate Post By Mistake</span>
                                                        </li>
                                                        <li>
                                                            <i class="icofont-flag"></i>Report
                                                            <span>Inappropriate content</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <ins><a title="" href="time-line.html">Andrew Jhon</a> Shared
                                                Link</ins>
                                            <span><i class="icofont-globe"></i> published: Sep,15 2020</span>
                                        </div>
                                        <div class="post-meta">
                                            <em><a href="https://themeforest.net/item/winku-social-network-toolkit-responsive-template/22363538"
                                                    title=""
                                                    target="_blank">https://themeforest.net/item/winku-social-network-toolkit-responsive-template/22363538</a></em>
                                            <figure>
                                                <span>fetched-image</span>
                                                <img src="/frontoffice/images/resources/laptop.png" alt="">
                                            </figure>
                                            <a href="https://themeforest.net/item/winku-social-network-toolkit-responsive-template/22363538"
                                                class="post-title" target="_blank">Winku Social Network with Company
                                                Pages Theme</a>
                                            <p>
                                                “Winku” is a social community mobile app kit with features. user can use
                                                this app for sharing blog, posts, timeline, create Group, Create Pages,
                                                chat/Messages, Movies sharing, QA, and Much More.
                                            </p>
                                            <div class="we-video-info">
                                                <ul>
                                                    <li>
                                                        <span title="views" class="views">
                                                            <i>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-eye">
                                                                    <path
                                                                        d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                    </path>
                                                                    <circle cx="12" cy="12" r="3">
                                                                    </circle>
                                                                </svg></i>
                                                            <ins>1.2k</ins>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span title="Comments" class="Recommend">
                                                            <i>
                                                                <svg class="feather feather-message-square"
                                                                    stroke-linejoin="round" stroke-linecap="round"
                                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                                    viewBox="0 0 24 24" height="16" width="16"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                                                </svg></i>
                                                            <ins>54</ins>
                                                        </span>

                                                    </li>
                                                    <li>
                                                        <span title="follow" class="Follow">
                                                            <i>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-star">
                                                                    <polygon
                                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                    </polygon>
                                                                </svg></i>
                                                            <ins>5k</ins>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="share-pst" title="Share">
                                                            <i>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-share-2">
                                                                    <circle cx="18" cy="5" r="3">
                                                                    </circle>
                                                                    <circle cx="6" cy="12" r="3">
                                                                    </circle>
                                                                    <circle cx="18" cy="19" r="3">
                                                                    </circle>
                                                                    <line x1="8.59" y1="13.51" x2="15.42" y2="17.49">
                                                                    </line>
                                                                    <line x1="15.41" y1="6.51" x2="8.59" y2="10.49">
                                                                    </line>
                                                                </svg></i>
                                                            <ins>205</ins>
                                                        </span>
                                                    </li>
                                                </ul>
                                                <a href="post-detail.html" title="" class="reply">Reply <i
                                                        class="icofont-reply"></i></a>
                                            </div>
                                            <div class="stat-tools">
                                                <div class="box">
                                                    <div class="Like"><a class="Like__link"><i class="icofont-like"></i>
                                                            Like</a>
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
                                                <a title="" href="#" class="comment-to"><i class="icofont-comment"></i>
                                                    Comment</a>
                                                <a title="" href="#" class="share-to"><i class="icofont-share-alt"></i>
                                                    Share</a>
                                                <div class="emoji-state">
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/thumb.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt=""
                                                                    src="/frontoffice/images/smiles/thumb.png">
                                                                Likes</span>
                                                            <ul class="namelist">
                                                                <li>Jhon Doe</li>
                                                                <li>Amara Sin</li>
                                                                <li>Sarah K.</li>
                                                                <li><span>20+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/heart.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt=""
                                                                    src="/frontoffice/images/smiles/heart.png">
                                                                Love</span>
                                                            <ul class="namelist">
                                                                <li>Amara Sin</li>
                                                                <li>Jhon Doe</li>
                                                                <li><span>10+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/smile.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt=""
                                                                    src="/frontoffice/images/smiles/smile.png">
                                                                Happy</span>
                                                            <ul class="namelist">
                                                                <li>Sarah K.</li>
                                                                <li>Jhon Doe</li>
                                                                <li>Amara Sin</li>
                                                                <li><span>100+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/weep.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt="" src="/frontoffice/images/smiles/weep.png">
                                                                Dislike</span>
                                                            <ul class="namelist">
                                                                <li>Danial Carbal</li>
                                                                <li>Amara Sin</li>
                                                                <li>Sarah K.</li>
                                                                <li><span>15+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <p>10+</p>
                                                </div>
                                                <div class="new-comment" style="display: block;">
                                                    <form method="post">
                                                        <input type="text" placeholder="write comment">
                                                        <button type="submit"><i
                                                                class="icofont-paper-plane"></i></button>
                                                    </form>
                                                    <div class="comments-area">
                                                        <ul>
                                                            <li>
                                                                <figure><img alt=""
                                                                        src="/frontoffice/images/resources/user1.jpg">
                                                                </figure>
                                                                <div class="commenter">
                                                                    <h5><a title="" href="#">Jack
                                                                            Carter</a></h5>
                                                                    <span>2 hours ago</span>
                                                                    <p>
                                                                        i think that some how, we learn who we really
                                                                        are and then live with that decision, great
                                                                        post!
                                                                    </p>
                                                                    <span>you can view the more detail via link</span>
                                                                    <a title=""
                                                                        href="#">https://www.youtube.com/watch?v=HpZgwHU1GcI</a>
                                                                </div>
                                                                <a title="Like" href="#"><i
                                                                        class="icofont-heart"></i></a>
                                                                <a title="Reply" href="#" class="reply-coment"><i
                                                                        class="icofont-reply"></i></a>
                                                            </li>
                                                            <li>
                                                                <figure><img alt=""
                                                                        src="/frontoffice/images/resources/user2.jpg">
                                                                </figure>
                                                                <div class="commenter">
                                                                    <h5><a title="" href="#">Ching
                                                                            xang</a></h5>
                                                                    <span>2 hours ago</span>
                                                                    <p>
                                                                        i think that some how, we learn who we really
                                                                        are and then live with that decision, great
                                                                        post!
                                                                    </p>
                                                                </div>
                                                                <a title="Like" href="#"><i
                                                                        class="icofont-heart"></i></a>
                                                                <a title="Reply" href="#" class="reply-coment"><i
                                                                        class="icofont-reply"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- share link -->
                            <div class="main-wraper">
                                <div class="user-post">
                                    <div class="friend-info">
                                        <figure>
                                            <em>
                                                <svg style="vertical-align: middle;" xmlns="http://www.w3.org/2000/svg"
                                                    width="15" height="15" viewBox="0 0 24 24">
                                                    <path fill="#7fba00" stroke="#7fba00"
                                                        d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z">
                                                    </path>
                                                </svg></em>
                                            <img alt="" src="/frontoffice/images/resources/user2.jpg">
                                        </figure>
                                        <div class="friend-name">
                                            <div class="more">
                                                <div class="more-post-optns">
                                                    <i class="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-more-horizontal">
                                                            <circle cx="12" cy="12" r="1"></circle>
                                                            <circle cx="19" cy="12" r="1"></circle>
                                                            <circle cx="5" cy="12" r="1"></circle>
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
                                                            <span>If inappropriate Post By Mistake</span>
                                                        </li>
                                                        <li>
                                                            <i class="icofont-flag"></i>Report
                                                            <span>Inappropriate content</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <ins><a title="" href="time-line.html">Maria k.</a> Shared
                                                Link</ins>
                                            <span><i class="icofont-globe"></i> published: Sep,15 2020</span>
                                        </div>
                                        <div class="post-meta">
                                            <em><a href="https://www.youtube.com/embed/zdow47FQRfQ" title=""
                                                    target="_blank">https://www.youtube.com/embed/zdow47FQRfQ</a>
                                            </em>
                                            <iframe height="285" src="https://www.youtube.com/embed/zdow47FQRfQ"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>

                                            <p>
                                                Cookie? Biscuit? Bikkie? They all mean the same thing! Our lovely
                                                English teachers will quickly show you some pronunciation and vocabulary
                                                differences from Australia, America, and England!
                                            </p>
                                            <div class="we-video-info">
                                                <ul>
                                                    <li>
                                                        <span title="views" class="views">
                                                            <i>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-eye">
                                                                    <path
                                                                        d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                    </path>
                                                                    <circle cx="12" cy="12" r="3">
                                                                    </circle>
                                                                </svg></i>
                                                            <ins>1.2k</ins>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span title="Comments" class="Recommend">
                                                            <i>
                                                                <svg class="feather feather-message-square"
                                                                    stroke-linejoin="round" stroke-linecap="round"
                                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                                    viewBox="0 0 24 24" height="16" width="16"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                                                </svg></i>
                                                            <ins>54</ins>
                                                        </span>

                                                    </li>
                                                    <li>
                                                        <span title="follow" class="Follow">
                                                            <i>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-star">
                                                                    <polygon
                                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                    </polygon>
                                                                </svg></i>
                                                            <ins>5k</ins>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="share-pst" title="Share">
                                                            <i>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-share-2">
                                                                    <circle cx="18" cy="5" r="3">
                                                                    </circle>
                                                                    <circle cx="6" cy="12" r="3">
                                                                    </circle>
                                                                    <circle cx="18" cy="19" r="3">
                                                                    </circle>
                                                                    <line x1="8.59" y1="13.51" x2="15.42" y2="17.49">
                                                                    </line>
                                                                    <line x1="15.41" y1="6.51" x2="8.59" y2="10.49">
                                                                    </line>
                                                                </svg></i>
                                                            <ins>205</ins>
                                                        </span>
                                                    </li>
                                                </ul>
                                                <a href="post-detail.html" title="" class="reply">Reply <i
                                                        class="icofont-reply"></i></a>
                                            </div>
                                            <div class="stat-tools">
                                                <div class="box">
                                                    <div class="Like"><a class="Like__link"><i class="icofont-like"></i>
                                                            Like</a>
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
                                                <a title="" href="#" class="comment-to"><i class="icofont-comment"></i>
                                                    Comment</a>
                                                <a title="" href="#" class="share-to"><i class="icofont-share-alt"></i>
                                                    Share</a>
                                                <div class="emoji-state">
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/thumb.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt=""
                                                                    src="/frontoffice/images/smiles/thumb.png">
                                                                Likes</span>
                                                            <ul class="namelist">
                                                                <li>Jhon Doe</li>
                                                                <li>Amara Sin</li>
                                                                <li>Sarah K.</li>
                                                                <li><span>20+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/heart.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt=""
                                                                    src="/frontoffice/images/smiles/heart.png">
                                                                Love</span>
                                                            <ul class="namelist">
                                                                <li>Amara Sin</li>
                                                                <li>Jhon Doe</li>
                                                                <li><span>10+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/smile.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt=""
                                                                    src="/frontoffice/images/smiles/smile.png">
                                                                Happy</span>
                                                            <ul class="namelist">
                                                                <li>Sarah K.</li>
                                                                <li>Jhon Doe</li>
                                                                <li>Amara Sin</li>
                                                                <li><span>100+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/weep.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt="" src="/frontoffice/images/smiles/weep.png">
                                                                Dislike</span>
                                                            <ul class="namelist">
                                                                <li>Danial Carbal</li>
                                                                <li>Amara Sin</li>
                                                                <li>Sarah K.</li>
                                                                <li><span>15+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <p>20+</p>
                                                </div>
                                                <div class="new-comment" style="display: none;">
                                                    <form method="post">
                                                        <input type="text" placeholder="write comment">
                                                        <button type="submit"><i
                                                                class="icofont-paper-plane"></i></button>
                                                    </form>
                                                    <div class="comments-area">
                                                        <ul>
                                                            <li>
                                                                <figure><img alt=""
                                                                        src="/frontoffice/images/resources/user1.jpg">
                                                                </figure>
                                                                <div class="commenter">
                                                                    <h5><a title="" href="#">Jack
                                                                            Carter</a></h5>
                                                                    <span>2 hours ago</span>
                                                                    <p>
                                                                        i think that some how, we learn who we really
                                                                        are and then live with that decision, great
                                                                        post!
                                                                    </p>
                                                                    <span>you can view the more detail via link</span>
                                                                    <a title=""
                                                                        href="#">https://www.youtube.com/watch?v=HpZgwHU1GcI</a>
                                                                </div>
                                                                <a title="Like" href="#"><i
                                                                        class="icofont-heart"></i></a>
                                                                <a title="Reply" href="#" class="reply-coment"><i
                                                                        class="icofont-reply"></i></a>
                                                            </li>
                                                            <li>
                                                                <figure><img alt=""
                                                                        src="/frontoffice/images/resources/user2.jpg">
                                                                </figure>
                                                                <div class="commenter">
                                                                    <h5><a title="" href="#">Ching
                                                                            xang</a></h5>
                                                                    <span>2 hours ago</span>
                                                                    <p>
                                                                        i think that some how, we learn who we really
                                                                        are and then live with that decision, great
                                                                        post!
                                                                    </p>
                                                                </div>
                                                                <a title="Like" href="#"><i
                                                                        class="icofont-heart"></i></a>
                                                                <a title="Reply" href="#" class="reply-coment"><i
                                                                        class="icofont-reply"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- share video -->
                            <div class="main-wraper">
                                <div class="user-post">
                                    <div class="friend-info">
                                        <figure>
                                            <em>
                                                <svg style="vertical-align: middle;" xmlns="http://www.w3.org/2000/svg"
                                                    width="15" height="15" viewBox="0 0 24 24">
                                                    <path fill="#7fba00" stroke="#7fba00"
                                                        d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z">
                                                    </path>
                                                </svg></em>
                                            <img alt="" src="/frontoffice/images/resources/user2.jpg">
                                        </figure>
                                        <div class="friend-name">
                                            <div class="more">
                                                <div class="more-post-optns">
                                                    <i class="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-more-horizontal">
                                                            <circle cx="12" cy="12" r="1"></circle>
                                                            <circle cx="19" cy="12" r="1"></circle>
                                                            <circle cx="5" cy="12" r="1"></circle>
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
                                                            <span>If inappropriate Post By Mistake</span>
                                                        </li>
                                                        <li>
                                                            <i class="icofont-flag"></i>Report
                                                            <span>Inappropriate content</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <ins><a title="" href="time-line.html">Maria k.</a> Shared
                                                Link</ins>
                                            <span><i class="icofont-globe"></i> published: Sep,15 2020</span>
                                        </div>
                                        <div class="post-meta">
                                            <img class="gif" src="/frontoffice/images/giphy.png"
                                                data-gif="/frontoffice/images/giphy-sample.gif" alt="">
                                            <div class="we-video-info">
                                                <ul>
                                                    <li>
                                                        <span title="views" class="views">
                                                            <i>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-eye">
                                                                    <path
                                                                        d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                    </path>
                                                                    <circle cx="12" cy="12" r="3">
                                                                    </circle>
                                                                </svg></i>
                                                            <ins>1.2k</ins>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span title="Comments" class="Recommend">
                                                            <i>
                                                                <svg class="feather feather-message-square"
                                                                    stroke-linejoin="round" stroke-linecap="round"
                                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                                    viewBox="0 0 24 24" height="16" width="16"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                                                </svg></i>
                                                            <ins>54</ins>
                                                        </span>

                                                    </li>
                                                    <li>
                                                        <span title="follow" class="Follow">
                                                            <i>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-star">
                                                                    <polygon
                                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                    </polygon>
                                                                </svg></i>
                                                            <ins>5k</ins>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="share-pst" title="Share">
                                                            <i>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-share-2">
                                                                    <circle cx="18" cy="5" r="3">
                                                                    </circle>
                                                                    <circle cx="6" cy="12" r="3">
                                                                    </circle>
                                                                    <circle cx="18" cy="19" r="3">
                                                                    </circle>
                                                                    <line x1="8.59" y1="13.51" x2="15.42" y2="17.49">
                                                                    </line>
                                                                    <line x1="15.41" y1="6.51" x2="8.59" y2="10.49">
                                                                    </line>
                                                                </svg></i>
                                                            <ins>205</ins>
                                                        </span>
                                                    </li>
                                                </ul>
                                                <a href="post-detail.html" title="" class="reply">Reply <i
                                                        class="icofont-reply"></i></a>
                                            </div>
                                            <div class="stat-tools">
                                                <div class="box">
                                                    <div class="Like"><a class="Like__link"><i class="icofont-like"></i>
                                                            Like</a>
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
                                                <a title="" href="#" class="comment-to"><i class="icofont-comment"></i>
                                                    Comment</a>
                                                <a title="" href="#" class="share-to"><i class="icofont-share-alt"></i>
                                                    Share</a>
                                                <div class="emoji-state">
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/thumb.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt=""
                                                                    src="/frontoffice/images/smiles/thumb.png">
                                                                Likes</span>
                                                            <ul class="namelist">
                                                                <li>Jhon Doe</li>
                                                                <li>Amara Sin</li>
                                                                <li>Sarah K.</li>
                                                                <li><span>20+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/heart.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt=""
                                                                    src="/frontoffice/images/smiles/heart.png">
                                                                Love</span>
                                                            <ul class="namelist">
                                                                <li>Amara Sin</li>
                                                                <li>Jhon Doe</li>
                                                                <li><span>10+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/smile.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt=""
                                                                    src="/frontoffice/images/smiles/smile.png">
                                                                Happy</span>
                                                            <ul class="namelist">
                                                                <li>Sarah K.</li>
                                                                <li>Jhon Doe</li>
                                                                <li>Amara Sin</li>
                                                                <li><span>100+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="popover_wrapper">
                                                        <a class="popover_title" href="#" title=""><img alt=""
                                                                src="/frontoffice/images/smiles/weep.png"></a>
                                                        <div class="popover_content">
                                                            <span><img alt="" src="/frontoffice/images/smiles/weep.png">
                                                                Dislike</span>
                                                            <ul class="namelist">
                                                                <li>Danial Carbal</li>
                                                                <li>Amara Sin</li>
                                                                <li>Sarah K.</li>
                                                                <li><span>15+ more</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <p>20+</p>
                                                </div>
                                                <div class="new-comment" style="display: none;">
                                                    <form method="post">
                                                        <input type="text" placeholder="write comment">
                                                        <button type="submit"><i
                                                                class="icofont-paper-plane"></i></button>
                                                    </form>
                                                    <div class="comments-area">
                                                        <ul>
                                                            <li>
                                                                <figure><img alt=""
                                                                        src="/frontoffice/images/resources/user1.jpg">
                                                                </figure>
                                                                <div class="commenter">
                                                                    <h5><a title="" href="#">Jack
                                                                            Carter</a></h5>
                                                                    <span>2 hours ago</span>
                                                                    <p>
                                                                        i think that some how, we learn who we really
                                                                        are and then live with that decision, great
                                                                        post!
                                                                    </p>
                                                                    <span>you can view the more detail via link</span>
                                                                    <a title=""
                                                                        href="#">https://www.youtube.com/watch?v=HpZgwHU1GcI</a>
                                                                </div>
                                                                <a title="Like" href="#"><i
                                                                        class="icofont-heart"></i></a>
                                                                <a title="Reply" href="#" class="reply-coment"><i
                                                                        class="icofont-reply"></i></a>
                                                            </li>
                                                            <li>
                                                                <figure><img alt=""
                                                                        src="/frontoffice/images/resources/user2.jpg">
                                                                </figure>
                                                                <div class="commenter">
                                                                    <h5><a title="" href="#">Ching
                                                                            xang</a></h5>
                                                                    <span>2 hours ago</span>
                                                                    <p>
                                                                        i think that some how, we learn who we really
                                                                        are and then live with that decision, great
                                                                        post!
                                                                    </p>
                                                                </div>
                                                                <a title="Like" href="#"><i
                                                                        class="icofont-heart"></i></a>
                                                                <a title="Reply" href="#" class="reply-coment"><i
                                                                        class="icofont-reply"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- gif image post -->
                            <div class="main-wraper">
                                <div class="user-post">
                                    <div class="friend-info">
                                        <figure>
                                            <img alt="" src="/frontoffice/images/resources/sponsor.png">
                                        </figure>
                                        <div class="friend-name">
                                            <div class="more">
                                                <div class="more-post-optns">
                                                    <i class="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-more-horizontal">
                                                            <circle cx="12" cy="12" r="1"></circle>
                                                            <circle cx="19" cy="12" r="1"></circle>
                                                            <circle cx="5" cy="12" r="1"></circle>
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
                                                            <span>If inappropriate Post By Mistake</span>
                                                        </li>
                                                        <li>
                                                            <i class="icofont-flag"></i>Report
                                                            <span>Inappropriate content</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <ins><a title="" href="time-line.html">Sponsors Ads</a></ins>
                                            <span><i class="icofont-globe"></i> Sponsor</span>
                                        </div>
                                        <div class="post-meta">
                                            <ul class="sponsored-caro">
                                                <li>
                                                    <figure><img src="/frontoffice/images/resources/sponsor-prod1.jpg"
                                                            alt=""></figure>
                                                    <div class="sponsor-prod-name">
                                                        <a href="#" title="">Aloevera Juice 1 liter</a>
                                                        <span>$24</span>
                                                    </div>
                                                    <a href="#" title="" class="shop-btn">Shop Now</a>
                                                    <div class="share-info">
                                                        <span>50 shares</span>
                                                        <span>20k Likes</span>
                                                    </div>
                                                    <div class="stat-tools">
                                                        <div class="box">
                                                            <div class="Like"><a class="Like__link"><i
                                                                        class="icofont-like"></i> Like</a>
                                                                <div class="Emojis">
                                                                    <div class="Emoji Emoji--like">
                                                                        <div class="icon icon--like"></div>
                                                                    </div>
                                                                    <div class="Emoji Emoji--love">
                                                                        <div class="icon icon--heart"></div>
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
                                                            </div>
                                                        </div>
                                                        <a title="" href="#" class="share-to"><i
                                                                class="icofont-share-alt"></i> Share</a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <figure><img src="/frontoffice/images/resources/sponsor-prod5.jpg"
                                                            alt=""></figure>
                                                    <div class="sponsor-prod-name">
                                                        <a href="#" title="">Beauty Cosmetics</a>
                                                        <span>$24</span>
                                                    </div>
                                                    <a href="#" title="" class="shop-btn">Shop Now</a>
                                                    <div class="share-info">
                                                        <span>50 shares</span>
                                                        <span>20k Likes</span>
                                                    </div>
                                                    <div class="stat-tools">
                                                        <div class="box">
                                                            <div class="Like"><a class="Like__link"><i
                                                                        class="icofont-like"></i> Like</a>
                                                                <div class="Emojis">
                                                                    <div class="Emoji Emoji--like">
                                                                        <div class="icon icon--like"></div>
                                                                    </div>
                                                                    <div class="Emoji Emoji--love">
                                                                        <div class="icon icon--heart"></div>
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
                                                            </div>
                                                        </div>
                                                        <a title="" href="#" class="share-to"><i
                                                                class="icofont-share-alt"></i> Share</a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <figure><img src="/frontoffice/images/resources/sponsor-prod4.jpg"
                                                            alt=""></figure>
                                                    <div class="sponsor-prod-name">
                                                        <a href="#" title="">Overtime For Men</a>
                                                        <span>$24</span>
                                                    </div>
                                                    <a href="#" title="" class="shop-btn">Shop Now</a>
                                                    <div class="share-info">
                                                        <span>50 shares</span>
                                                        <span>20k Likes</span>
                                                    </div>
                                                    <div class="stat-tools">
                                                        <div class="box">
                                                            <div class="Like"><a class="Like__link"><i
                                                                        class="icofont-like"></i> Like</a>
                                                                <div class="Emojis">
                                                                    <div class="Emoji Emoji--like">
                                                                        <div class="icon icon--like"></div>
                                                                    </div>
                                                                    <div class="Emoji Emoji--love">
                                                                        <div class="icon icon--heart"></div>
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
                                                            </div>
                                                        </div>
                                                        <a title="" href="#" class="share-to"><i
                                                                class="icofont-share-alt"></i> Share</a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <figure><img src="/frontoffice/images/resources/sponsor-prod3.jpg"
                                                            alt=""></figure>
                                                    <div class="sponsor-prod-name">
                                                        <a href="#" title="">Redish Baby Items</a>
                                                        <span>$24</span>
                                                    </div>
                                                    <a href="#" title="" class="shop-btn">Shop Now</a>
                                                    <div class="share-info">
                                                        <span>50 shares</span>
                                                        <span>20k Likes</span>
                                                    </div>
                                                    <div class="stat-tools">
                                                        <div class="box">
                                                            <div class="Like"><a class="Like__link"><i
                                                                        class="icofont-like"></i> Like</a>
                                                                <div class="Emojis">
                                                                    <div class="Emoji Emoji--like">
                                                                        <div class="icon icon--like"></div>
                                                                    </div>
                                                                    <div class="Emoji Emoji--love">
                                                                        <div class="icon icon--heart"></div>
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
                                                            </div>
                                                        </div>
                                                        <a title="" href="#" class="share-to"><i
                                                                class="icofont-share-alt"></i> Share</a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <figure><img src="/frontoffice/images/resources/sponsor-prod2.jpg"
                                                            alt=""></figure>
                                                    <div class="sponsor-prod-name">
                                                        <a href="#" title="">Potato Baby Fider</a>
                                                        <span>$24</span>
                                                    </div>
                                                    <a href="#" title="" class="shop-btn">Shop Now</a>
                                                    <div class="share-info">
                                                        <span>50 shares</span>
                                                        <span>20k Likes</span>
                                                    </div>
                                                    <div class="stat-tools">
                                                        <div class="box">
                                                            <div class="Like"><a class="Like__link"><i
                                                                        class="icofont-like"></i> Like</a>
                                                                <div class="Emojis">
                                                                    <div class="Emoji Emoji--like">
                                                                        <div class="icon icon--like"></div>
                                                                    </div>
                                                                    <div class="Emoji Emoji--love">
                                                                        <div class="icon icon--heart"></div>
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
                                                            </div>
                                                        </div>
                                                        <a title="" href="#" class="share-to"><i
                                                                class="icofont-share-alt"></i> Share</a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <figure><img src="/frontoffice/images/resources/sponsor-prod3.jpg"
                                                            alt=""></figure>
                                                    <div class="sponsor-prod-name">
                                                        <a href="#" title="">Baby items fider</a>
                                                        <span>$24</span>
                                                    </div>
                                                    <a href="#" title="" class="shop-btn">Shop Now</a>
                                                    <div class="share-info">
                                                        <span>50 shares</span>
                                                        <span>20k Likes</span>
                                                    </div>
                                                    <div class="stat-tools">
                                                        <div class="box">
                                                            <div class="Like"><a class="Like__link"><i
                                                                        class="icofont-like"></i> Like</a>
                                                                <div class="Emojis">
                                                                    <div class="Emoji Emoji--like">
                                                                        <div class="icon icon--like"></div>
                                                                    </div>
                                                                    <div class="Emoji Emoji--love">
                                                                        <div class="icon icon--heart"></div>
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
                                                            </div>
                                                        </div>
                                                        <a title="" href="#" class="share-to"><i
                                                                class="icofont-share-alt"></i> Share</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- advertisment carousel -->

                            <div class="loadmore">
                                <div class="sp sp-bars"></div>
                                <a href="#" title="" data-ripple="">Load More..</a>
                            </div><!-- loadmore buttons -->
                        </div>
                        <div class="col-lg-3">
                            <aside class="sidebar static right">


                                <div class="widget">
                                    <h4 class="widget-title">Ask Research Question?</h4>
                                    <div class="ask-question">
                                        <i class="icofont-question-circle"></i>
                                        <h6>Ask questions in Q&A to get help from experts in your field.</h6>
                                        <a class="ask-qst" href="#" title="">Ask a question</a>
                                    </div>
                                </div><!-- ask question widget -->


                                <div class="widget stick-widget">
                                    <h4 class="widget-title">Who's follownig</h4>
                                    <ul class="followers">
                                        <li>
                                            <figure><img alt="" src="/frontoffice/images/resources/friend-avatar.jpg">
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
                                            <figure><img alt="" src="/frontoffice/images/resources/friend-avatar2.jpg">
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
                                            <figure><img alt="" src="/frontoffice/images/resources/friend-avatar3.jpg">
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
                                            <figure><img alt="" src="/frontoffice/images/resources/friend-avatar4.jpg">
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
                                            <figure><img alt="" src="/frontoffice/images/resources/friend-avatar5.jpg">
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
                                </div><!-- whos following -->
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
<div class="modal fade" id="uploadCoverPhotoModal" tabindex="-1" role="dialog" aria-labelledby="uploadCoverPhotoModalLabel" aria-hidden="true">
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
                    <input type="file" name="cover_photo" id="cover_photo" accept="image/*" >
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
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
                url: '{{ route("upload.cover.photo") }}', // URL of the uploadCoverPhoto endpoint
                method: 'POST',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token in headers
                },
                success: function(response) {
                    // Show success toast message
                    showToast('success', response.message);
                    $('#uploadCoverPhotoModal').modal('hide'); // Hide the modal
                    reloadCompletionProgress(); // Reload completion progress
                },
                error: function(xhr, status, error) {
                    // Show error toast message
                    var errorMessage = xhr.responseJSON ? xhr.responseJSON.message : 'An error occurred.';
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
    $(document).ready(function () {
        $('#imageUploadForm').submit(function (e) {
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
                success: function (response) {
                    showToast('success', response.message);
                    $('#uploadImageModal').modal('hide');
                    reloadCompletionProgress(); // Reload completion progress

                },
                error: function (xhr, status, error) {
                    showToast('error', error);
                }
            });
        });

        function reloadCompletionProgress() {
            // Perform AJAX request to get the updated content
            $.ajax({
                url: location.href, // Reload the current URL
                type: 'GET', // Use GET method
                success: function (response) {
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
                error: function (xhr, status, error) {
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

@endsection