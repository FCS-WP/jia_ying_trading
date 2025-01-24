(function($) {
    'use strict';

    var tfsvg = function() {
        $(".services-post .post-icon").each(function() {
            var svg = $(this).find("svg");
            if (!svg.length) return;

            var paths = $(this).find("path");

            $(this).appear(function() {
                anime({
                    targets: paths.get(),
                    duration: 3000,
                    strokeDashoffset: [anime.setDashoffset, 0],
                    easing: 'easeInOutCubic'
                })
            })
        })
          
    };
    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tf-svg.default', tfsvg );
    });

})(jQuery);
