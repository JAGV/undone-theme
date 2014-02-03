<div class="APlayer  is-hidden" id="js-PlayerDrawer"><!--  -->


    <div id="js-APlayer-container" class="jp-audio">

        <div class="jp-type-playlist">

            <div id="js-APlayer" class="jp-jplayer"></div>

            <div class="jp-type-single">

                <div class="Grid  Grid--gutters  v1-Grid--2col">

                    <div class="Grid-cell">

                        <div class="jp-gui  jp-interface">

                            <div class="jp-current-info">
                                <div class="jp-current-artist"></div>
                                <div class="jp-current-track"></div>
                            </div><!-- .jp-current-info -->

                            <div class="jp-time-holder">
                                <div class="jp-current-time"></div>
                                <div class="jp-duration"></div>                    
                            </div><!-- .jp-time-holder -->

                            <div class="jp-progress">
                                <div class="jp-seek-bar">
                                    <div class="jp-play-bar"></div>
                                </div><!-- .jp-seek-bar -->
                            </div><!-- .jp-progress -->

                            <!-- this is also not in the design
                            <div class="jp-volume-bar">
                                <div class="jp-volume-bar-value"></div>
                            </div> .jp-volume-bar -->

                            <ul class="jp-controls">
                                <li><button class="jp-previous"><span class="icon-seek-left"></span><span class="visuallyhidden">Previous</span></button></li>
                                <li><button class="jp-play"><span class="icon-play"></span><span class="visuallyhidden">Play</span></button></li>
                                <li><button class="jp-pause"><span class="icon-pause"></span><span class="visuallyhidden">Pause</span></button></li>
                                <li><button class="jp-next"><span class="icon-seek-right"></span><span class="visuallyhidden">Next</span></button></li>

                                <!-- these were not specificed in the design.. but should maybe be present?
                                <li class="visuallyhidden"><button class="jp-stop">Stop</button></li>
                                <li class="visuallyhidden"><button class="jp-mute" title="mute">Mute</button></li>
                                <li class="visuallyhidden"><button class="jp-unmute" title="unmute">Unmute</button></li>
                                <li class="visuallyhidden"><button class="jp-volume-max" title="max volume">Max Volume</button></li>
                                -->
                            </ul><!-- jp-controls -->

                            <!-- not displayed in the design.. again, possibly good controls?
                            <ul class="jp-toggles">
                                <li><button class="jp-repeat" title="repeat">Repeat</button></li>
                                <li><button class="jp-repeat-off" title="repeat off">Repeat Off</button></li>
                            </ul> .jp-toggles -->

                        </div><!-- .jp-gui -->

                    </div><!-- .Grid-cell -->

                    <div class="Grid-cell">

                        <div class="jp-playlist">
                            <ul>
                                <!-- The method Playlist.displayPlaylist() uses this unordered list -->
                                <li></li>
                            </ul>
                        </div><!-- .jp-playlist -->

                    </div><!-- .Grid-cell -->

                    <div class="Grid-cell">

                        <div class="jp-no-solution">
                            <span>Update Required</span>
                            To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash Plugin</a>.
                        </div><!-- .jp-no-solution -->

                    </div><!-- .Grid-cell -->

                </div><!-- .Grid -->

            </div><!-- jp-type-single -->

        </div><!-- #js-APlayer-container -->
    </div><!-- .jp-type-playlist -->

</div><!-- .APlayer -->
