 @extends('front.layouts.main')
 @section('content')
     <main id="content" role="main">
         <!-- Article Description Section -->
         <div class="container space-top-3 space-bottom-2">
             <div class="w-lg-60 mx-lg-auto">
                 <div class="mb-4">
                     <h1 class="h2">{{ $article->title }}</h1>
                 </div>
                 <!-- Author -->
                 <div class="border-top border-bottom py-4 mb-5">
                     <div class="row align-items-md-center">
                         <div class="col-md-7 mb-5 mb-md-0">
                             <div class="media align-items-center">
                                 <i class="fa-solid fa-user mr-1"></i>
                                 <div class="media-body font-size-1 ml-3">
                                     <span class="h6">
                                         {{ ucfirst(strtok($article->user->email, '@')) }}
                                         <small class="d-block text-muted">
                                             {{ $article->created_at->diffForHumans() }}</small>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-5">
                             <div class="d-flex justify-content-md-end align-items-center">
                                 <a href="{{ route('article') }}?category={{ $article->category->slug }}">
                                     <span
                                         class="d-block small font-weight-bold text-cap mr-2">{{ $article->category->name }}</span></a>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- End Author -->

             </div>

             <div class="w-lg-60 mx-lg-auto">
                 @if (!empty($article->thumbnail) && file_exists('storage/article/' . $article->thumbnail))
                     <img class="img-fluid rounded" src="{{ asset('storage/article/' . $article->thumbnail) }}"
                         alt="Image Description">
                 @elseif(Str::contains($article->thumbnail, 'https://'))
                     <img class="img-fluid rounded" src="{{ $article->thumbnail }}" alt="Thumbnail">
                 @endif
                 <div class="mt-8">
                     {!! $article->content !!}
                 </div>
             </div>

             <div class="w-lg-60 mx-lg-auto mt-10">
                 <!-- Badges -->
                 <div class="mt-5">
                     <div class="d-sm-flex align-items-sm-center text-center text-sm-left">
                         @if ($article->tags->count())
                             <span class="d-block mr-sm-3 mb-2 mb-sm-1">Tags:</span>
                             @foreach ($article->tags as $tag)
                                 <a class="btn btn-xs btn-soft-secondary btn-pill mx-sm-1 mb-1"
                                     href="{{ route('article') }}?tags={{ $tag->slug }}">{{ $tag->name }}</a>
                             @endforeach
                         @endif
                     </div>
                 </div>
                 <!-- End Badges -->
             </div>
         </div>
         <!-- End Article Description Section -->
         <!-- Blog Card Section -->
         <div class="container">
             <div class="w-lg-75 border-top space-2 mx-lg-auto">
                 <div class="mb-3 mb-sm-5">
                     <h3>Berita & Event Terkait</h3>
                 </div>
                 <div class="row">
                     @if (!empty($article_relateds) && $article_relateds->count())
                         @foreach ($article_relateds as $article_related)
                             <div class="col-md-6">
                                 <!-- Blog Card -->
                                 <article class="border-bottom h-100 py-5">
                                     <div class="row justify-content-between">
                                         <div class="col-6">
                                             <a class="d-block small font-weight-bold text-cap mb-2"
                                                 href="{{ route('article') }}?category={{ $article_related->category->slug }}">{{ $article_related->category->name }}</a>
                                             <h4 class="mb-0"><a class="text-inherit"
                                                     href="{{ route('article.read', $article_related->slug) }}">{{ $article_related->title }}</a>
                                             </h4>
                                             <small class="d-block">
                                                 {{ $article_related->created_at->diffForHumans() }}</small>
                                         </div>
                                         <div class="col-6">
                                             @if (!empty($article_related->thumbnail) && file_exists('storage/article/' . $article_related->thumbnail))
                                                 <img class="img-fluid"
                                                     src="{{ asset('storage/article/' . $article_related->thumbnail) }}"
                                                     alt="Thumbnail">
                                             @else
                                                 <img class="img-fluid"
                                                     src="{{ asset('storage/article/no-thumbnail.jpg') }}"
                                                     alt="Thumbnail">
                                             @endif
                                         </div>
                                     </div>
                                 </article>
                                 <!-- End Blog Card -->
                             </div>
                         @endforeach
                     @endif
                 </div>
             </div>
         </div>
         <!-- End Blog Card Section -->
     </main>
 @endsection
