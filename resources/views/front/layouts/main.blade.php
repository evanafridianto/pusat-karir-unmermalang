<!DOCTYPE html>
<html lang="en">
@section('head')
    @include('front.layouts.head')
@show

<body>
    <!-- Page Preloader -->
    <div id="jsPreloader" class="page-preloader">
        <div class="page-preloader-content-centered">
            <div class="spinner-border text-custom" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
    <!-- End Page Preloader -->
    <!-- ========== HEADER ========== -->
    @section('header')
        @include('front.layouts.header')
    @show
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    @yield('content')
    <!-- ========== END MAIN CONTENT ========== -->

    <!-- ========== FOOTER ========== -->
    @section('footer')
        @include('front.layouts.footer')
    @show
    <!-- ========== END FOOTER ========== -->

    <!-- Go to Top -->
    <a class="js-go-to go-to position-fixed" href="javascript:;" style="visibility: hidden;" data-hs-go-to-options='{
       "offsetTop": 700,
       "position": {
         "init": {
           "right": 15
         },
         "show": {
           "bottom": 15
         },
         "hide": {
           "bottom": -15
         }
       }
     }'>
        <i class="fa fa-angle-up"></i>
    </a>

    <!-- Login Modal -->
    <div class="modal fade" id="chooseRegister" data-backdrop="static" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close position-absolute top-0 right-0 z-index-2 mt-3 mr-3"
                    data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" class="mb-0" width="14" height="14" viewBox="0 0 18 18"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor"
                            d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- End Login Modal -->
    <script src="{{ asset('app/front/main.js') }}"></script>

    <!-- End Go to Top -->
    @section('javascript')
        @include('front.layouts.javascript')
    @show

</body>

</html>
