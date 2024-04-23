<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Probook</title>
    <link rel="icon" href="/frontoffice/images/fav.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="/frontoffice/css/main.min.css">
    <link rel="stylesheet" href="/frontoffice/css/style.css">
    <link rel="stylesheet" href="/frontoffice/css/color.css">
    <link rel="stylesheet" href="/frontoffice/css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
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
                <span>Socimo</span>
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
                    <span>Socimo</span>
                </div>
                <div class="searches">
                    <form method="post">
                        <input type="text" placeholder="Search...">
                        <button type="submit">
                            <i class="icofont-search"></i>
                        </button>
                        <span class="cancel-search">
                            <i class="icofont-close"></i>
                        </span>
                        <div class="recent-search">
                            <h4 class="recent-searches">Your's Recent Search</h4>
                            <ul class="so-history">
                                <li>
                                    <div class="searched-user">
                                        <figure>
                                            <img src="/frontoffice/images/resources/user1.jpg" alt="">
                                        </figure>
                                        <span>Danial Carabal</span>
                                    </div>
                                    <span class="trash">
                                        <i class="icofont-close-circled"></i>
                                    </span>
                                </li>
                                <li>
                                    <div class="searched-user">
                                        <figure>
                                            <img src="/frontoffice/images/resources/user2.jpg" alt="">
                                        </figure>
                                        <span>Maria K</span>
                                    </div>
                                    <span class="trash">
                                        <i class="icofont-close-circled"></i>
                                    </span>
                                </li>
                                <li>
                                    <div class="searched-user">
                                        <figure>
                                            <img src="/frontoffice/images/resources/user3.jpg" alt="">
                                        </figure>
                                        <span>Fawad Khan</span>
                                    </div>
                                    <span class="trash">
                                        <i class="icofont-close-circled"></i>
                                    </span>
                                </li>
                                <li>
                                    <div class="searched-user">
                                        <figure>
                                            <img src="/frontoffice/images/resources/user4.jpg" alt="">
                                        </figure>
                                        <span>Danial Sandos</span>
                                    </div>
                                    <span class="trash">
                                        <i class="icofont-close-circled"></i>
                                    </span>
                                </li>
                                <li>
                                    <div class="searched-user">
                                        <figure>
                                            <img src="/frontoffice/images/resources/user5.jpg" alt="">
                                        </figure>
                                        <span>Jack Carter</span>
                                    </div>
                                    <span class="trash">
                                        <i class="icofont-close-circled"></i>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
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
                        <li class="go-live">
                            <a href="live-stream.html" title="Go Live" data-toggle="tooltip">
                                <i>
                                    <svg fill="#f00" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                        width="18px" height="18px">
                                        <path
                                            d="M 6.1015625 6.1015625 C 3.5675625 8.6345625 2 12.134 2 16 C 2 19.866 3.5675625 23.365437 6.1015625 25.898438 L 7.5195312 24.480469 C 5.3465312 22.307469 4 19.308 4 16 C 4 12.692 5.3465312 9.6925313 7.5195312 7.5195312 L 6.1015625 6.1015625 z M 25.898438 6.1015625 L 24.480469 7.5195312 C 26.653469 9.6925312 28 12.692 28 16 C 28 19.308 26.653469 22.307469 24.480469 24.480469 L 25.898438 25.898438 C 28.432437 23.365437 30 19.866 30 16 C 30 12.134 28.432437 8.6345625 25.898438 6.1015625 z M 9.6367188 9.6367188 C 8.0077188 11.265719 7 13.515 7 16 C 7 18.485 8.0077187 20.734281 9.6367188 22.363281 L 11.052734 20.947266 C 9.7847344 19.680266 9 17.93 9 16 C 9 14.07 9.7847344 12.319734 11.052734 11.052734 L 9.6367188 9.6367188 z M 22.363281 9.6367188 L 20.947266 11.052734 C 22.215266 12.319734 23 14.07 23 16 C 23 17.93 22.215266 19.680266 20.947266 20.947266 L 22.363281 22.363281 C 23.992281 20.734281 25 18.485 25 16 C 25 13.515 23.992281 11.265719 22.363281 9.6367188 z M 16 12 A 4 4 0 0 0 16 20 A 4 4 0 0 0 16 12 z" />
                                    </svg>
                                </i>
                            </a>
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
                        </li>
                        <li>
                            <a class="create" href="#" title="Add New" data-toggle="tooltip">
                                <i>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                </i>
                            </a>
                        </li>
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
                                    <a href="add-new-course.html" title="">
                                        <i class="icofont-plus"></i> New Course
                                    </a>
                                </li>
                                <li>
                                    <a class="invite-new" href="#" title="">
                                        <i class="icofont-brand-slideshare"></i>
                                        Invite
                                        Collegue
                                    </a>
                                </li>
                                <li>
                                    <a href="pay-out.html" title="">
                                        <i class="icofont-price"></i> Payout
                                    </a>
                                </li>
                                <li>
                                    <a href="price-plan.html" title="">
                                        <i class="icofont-flash"></i> Upgrade
                                    </a>
                                </li>
                                <li>
                                    <a href="help-faq.html" title="">
                                        <i class="icofont-question-circle"></i> Help
                                    </a>
                                </li>
                                <li>
                                    <a href="settings.html" title="">
                                        <i class="icofont-gear"></i> Setting
                                    </a>
                                </li>
                                <li>
                                    <a href="privacy-n-policy.html" title="">
                                        <i class="icofont-notepad"></i> Privacy
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
                            <a href="index.html" title="">Newsfeed</a>
                        </li>
                        <li>
                            <a href="company-home.html" title="">Company Home</a>
                        </li>
                        <li>
                            <a href="profile-page2.html" title="">User Profile</a>
                        </li>
                        <li>
                            <a href="profile.html" title="">Student User Profile</a>
                        </li>
                        <li>
                            <a href="groups.html" title="">Groups</a>
                        </li>
                        <li>
                            <a href="group-detail.html" title="">Group Detail</a>
                        </li>
                        <li>
                            <a href="post-detail.html" title="">Social Post Detail</a>
                        </li>
                        <li>
                            <a href="messages.html" title="">Chat/Messages</a>
                        </li>
                        <li>
                            <a href="notifications.html" title="">Notificatioins</a>
                        </li>
                        <li>
                            <a href="search-result.html" title="">Search Result</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a class="" href="#" title="">
                        <i class="">
                            <svg id="ab7" class="feather feather-zap" stroke-linejoin="round"
                                stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none"
                                viewBox="0 0 24 24" height="14" width="14"
                                xmlns="http://www.w3.org/2000/svg">
                                <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2" />
                            </svg>
                        </i>
                        Features
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="videos.html" title="">Videos</a>
                        </li>
                        <li>
                            <a href="live-stream.html" title="">Live Stream</a>
                        </li>
                        <li>
                            <a href="event-page.html" title="">Events Page</a>
                        </li>
                        <li>
                            <a href="event-detail.html" title="">Event Detail</a>
                        </li>
                        <li>
                            <a href="Q-A.html" title="">QA</a>
                        </li>
                        <li>
                            <a href="Q-detail.html" title="">QA Detail</a>
                        </li>
                        <li>
                            <a href="help-faq.html" title="">Support Help</a>
                        </li>
                        <li>
                            <a href="help-faq-detail.html" title="">Support Detail</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a class="" href="#" title="">
                        <i class="">
                            <svg id="ab5" xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag">
                                <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <path d="M16 10a4 4 0 0 1-8 0"></path>
                            </svg>
                        </i>
                        Market Place
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="books.html" title="">Books</a>
                        </li>
                        <li>
                            <a href="book-detail.html" title="">Books Detail</a>
                        </li>
                        <li>
                            <a href="courses.html" title="">Course</a>
                        </li>
                        <li>
                            <a href="course-detail.html" title="">course Detail</a>
                        </li>
                        <li>
                            <a href="add-new-course.html" title="">Add New Course</a>
                        </li>
                        <li>
                            <a href="product-cart.html" title="">Cart Page</a>
                        </li>
                        <li>
                            <a href="product-checkout.html" title="">Checkout</a>
                        </li>
                        <li>
                            <a href="add-credits.html" title="">Add Credit</a>
                        </li>
                        <li>
                            <a href="pay-out.html" title="">Payouts</a>
                        </li>
                        <li>
                            <a href="price-plan.html" title="">Pricing Plans</a>
                        </li>
                        <li>
                            <a href="invoice.html" title="">Invoice</a>
                        </li>
                        <li>
                            <a href="thank-you.html" title="">Thank you Page</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a class="" href="#" title="">
                        <i class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-coffee">
                                <path d="M18 8h1a4 4 0 0 1 0 8h-1"></path>
                                <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path>
                                <line x1="6" y1="1" x2="6" y2="4"></line>
                                <line x1="10" y1="1" x2="10" y2="4"></line>
                                <line x1="14" y1="1" x2="14" y2="4"></line>
                            </svg>
                        </i>
                        Blogs
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="blog.html" title="">Blog</a>
                        </li>
                        <li>
                            <a href="blog-detail.html" title="">Blog Detail</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a class="" href="#" title="">
                        <i>
                            <svg id="ab8" class="feather feather-file" stroke-linejoin="round"
                                stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none"
                                viewBox="0 0 24 24" height="14" width="14"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z" />
                                <polyline points="13 2 13 9 20 9" />
                            </svg>
                        </i>
                        Featured Pages
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="404.html" title="">Error 404</a>
                        </li>
                        <li>
                            <a href="coming-soon.html" title="">Coming Soon</a>
                        </li>
                        <li>
                            <a href="send-feedback.html" title="">Send Feedback</a>
                        </li>
                        <li>
                            <a href="badges.html" title="">Badges</a>
                        </li>
                        <li>
                            <a href="thank-you.html" title="">Thank You</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a class="" href="#" title="">
                        <i class="">
                            <svg id="ab9" xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2">
                                </rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                        </i>
                        Authentications
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="sign-in.html" title="">Sign In</a>
                        </li>
                        <li>
                            <a href="signup.html" title="">Sign Up</a>
                        </li>
                        <li>
                            <a href="forgot-password.html" title="">Forgot Password</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a class="" href="about-university.html" title="">
                        <i>
                            <svg id="ab1" class="feather feather-users" stroke-linejoin="round"
                                stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none"
                                viewBox="0 0 24 24" height="14" width="14"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                <circle r="4" cy="7" cx="9" />
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                            </svg>
                        </i>
                        University Profile
                    </a>
                </li>
                <li class="">
                    <a class="" href="messages.html" title="">
                        <i class="">
                            <svg class="feather feather-message-square" stroke-linejoin="round"
                                stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none"
                                viewBox="0 0 24 24" height="14" width="14" xmlns="http://www.w3.org/2000/svg"
                                id="ab2">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"
                                    style="stroke-dasharray: 68, 88; stroke-dashoffset: 0;" />
                            </svg>
                        </i>
                        Live Chat
                    </a>
                </li>
                <li class="">
                    <a class="" href="privacy-n-policy.html" title="">
                        <i class="">
                            <svg id="ab4" xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay">
                                <path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1">
                                </path>
                                <polygon points="12 15 17 21 7 21 12 15"></polygon>
                            </svg>
                        </i>
                        Privacy Polices
                    </a>
                </li>
                <li class="">
                    <a class="" href="settings.html" title="">
                        <i class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
                                <circle cx="12" cy="12" r="3"></circle>
                                <path
                                    d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                </path>
                            </svg>
                        </i>
                        Web Settings
                    </a>
                </li>
                <li class="menu-item-has-children">
                    <a class="#" href="#" title="">
                        <i class="">
                            <svg id="team" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-smile">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                                <line x1="9" y1="9" x2="9.01" y2="9"></line>
                                <line x1="15" y1="9" x2="15.01" y2="9"></line>
                            </svg>
                        </i>
                        Development Tools
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="widgets.html" title="">Widgets Collection</a>
                        </li>
                        <li>
                            <a href="development-component.html" title="">Web Component</a>
                        </li>
                        <li>
                            <a href="development-elements.html" title="">Web Elements</a>
                        </li>
                        <li>
                            <a href="loader-spiners.html" title="">Loader Spiners</a>
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
                                    <div class="link-item">
                                        <a href="videos.html" title="">
                                            <i class="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-youtube">
                                                    <path
                                                        d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z">
                                                    </path>
                                                    <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02">
                                                    </polygon>
                                                </svg>
                                            </i>
                                            <p>Videos</p>
                                        </a>
                                    </div>
                                    <div class="link-item">
                                        <a href="courses.html" title="">
                                            <i class="">
                                                <svg class="feather feather-airplay" stroke-linejoin="round"
                                                    stroke-linecap="round" stroke-width="2" stroke="currentColor"
                                                    fill="none" viewBox="0 0 24 24" height="24" width="24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1" />
                                                    <polygon points="12 15 17 21 7 21 12 15" />
                                                </svg>
                                            </i>
                                            <p>Courses</p>
                                        </a>
                                    </div>
                                    <div class="link-item">
                                        <a href="books.html" title="">
                                            <i class="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-book">
                                                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                                    <path
                                                        d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z">
                                                    </path>
                                                </svg>
                                            </i>
                                            <p>Books</p>
                                        </a>
                                    </div>
                                    <div class="link-item">
                                        <a href="blog.html" title="">
                                            <i class="">
                                                <svg class="feather feather-layout" stroke-linejoin="round"
                                                    stroke-linecap="round" stroke-width="2" stroke="currentColor"
                                                    fill="none" viewBox="0 0 24 24" height="24" width="24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect ry="2" rx="2" height="18"
                                                        width="18" y="3" x="3" />
                                                    <line y2="9" x2="21" y1="9"
                                                        x1="3" />
                                                    <line y2="9" x2="9" y1="21"
                                                        x1="9" />
                                                </svg>
                                            </i>
                                            <p>Blog</p>
                                        </a>
                                    </div>
                                    <div class="link-item">
                                        <a href="groups.html" title="">
                                            <i class="">
                                                <svg class="feather feather-users" stroke-linejoin="round"
                                                    stroke-linecap="round" stroke-width="2" stroke="currentColor"
                                                    fill="none" viewBox="0 0 24 24" height="24" width="24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                                    <circle r="4" cy="7" cx="9" />
                                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                                </svg>
                                            </i>
                                            <p>Groups</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @if (auth()->check())
                                <div class="col-lg-2">
                                    <div class="user-inf">
                                        <div class="folowerz">Followers: {{ auth()->user()->abonnes()->count() }}
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
                                    <path
                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                    </path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </i> Invite Colleagues
                        </h5>
                    </div>
                    <div class="invitation-meta">
                        <p>
                            Enter an email address to invite a colleague or co-author to join you on socimo. They will
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
                        <a class="" href="#notifications" data-toggle="tab">Notifications</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active fade show" id="messages">
                        <h4>
                            <i class="icofont-envelope"></i> messages
                        </h4>
                        <a href="#" class="send-mesg" title="New Message" data-toggle="tooltip">
                            <i class="icofont-edit"></i>
                        </a>
                        <ul class="new-messages">
                            <li>
                                <figure>
                                    <img src="/frontoffice/images/resources/user1.jpg" alt="">
                                </figure>
                                <div class="mesg-info">
                                    <span>Ibrahim Ahmed</span>
                                    <a href="#" title="">Helo dear i wanna talk to you</a>
                                </div>
                            </li>
                            <li>
                                <figure>
                                    <img src="/frontoffice/images/resources/user2.jpg" alt="">
                                </figure>
                                <div class="mesg-info">
                                    <span>Fatima J.</span>
                                    <a href="#" title="">Helo dear i wanna talk to you</a>
                                </div>
                            </li>
                            <li>
                                <figure>
                                    <img src="/frontoffice/images/resources/user3.jpg" alt="">
                                </figure>
                                <div class="mesg-info">
                                    <span>Fawad Ahmed</span>
                                    <a href="#" title="">Helo dear i wanna talk to you</a>
                                </div>
                            </li>
                            <li>
                                <figure>
                                    <img src="/frontoffice/images/resources/user4.jpg" alt="">
                                </figure>
                                <div class="mesg-info">
                                    <span>Saim Turan</span>
                                    <a href="#" title="">Helo dear i wanna talk to you</a>
                                </div>
                            </li>
                            <li>
                                <figure>
                                    <img src="/frontoffice/images/resources/user5.jpg" alt="">
                                </figure>
                                <div class="mesg-info">
                                    <span>Alis wells</span>
                                    <a href="#" title="">Helo dear i wanna talk to you</a>
                                </div>
                            </li>
                        </ul>
                        <a href="#" title="" class="main-btn" data-ripple="">view all</a>
                    </div>
                    <div class="tab-pane fade" id="notifications">
                        <h4>
                            <i class="icofont-bell-alt"></i> Notifications
                        </h4>
                        <ul class="notificationz">
                            <!-- Notification items will be appended here -->
                        </ul>
                        <a href="#" title="" class="main-btn" data-ripple="">View All</a>
                    </div>

                </div>
            </div>
        </div>
        <!-- side slide message & popup -->
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
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

                                <div class="post-newmeta">
                                    <textarea id="emojionearea1" name="contenu" placeholder="What's On Your Mind?"></textarea>
                                    @error('contenu')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>

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
            <!-- New post popup -->
        @endif
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
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-help-circle">
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
                            <img class="mCS_img_loaded" src="/frontoffice/images/resources/user1.jpg"
                                alt="">
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
                            <img class="mCS_img_loaded" src="/frontoffice/images/resources/user2.jpg"
                                alt="">
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
                            <img class="mCS_img_loaded" src="/frontoffice/images/resources/user3.jpg"
                                alt="">
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
        <!-- share post -->
        <div class="cart-product">
            <a href="product-cart.html" title="View Cart" data-toggle="tooltip">
                <i class="icofont-cart-alt"></i>
            </a>
            <span>03</span>
        </div>
        <!-- view cart button -->
        <div class="chat-live">
            <a class="chat-btn" href="#" title="Start Live Chat" data-toggle="tooltip">
                <i class="icofont-facebook-messenger"></i>
            </a>
            <span>07</span>
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
                                    <img class="two" src="/frontoffice/images/resources/user3.jpg"
                                        alt="">
                                    <span class="status online"></span>
                                </figure>
                                <span>Boys World</span>
                                <i class="icofont-check-circled"></i>
                            </a>
                            <a href="#" title="">
                                <figure class="group-chat">
                                    <img src="/frontoffice/images/resources/user2.jpg" alt="">
                                    <img class="two" src="/frontoffice/images/resources/user3.jpg"
                                        alt="">
                                    <span class="status online"></span>
                                </figure>
                                <span>KK university Fellows</span>
                                <i class="icofont-check-circled"></i>
                            </a>
                            <a href="#" title="">
                                <figure class="group-chat">
                                    <img src="/frontoffice/images/resources/user3.jpg" alt="">
                                    <img class="two" src="/frontoffice/images/resources/user2.jpg"
                                        alt="">
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
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
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
    <!-- custom scripts -->

    <script>
        // Function to fetch notifications via AJAX
        function fetchNotifications() {
            $.ajax({
                url: "{{ route('notifications.fetch') }}",
                type: "GET",
                success: function(response) {
                    const notifications = response.notifications;
                    const notificationList = $('.notificationz');
                    notificationList.empty(); // Clear existing notifications

                    notifications.forEach(function(notification) {
                        const createdAt = moment(notification.created_at).fromNow();
                        const notificationItem = `
                            <li>
                                <figure>
                                    <img src="users/${notification.imageurl}" alt="">
                                </figure>
                                <div class="mesg-info">
                                    <span>${notification.username}</span>
                                    <a href="#" title="">${notification.data}</a>
                                    <span class="timestamp" data-timestamp="${notification.created_at}">${createdAt}</span>
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
            const notificationList = $('.notificationz');

            // Get current timestamp
            const createdAt = moment().fromNow();

            const notificationItem = `
                <li>
                    <figure>
                        <img src="users/${e.imageUrl}" alt="">
                    </figure>
                    <div class="mesg-info">
                        <span>${e.username}</span>
                        <a href="#" title="">${e.message}</a>
                        <span class="timestamp" data-timestamp="${moment()}">${createdAt}</span>
                    </div>
                </li>
            `;
            notificationList.prepend(notificationItem); // Prepend new notifications
        });
    </script>

</body>

</html>
