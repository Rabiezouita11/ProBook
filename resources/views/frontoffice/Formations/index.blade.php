@extends('frontoffice.layouts.index')

@section('content')

    <section>
        <div class="gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="page-contents" class="row merged20">
                            <div class="col-lg-12">
                                <div class="main-wraper">
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if (auth()->check())
                                        <div class="main-wraper">
                                            <span class="new-title">Create New Formation</span>
                                            <div class="new-post">
                                                <form method="post">
                                                    <i class="icofont-pen-alt-1"></i>
                                                    <input type="text" placeholder="Create New Formation">
                                                </form>
                                            </div>
                                        </div><!-- create new formation -->
                                    @else
                                        <div class="main-wrapper" style="text-align: center">
                                            <div class="new-post">
                                                <span class="new-title">Create New Formation</span>
                                                <div class="login-prompt">
                                                    <p>To create a new formation, please</p>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="page-contents" class="row merged20">
                            <div class="col-lg-12">
                                <div class="main-wraper">

                                    @if ($formations->isEmpty())
                                        <p style="text-align: center; font-size: 16px; font-weight: bold;">No formations
                                            available.</p>
                                    @else
                                        @foreach ($formations as $formation)
                                            <div class="blog-posts">

                                                @if ($formation->image)
                                                    <figure><img src="{{ asset('formations_images/' . $formation->image) }}"
                                                            alt="{{ $formation->title }}">
                                                            <span class="tag">Free</span></figure>
                                                           
                                                @else
                                                <span class="tag">Free</span>
                                                @endif
                                               

                                                <div class="blog-post-meta">
                                                    <h4><a href="#" title="">{{ $formation->domain }}</a></h4>
                                                    {{-- Display more formation details as needed --}}
                                                    <p>
                                                        {{ $formation->contenu }}
                                                    </p>
                                                    <span><i class="icofont-clock-time"></i> {{ $formation->created_at->format('F d, Y') }}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="card-footer clearfix pagination-container">
                                            {{ $formations->links('vendor.pagination.default') }}
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                        </i>Create New Formation
                    </h5>
                </div>
                <div class="post-new">
                    <form method="post" action="{{ route('formations.store') }}" class="c-form"
                        enctype="multipart/form-data">
                        @csrf
                        <!-- This is important for Laravel to validate the form submission -->

                        <textarea id="emojionearea1" name="contenu" placeholder="Formation Description" required></textarea>
                        @error('contenu')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror

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

                        <div class="post-newmeta">
                            <input type="file" name="image" >
                            @error('image')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="main-btn">Create Formation</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
