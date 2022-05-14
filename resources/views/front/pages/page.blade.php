 @extends('front.layouts.main')
 @section('content')
     <!-- ========== MAIN ========== -->
     <main id="content" role="main">
         <!-- Hero Section -->
         <div class="container space-top-3 space-bottom-2">
             <div class="w-lg-80 text-center mx-lg-auto">
                 <div class="mb-5 mb-md-11">
                     <h1>{{ $page->name }}</h1>
                 </div>
             </div>
             <!-- End Hero Section -->
             <!-- About Section -->
             <div class="container space-bottom-2 space-bottom-lg-3">
                 {{-- <div class="row justify-content-lg-between"> --}}
                 <div class="w-lg-60 mx-lg-auto">
                     @if (!empty($page->image) && file_exists('storage/page/' . $page->image))
                         <img class="img-fluid rounded" src="{{ asset('storage/page/' . $page->image) }}" alt="Image">
                     @elseif(Str::contains($page->image, 'https://'))
                         <img class="img-fluid rounded" src="{{ $page->image }}" alt="Image">
                     @endif
                     <div class="mt-8">
                         <h3 class="h2">{{ $page->title }}</h3>

                         {!! $page->content !!}
                     </div>
                 </div>
             </div>
         </div>
         <!-- End About Section -->
     </main>
     <!-- ========== END MAIN ========== -->
 @endsection
