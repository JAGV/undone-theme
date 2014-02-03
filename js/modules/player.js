
define(["jquery", "lodash", "jquery.jplayer", "jquery.jplayerplaylist", "jquery.pubsub"],
    function( jQuery, _, jPlayer, jPlayerPlaylist, pubSub ){

    return {

        config: {
            $player: '#js-APlayer',
            $body: $('body'),
            jsonURL: 'http://localhost:8888/undone.ca/api/get_posts/'
        },

        createSonglist: function(data) {

            var songPosts = data.posts ? _.where(data.posts, {"format": "audio"}) : data,
                playlistData = [];

            _.each(songPosts, function(i) {
                if(i.song_mp3) {
                    playlistData.push({
                        id: i.id,
                        title: i.title,
                        artist: i.custom_fields.artist,
                        mp3: i.song_mp3,
                        poster: i.thumbnail
                    });
                }
            }, songPosts);

            $.publish("playlistMade", [playlistData]);

        },

        findSong: function(id) {
            var song = _.where(this.undonePlaylist.playlist, {id: id}),
                location = _.indexOf(this.undonePlaylist.playlist, song[0]);

            if(location === -1) {
                return null;
            } else {
                return location;
            }
        },

        playPost: function() {
            var $this = $(this),
                id = $this.data('id');

            $.publish("playSong", [id]);
        },

        pausePost: function() {
            var $this = $(this),
                id = $this.data('id');

            $.publish("pauseSong", [id]);
        },

        init: function(config) {

            // Create an internal reference to this
            var _this = this;

            _this.undonePlaylist = new jPlayerPlaylist({
                    jPlayer: "#js-APlayer",
                    cssSelectorAncestor: "#js-APlayer-container",
                    size: { width: '200px', height: '200px' }
                }, {
                    playlistOptions: {
                        enableRemoveControls: false
                    },
                    swfPath: "undone.ca/wp-content/themes/undone/bower_components/jplayer/jquery.jplayer/Jplayer.swf",
                    supplied: "mp3, m4a, oga",
                    smoothPlayBar: true,
                    keyEnabled: true,
                    audioFullScreen: true
            });

            $.getJSON(_this.config.jsonURL, _this.createSonglist);

            _this.config.$body.on('click', '.js-playPost', _this.playPost);
            _this.config.$body.on('click', '.js-pausePost', _this.pausePost);

            $.subscribe("playSong", function(u, id) {
                _this.undonePlaylist.play(_this.findSong(id));

                // nonsense to make the current post display that it is playing.
                var current = _this.undonePlaylist.current;
                console.log('#' + _this.undonePlaylist.playlist[current].id + ' post is playing');
            });

            $.subscribe("pauseSong", function(u, id) {
                _this.undonePlaylist.pause();
            });

            $.subscribe("playlistMade", function(u, obj) {
                _.each(obj, function(i) { _this.undonePlaylist.add(i); });
            });


            // Everything below here is a godawful mess
            $('.jp-current-info .jp-current-artist').html('Artist');
            $('.jp-current-info .jp-current-track').html('Track');

            $("#js-APlayer").bind($.jPlayer.event.play, function(event){
                var currentArtist = _this.undonePlaylist.playlist[_this.undonePlaylist.current].artist;
                var currentTrack = _this.undonePlaylist.playlist[_this.undonePlaylist.current].title;
                var currentArtistContainer = $('.jp-current-info .jp-current-artist');
                var currentTrackContainer = $('.jp-current-info .jp-current-track');

                currentArtistContainer.html(currentArtist);
                currentTrackContainer.html(currentTrack);

            });

            $('body').on('click', '.nav-links a', function(event) {
                var $this = $(this),
                    link = $this.attr('href') + '&json=1',
                    currentSongs = _this.undonePlaylist.playlist;

                $.getJSON(link, function(data){
                    var songs = _.where(data.posts, {"format": "audio"}),
                        diff = _.difference(_.pluck(songs, "id"), _.pluck(currentSongs, "id")),
                        result = _.filter(songs, function(obj) {return diff.indexOf(obj.id) >= 0; });

                    _this.createSonglist(result);
                });
            });
        }
    };
});
