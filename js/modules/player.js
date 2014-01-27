var Undone = Undone || {};

Undone.player = {

    config: {
        $player: $('#js-APlayer'),
        $body: $('body'),
        jsonURL: 'http://localhost:8888/undone.ca/api/get_recent_posts/'
    },

    createSonglist: function(data) {

        // console.log(data);

        var songPosts = _.where(data.posts, {"format": "audio"}),
            playlistData = [];

        _.each(songPosts, function(i) {
            playlistData.push({
                id: i.id,
                title: i.title,
                artist: i.custom_fields.artist,
                mp3: i.song_mp3
            });
        }, songPosts);

        _.each(playlistData, function(i) { Undone.player.undonePlaylist.add(i); });

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

        Undone.player.undonePlaylist = new jPlayerPlaylist({
                jPlayer: this.config.$player,
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

        $.getJSON(this.config.jsonURL, this.createSonglist);
        Undone.player.config.$body.on('click', '.js-playPost', this.playPost);
    }
};
