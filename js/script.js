if (typeof jQuery === 'function') {
    define("jquery", function() { return jQuery; });
}

require.config({
    paths: {
        "jquery.jplayer": "../bower_components/jplayer/jquery.jplayer/jquery.jplayer",
        "jquery.jplayerplaylist": "../bower_components/jplayer/add-on/jplayer.playlist",
        "lodash": "../bower_components/lodash/dist/lodash",
        "customizer": "utilities/customizer",
        "navigation": "utilities/navigation",
        "skip-link-focus": "utilities/skip-link-focus-fix",
        "fade-logo": "modules/fade-logo",
        "player": "modules/player",
        "toggle-player": "modules/toggle-player",
        "jquery.pubsub": "utilities/pub-sub"
    },
    "shim": {
        "jquery.jplayer": ["jquery"],
        "jquery.jplayerplaylist": {
            deps: ["jquery", "jquery.jplayer"],
            exports: "jPlayerPlaylist"
        },
        "jquery.pubsub": ["jquery"]
    }
});

require(["player", "fade-logo", "toggle-player"], function(player, fadeLogo, togglePlayer) {

    togglePlayer.init();
    fadeLogo.init();
    player.init();
    console.log('Web hooks in da mix');

});
