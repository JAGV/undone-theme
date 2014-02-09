
define(["jquery"], function($) {
    return {

        config: {
            $toggle: $('#js-APlayer-trigger'),
            $player: $('#js-PlayerDrawer')
        },

        init: function(config) {

            var root = this.config,
                $toggle = root.$toggle,
                $player = root.$player;

            $toggle.on('click', function() {
                $player.toggleClass('is-hidden');
            });
        }

    };
});
