@extends('front.layouts.main')
@section('content')
    <main id="content" role="main">
        <div class="container space-top-3 space-top-lg-3 space-bottom-1 space-bottom-md-2">
            <div class="w-lg-80 text-center mx-lg-auto">
                <div class="mb-5 mb-md-11">
                    <h1>{{ $title }}</h1>
                </div>
            </div>
            <!-- Blogs Section -->
            <div class="row justify-content-lg-between">
                <div class="col-lg-8">
                    <!-- Blog -->
                    @if (!empty($articles) && $articles->count())
                        @foreach ($articles as $article)
                            <!-- Blog -->
                            <article class="row mb-7">
                                <div class="col-md-5">
                                    @if (!empty($article->thumbnail) && file_exists('storage/article/' . $article->thumbnail))
                                        <img class="card-img"
                                            src="{{ asset('storage/article/' . $article->thumbnail) }}" alt="Thumbnail">
                                    @else
                                        <img class="card-img" src="{{ asset('storage/article/no-thumbnail.jpg') }}"
                                            alt="Thumbnail">
                                    @endif
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body d-flex flex-column h-100 px-0">
                                        <span class="d-block mb-2">

                                            <a class="font-weight-bold"
                                                href="{{ route('article') }}?category={{ $article->category->slug }}">{{ $article->category->name }}</a>
                                        </span>
                                        <h3><a class="text-inherit"
                                                href="{{ route('article.read', $article->slug) }}">{{ $article->title }}</a>
                                        </h3>
                                        <p>{!! strip_tags(substr($article->content, 0, 100)) . '...' !!}</p>
                                        <div class="media align-items-center mt-auto">
                                            <i class="fa fa-user d-block d-sm-inline-block mb-1 mb-sm-0 mr-3"></i>
                                            <div class="media-body">
                                                <span class="text-dark">
                                                    <span
                                                        class="d-inline-block text-inherit font-weight-bold">{{ ucfirst(strtok($article->user->email, '@')) }}</span>
                                                </span>
                                                <small class="d-block">
                                                    {{ $article->created_at->diffForHumans() }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <!-- End Blog -->
                            <!-- End Blog -->
                        @endforeach
                    @else
                        <p>Artikel tidak ditemukan!</p>
                    @endif

                    <!-- Sticky Block End Point -->
                    <div id="stickyBlockEndPoint"></div>
                </div>
                <div class="col-lg-3">
                    <div class="mb-7">
                        <div class="mb-3">
                            <h3>Cari Artikel</h3>
                        </div>

                        <!-- Form -->
                        <form class="mb-2">
                            <div class="input-group input-group-flush mb-3">
                                @if (request('tags'))
                                    <input type="hidden" value="{{ request('tags') }}" name="tags">
                                @elseif (request('category'))
                                    <input type="hidden" value="{{ request('category') }}" name="category">
                                @endif
                                <input type="text" class="form-control form-control-sm" value="{{ request('search') }}"
                                    name="search" id="search" placeholder="Masukkan kata kunci">
                            </div>
                            <button type="submit" class="btn btn-sm btn-custom btn-block"><i
                                    class="fa-solid fa-magnifying-glass mr-1"></i>Cari</button>
                        </form>
                        <!-- End Form -->
                    </div>
                    <div class="mb-7">
                        <div class="mb-3">
                            <h3>Kategori </h3>
                        </div>
                        <!-- Blog -->
                        @foreach ($categories as $category)
                            <article class="mb-3">
                                <a class="card card-frame p-3"
                                    href="{{ route('article') }}?category={{ $category->slug }}">
                                    <div class="media align-items-center">
                                        <div class="media-body mr-2">
                                            <h4 class="h6 mb-0">{{ $category->name }}</h4>
                                        </div>
                                        <i class="fas fa-angle-right"></i>
                                    </div>
                                </a>
                            </article>
                        @endforeach
                        <!-- End Blog -->

                    </div>

                    <!-- Sticky Block Start Point -->
                    <div id="stickyBlockStartPoint"></div>

                    <div class="js-sticky-block"
                        data-hs-sticky-block-options='{
                                                                                                                                                                                                                                                                                                                                                                                                    "parentSelector": "#stickyBlockStartPoint",
                                                                                                                                                                                                                                                                                                                                                                                                    "breakpoint": "lg",
                                                                                                                                                                                                                                                                                                                                                                                                    "startPoint": "#stickyBlockStartPoint",
                                                                                                                                                                                                                                                                                                                                                                                                    "endPoint": "#stickyBlockEndPoint",
                                                                                                                                                                                                                                                                                                                                                                                                    "stickyOffsetTop": 24,
                                                                                                                                                                                                                                                                                                                                                                                                    "stickyOffsetBottom": 24
                                                                                                                                                                                                                                                                                                                                                                                                    }'>
                        <div class="mb-7">
                            <div class="mb-3">
                                <h3>Tags </h3>
                            </div>
                            @if (!empty($tags) && $tags->count())
                                @foreach ($tags as $tag)
                                    <a class="btn btn-xs btn-soft-secondary mb-1"
                                        href="{{ route('article') }}?tags={{ $tag->slug }}">{{ $tag->name }}</a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <nav aria-label="Page navigation">
                    <ul class="pagination mb-0">
                        {{ $articles->links() }}
                    </ul>
                </nav>
                <!-- End Pagination -->
            </div>
            <!-- End Blogs Section -->
    </main>
@endsection
