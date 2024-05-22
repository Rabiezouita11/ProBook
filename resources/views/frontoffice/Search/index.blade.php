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
                                    <div class="main-title"> {{ $domain }}</div>

                                    @if ($results->isEmpty())
                                    <p style="text-align: center; font-size: 16px; font-weight: bold;">No publications found for this search.</p>
                                    @else
                                    @foreach ($results as $result)
                                    <div class="blog-posts">
                                        @if ($result->image)
                                            <figure><img src="{{ asset('images/' . $result->image) }}" alt="{{ $result->title }}"></figure>
                                        @else
                                            <figure></figure>
                                        @endif
                                        <div class="blog-post-meta">
                                            <ul>
                                                <li><i class="icofont-comment"></i><a title="comments" href="#">{{ $result->totalComments() }}</a></li>
                                            </ul>
                                            
                                            <a href="{{ route('profile.show', $result->user) }}"><h4  >{{ $result->user->name }}</h4></a>
                                            <p>
                                                {{ $result->contenu }}
                                            </p>
                                            <span><i class="icofont-clock-time"></i> {{ $result->created_at->format('F d, Y') }}</span>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="card-footer clearfix pagination-container">
                                    {{ $results->links('vendor.pagination.default') }}
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





@endsection
