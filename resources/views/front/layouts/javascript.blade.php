        <!-- JS Global Compulsory -->

        <script src="{{ asset('user/assets/vendor/jquery-migrate/dist/jquery-migrate.min.js') }}"></script>
        <script src="{{ asset('user/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

        <!-- JS Implementing Plugins -->

        <script src="{{ asset('user/assets/vendor/aos/dist/aos.js') }}"></script>
        {{-- data table --}}


        <script src="{{ asset('user/assets/vendor/hs-unfold/dist/hs-unfold.min.js') }}"></script>
        <script src="{{ asset('user/assets/vendor/hs-header/dist/hs-header.min.js') }}"></script>
        <script src="{{ asset('user/assets/vendor/hs-go-to/dist/hs-go-to.min.js') }}"></script>
        <script src="{{ asset('user/assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.js') }}"></script>
        <script src="{{ asset('user/assets/vendor/jquery-validation/dist/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('user/assets/vendor/slick-carousel/slick/slick.js') }}"></script>
        <script src="{{ asset('user/assets/vendor/fancybox/dist/jquery.fancybox.min.js') }}"></script>
        <script src="{{ asset('user/assets/vendor/hs-step-form/dist/hs-step-form.min.js') }}"></script>
        <script src="{{ asset('user/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
        <!-- Toastr -->
        <script src="{{ asset('user/assets/vendor/toastr/toasting.js') }}"></script>
        <script src="{{ asset('user/assets/vendor/jquery-confirm/jquery-confirm.min.js') }}"></script>
        <script src="{{ asset('admin/lib/jquery-ui/ui/widgets/datepicker.js') }}"></script>
        <!-- JavaScript -->
        <script src="{{ asset('admin/lib/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
        <script src="{{ asset('admin/lib/select2-4.1.0-rc.0/dist/js/select2.min.js') }}"></script>
        <!-- CKEditor -->
        <script src="{{ asset('admin/lib/ckeditor/standar/ckeditor.js') }}"></script>
        {{-- <script src="{{ asset('user/assets/vendor/dropzone/dist/min/dropzone.min.js') }}"></script> --}}
        <script src="{{ asset('user/assets/vendor/hs-sticky-block/dist/hs-sticky-block.min.js') }}"></script>
        <!-- JS Front -->
        <script src="{{ asset('user/assets/js/hs.core.js') }}"></script>
        <script src="{{ asset('user/assets/js/hs.slick-carousel.js') }}"></script>
        {{-- <script src="{{ asset('user/assets/js/hs.dropzone.js') }}"></script> --}}

        <!-- JS Plugins Init. -->
        <script>
            $(document).on('ready', function() {
                // initialization of header
                var header = new HSHeader($('#header')).init();

                // initialization of mega menu
                var megaMenu = new HSMegaMenu($('.js-mega-menu')).init();
                // initialization of dropzone

                // $('.js-dropzone').each(function() {
                //var dropzone = $.HSCore.components.HSDropzone.init('#' + $(this).attr('id'));
                //});

                // initialization of sticky blocks
                $('.js-sticky-block').each(function() {
                    var stickyBlock = new HSStickyBlock($(this)).init();
                });


                // initialization of step form
                $(".js-step-form").each(function() {
                    var stepForm = new HSStepForm($(this)).init();
                });

                // initialization of unfold
                var unfold = new HSUnfold('.js-hs-unfold-invoker').init();

                // initialization of fancybox
                $('.js-fancybox').each(function() {
                    var fancybox = $.HSCore.components.HSFancyBox.init($(this));
                });

                // initialization of slick carousel
                $('.js-slick-carousel').each(function() {
                    var slickCarousel = $.HSCore.components.HSSlickCarousel.init($(this));
                });

                // initialization of go to
                $('.js-go-to').each(function() {
                    var goTo = new HSGoTo($(this)).init();
                });

                // Page preloader
                setTimeout(function() {
                    $('#jsPreloader').fadeOut(100)
                }, 150)


                // initialization of aos
                AOS.init({
                    duration: 650,
                    once: true
                });

            });
        </script>
        <!-- IE Support -->
        <script>
            if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write(
                '<script src="{{ asset('user/assets/vendor/polifills.js') }}"><\/script>');
        </script>
        @routes
