
define(["jquery"], function($) {
    return {
        config: {
            // This needs to be changed to not rely on selectors used in CSS
            $topMeasure: $('#js-topMeasure'),
            $hiddenLogo: $('#js-hiddenLogo')
        },

        init: function(config) {
            var root = this.config,
                $hiddenLogo = root.$hiddenLogo;

            $(window).on('scroll', function(event) {
                var amountScrolled = window.scrollY,
                    distanceFromTop = root.$topMeasure.offset().top;

                if ( amountScrolled - distanceFromTop > 0 ) {
                    $hiddenLogo.removeClass('is-hidden');
                } else {
                    $hiddenLogo.addClass('is-hidden');
                }
            });
        }
    };
});
