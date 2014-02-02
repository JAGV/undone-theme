
define(["jquery", "lodash", "jquery.jplayer", "jquery.jplayerplaylist", "jquery.pubsub"], function(jQuery, _, jPlayer, jPlayerPlaylist, pubSub ){

    return {

        config: {
            $player: $('#js-APlayer'),
            $body: $('body'),
            jsonURL: 'http://localhost:8888/undone.ca/api/get_recent_posts/'
        },

        createSonglist: function(data) {

            var songPosts = _.where(data.posts, {"format": "audio"}),
                playlistData = [];

            _.each(songPosts, function(i) {
                if(i.song_mp3) {
                    playlistData.push({
                        id: i.id,
                        title: i.title,
                        artist: i.custom_fields.artist,
                        mp3: i.song_mp3
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
                id = $this.data('id'),
                playerObj = Undone.player;

            if(playerObj.findSong(id) !== null) {
                playerObj.undonePlaylist.play(playerObj.findSong(id));
            }
        },

        init: function(config) {

            var _this = this;

            _this.undonePlaylist = new jPlayerPlaylist({
                    jPlayer: _this.config.$player,
                    cssSelectorAncestor: "#js-APlayer-container"
                }, {
                    playlistOptions: {
                        enableRemoveControls: false
                    },
                    swfPath: "undone.ca/wp-content/themes/undone/bower_components/jplayer/jquery.jplayer/Jplayer.swf",
                    supplied: "mp3, m4a, oga",
                    smoothPlayBar: true,
                    keyEnabled: true
            });

            $.getJSON(_this.config.jsonURL, _this.createSonglist);
            $.subscribe("playlistMade", function(u, obj) {
                _.each(obj, function(i) { _this.undonePlaylist.add(i); });
            });
            _this.config.$body.on('click', '.js-playPost', _this.playPost);
        }
    };
});
