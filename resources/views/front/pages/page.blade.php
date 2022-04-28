 @extends('front.layouts.main')
 @section('content')
     <!-- ========== MAIN ========== -->
     <main id="content" role="main">
         <!-- Hero Section -->
         <div class="container space-top-3 space-top-lg-3 space-bottom-1 space-bottom-md-2">
             <div class="w-lg-80 text-center mx-lg-auto">
                 <div class="mb-5 mb-md-11">
                     <h1>{{ $title }}</h1>
                 </div>
             </div>
         </div>
         <!-- End Hero Section -->
         <!-- About Section -->
         <div class="container space-bottom-2 space-bottom-lg-3">
             <div class="row justify-content-lg-between">
                 {!! $content !!}
             </div>
         </div>
         <!-- End About Section -->
     </main>
     <!-- ========== END MAIN ========== -->
 @endsection
