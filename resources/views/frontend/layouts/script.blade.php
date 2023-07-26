
    <!-- JAVASCRIPT
    ================================================== -->
    <!-- Libs JS -->
    <script src="{{ asset('libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js')}}"></script>
    <script src="{{ asset('libs/aos/dist/aos.js')}}"></script>
    <script src="{{ asset('libs/choices.js/public/assets/scripts/choices.min.js')}}"></script>
    <script src="{{ asset('libs/countup.js/dist/countUp.min.js')}}"></script>
    <script src="{{ asset('libs/dropzone/dist/min/dropzone.min.js')}}"></script>
    <script src="{{ asset('libs/flickity/dist/flickity.pkgd.min.js')}}"></script>
    <script src="{{ asset('libs/flickity-fade/flickity-fade.js')}}"></script>
    <script src="{{ asset('libs/highlightjs/highlight.pack.min.js')}}"></script>
    <script src="{{ asset('libs/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{ asset('libs/isotope-layout/dist/isotope.pkgd.min.js')}}"></script>
    <!-- <script src="{{ asset('libs/jarallax/dist/jarallax.min.js')}}"></script>
    <script src="{{ asset('libs/jarallax/dist/jarallax-video.min.js')}}"></script>
    <script src="{{ asset('libs/jarallax/dist/jarallax-element.min.js')}}"></script> -->
    <!-- <script src="{{ asset('libs/parallax-js/dist/parallax.min.js')}}"></script> -->
    <!-- <script src="{{ asset('libs/quill/dist/quill.min.js')}}"></script> -->
    <script src="{{ asset('libs/smooth-scroll/dist/smooth-scroll.min.js')}}"></script>
    <!-- <script src="{{ asset('libs/typed.js/lib/typed.min.js')}}"></script> -->

    <!-- Map -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>

    <!-- Theme JS -->
    <script src="{{ asset('js/theme.min.js')}}"></script>
   
    <script>
        $(window).on('load', function() {
            var tab = $(".container").find("table");
            tab.addClass("table table-striped");

            var code = $(".container").find("code");
            code.addClass("text-danger");

        })
    </script>